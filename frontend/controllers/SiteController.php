<?php
namespace frontend\controllers;

use common\models\User1;
use frontend\models\Category;
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\authclient\OAuth2;




/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'oAuthSuccess'],
            ],
        ];
    }

    public function actionIndex()
    {
        //we need to get the featured deals

        $featured = (new \yii\db\Query())->select(['deal.id','title','deal.highlight as highlight','value','discount','img_url','location.name as location'])->from('deal')->where(['status' => 10,'featured' => 1])->leftJoin('location','deal.location_id = location.id')->all();
        //Yii::info($featured,'dev');


        //first pick the categories
        $categories = (new \yii\db\Query())->select(['id', 'name'])->from('category')->where(['status' => '10'])->orderBy('name ASC')->all();
        $categories_number = (new \yii\db\Query())->select(['id', 'name'])->from('category')->where(['status' => '10'])->count();


        //we need to access the array by its keys so, we generate the keys
        $keys = array_keys($categories);

        //then for each category pick the deals in the category
       for($x = 0; $x < $categories_number; $x++)
       {
           $deal_category = $categories[$keys[$x]];
           $category_deals = (new \yii\db\Query())->select(['deal.id','title','value','discount','img_url','location.name as location'])->from('deal')->where(['status' => 10,'category_id' => $deal_category['id'],'publish_status' => 1])->leftJoin('location','deal.location_id = location.id')->all();

           $categories[$x]['deals'] = $category_deals;

       }

        //then we pass the data to the view for displaying
        return $this->render('index',[
            'categories' => $categories,
            'featured' => $featured
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                // Send email to admin
                Yii::$app->mailer->compose(['html' => 'adminSignupemail-html', 'text' => 'adminSignupemail-text'], ['user' => $user])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' Support'])
                    ->setTo('developer@donedeal.ug')
                    ->setSubject('New user sign up for ' . \Yii::$app->name)
                    ->send();

                //send email to user
                Yii::$app->mailer->compose(['html' => 'userSignupemail-html', 'text' => 'userSignupemail-text'], ['user' => $user])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' Support'])
                    ->setTo($user->email)
                    ->setSubject('Account created at ' . \Yii::$app->name)
                    ->send();

                //then login the user
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * This function will be triggered when user is successfully authenticated using some oAuth client.
     *
     *
     */
    public function oAuthSuccess($client) {
        // get user data from client
        $userAttributes = $client->getUserAttributes();
        Yii::info($userAttributes,'dev');

        // we get the email sent back and check if the email is in the db we have, and if we don't we create a new account
        //else, we log the user in

        $model = new User1();
        $current_user = $model::findOne(['email' => $userAttributes["email"]]);
        if($current_user != null)
        {
            Yii::$app->getSession()->setFlash(
                'success','You have been logged in as '.$userAttributes["email"]
            );
            //log the user in
            return Yii::$app->user->login($current_user, 3600 * 24 * 30 );

        }
        else
        {
            //create a new user
            $new_user = new User1();
//            $new_user->firstname = $userAttributes["first_name"];
//            $new_user->lastname = $userAttributes["last_name"];
            $new_user->firstname = $userAttributes["name"];
            $new_user->lastname = $userAttributes["name"];
            $new_user->email = $userAttributes["email"];
            $new_user->password_hash = Yii::$app->security->generatePasswordHash($userAttributes["email"]);
            $new_user->generateAuthKey();
            //$new_user->created_by = 1;
            //$new_user->updated_by = 1;

            //our user model requires a phone number, but the facebook api doesn't send back the phone, so we are going to set it to a default
            //and then redirect them to the preferences page, to update this phone number


            if($new_user->save()){

                Yii::$app->getSession()->setFlash(
                    'success','We have created an account for you. Your current email is your password,
                    Please update your password'
                );
                //log the user in
                Yii::$app->user->login($new_user, 3600 * 24 * 30 );

            }
            else{
                Yii::$app->getSession()->setFlash(
                    'error',$userAttributes["name"].' We failed to create an account for you, but we received your data'
                );
            }

        }
        Yii::info($userAttributes, 'debug');
        Yii::info($new_user->errors, 'debug');
        //$this->redirect(['user/preference']);
    }

    public function actionDeal()
    {
        return $this->render('deal');

    }

    public function actionVoucher(){
        $this->layout = 'pdf';
        $pdf = Yii::$app->pdf;
        $pdf->content = $this->render('voucher');
        return $pdf->render();
    }

    public function actionVouch(){
        return $this->render('voucher');
    }




}
