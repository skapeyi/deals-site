<?php

namespace frontend\controllers;

use frontend\models\ChangePassword;
use Yii;
use frontend\models\User;
use frontend\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','view','create','update','delete','dashboard','credit','password','voucher','preference','location','dashboard','admin','merchant'],
                        'roles' => ['@'],
                    ]
                ],
                'denyCallback'  => function ($rule, $action) {
                    Yii::$app->session->setFlash('error', 'This section is only for registered users. Please login to continue');
                    Yii::$app->user->loginRequired();
                },

            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = "admin";
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = "admin";
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public  function actionCredit()
    {
        $this->layout = "admin";
        return $this->render('credit',[

        ]);
    }

    /**
     * @return string
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidConfigException
     * This method helps reset the password.
     * The validation is handled in the ChangePassword model.
     * The rest of the logic is implemented here!
     */
    public  function actionPassword()
    {
        $model = new ChangePassword();
        $this->layout = "admin";

        if(!Yii::$app->user->isGuest)
        {
            if ($model->load(Yii::$app->request->post()))
            {

                if ($model->validate())
                {
                    $params = Yii::$app->request->post('ChangePassword');
                    $user = new User();
                    $current_user = $user::findOne(['id' => Yii::$app->getUser()->id ]);

                    if($current_user == null)
                    {
                        Yii::$app->getSession()->setFlash(
                            'error','Something went wrong while processing your request, please login and try again'
                        );

                        $this->redirect(['site/login']);

                    }
                    else
                    {
                        if(Yii::$app->getSecurity()->validatePassword($params['old_password'], $current_user->password_hash))
                        {
                            $current_user->password_hash = Yii::$app->security->generatePasswordHash($params['new_password']);
                            if($current_user->save()){
                                Yii::$app->getSession()->setFlash(
                                    'success','Password successfully changed'
                                );
                            }

                        }
                        else
                        {
                            Yii::$app->getSession()->setFlash(
                                'error','Incorrect old password, please try again'
                            );
                        }

                    }

                }
            }

            return $this->render('password',[
                'model' => $model,
            ]);
        }
        else
        {
            Yii::$app->getSession()->setFlash(
                'error','Please login to continue'
            );
           //redirect to home page
            $this->redirect(array('site/login'));
        }
    }


    /**
     * Updates the preferences of a logged in user.
     *      * @return string
     */
    public  function actionPreference()
    {
        $model = new User();
        $current_user = $model->findOne(['id' => Yii::$app->user->getId()]);
        $this->layout = "admin";

        if ($model->load(Yii::$app->request->post()))
        {
            if($current_user->validate())
            {
                $params = Yii::$app->request->post('User');
                $current_user->firstname = $params['firstname'];
                $current_user->lastname = $params['lastname'];
                $current_user->sms_notification = $params['sms_notification'];
                $current_user->email_notifications = $params['email_notifications'];
                $current_user->news_letter = $params['news_letter'];
                $current_user->new_deal = $params['new_deal'];
                $current_user->deal_failed = $params['deal_failed'];
                $current_user->deal_purchase = $params['voucher_activated'];
                $current_user->home_address = $params['home_address'];
                $current_user->home_address_1 = $params['home_address_1'];
                $current_user->city = $params['city'];
                $current_user->dob = $params['dob'];

                $current_user->dob = date('Y-m-d H:i:s',strtotime($current_user->dob));

                if($current_user->save())
                {
                   Yii::$app->getSession()->setFlash('success','Profile successfully updated');
                }
                else
                {
                   Yii::$app->getSession()->setFlash('error','Something went wrong while processing your request, please try again');

                }

            }

        }

        return $this->render('preferences',[
            'model' => $current_user
        ]);
    }

    /**
     * Get all vouchers a user has used from before!
     * Also allow for downloading, exporting sharing.     *
     */
    public  function actionVoucher()
    {
        $this->layout = "admin";
        return $this->render('vouchers',[

        ]);
    }

    public  function actionLocation()
    {
        $this->layout = "admin";
        return $this->render('location',[

        ]);
    }

    public  function actionDashboard()
    {
        $this->layout = "admin";
        return $this->render('dashboard',[

        ]);
    }
    public function actionMerchant(){
        $this->layout = 'admin';
        return $this->render('admin');
    }

}
