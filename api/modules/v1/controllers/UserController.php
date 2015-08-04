<?php
namespace api\modules\v1\controllers;
use yii;
use common\models\User;
use frontend\models\SignupForm;

class UserController extends ApiController{

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    public $phone;
    public $password;
    private $_user = false;
    private $password_hash;

	public function actionIndex(){

	}

	public function actionCreate()
    {
        if(isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phone']))
        {
            $model = new SignupForm();
            $model->firstname = $_POST['firstname'];
            $model->email = $_POST['email'];
            $model->phone = $_POST['phone'];
            $model->password = $_POST['password'];

            //validate the provided data and return errors if any, or save data if the data is okay(passed validation)
            if($model->validate())
            {
                $user = new User();
                $user->phone = $model->phone;
                $user->firstname = $model->firstname;
                $user->email = $model->email;
                $user->setPassword($model->password);
                $user->generateAuthKey();
                if ($user->save()) {
                    return array(
                        'result' => 'success',
                        'user' => $user
                    );
                }
            }
            else
            {
                return array(
                    'result' => 'fail',
                    'message' => $model->errors
                );
            }
        }
        else
        {
            if(!isset($_POST['firstname']))
            {
              return array(
                  'result' => 'fail',
                  'message' => 'Please specify firstname'
              );
            }
            if(!isset($_POST['email']))
            {
               return array(
                   'result'=> 'fail',
                   'message' => 'Please specify the email'
               );
            }
            if(!isset($_POST['phone']))
            {
                return array(
                    'result'=> 'fail',
                    'message' => 'Please specify the phone'
                );
            }
            if(!isset($_POST['password'])){
                return array(
                    'result'=> 'fail',
                    'message' => 'Please specify the password'
                );
            }
        }

	}

	public function actionView($id)
    {

	}

	public function actionDelete($id)
    {

	}

	public function actionUpdate($id)
    {

	}

    public function getUser($phone)
    {
        if ($this->_user === false) {
            $this->_user = User::findOne(['phone' => $phone,'status' => self::STATUS_ACTIVE ]);
        }
        return $this->_user;
    }

    public function actionLogin()
    {
        if(isset($_POST['phone']) && isset($_POST['password']))
        {
            $this->phone = $_POST['phone'];
            $this->password = $_POST['password'];
            if(!is_null($this->getUser($this->phone)))
            {
                //if the user is there, we try and validate the password
                if (Yii::$app->getSecurity()->validatePassword($this->password, $this->_user->password_hash))
                {
                    return array(
                        'message' => 'success',
                        'user' => $this->_user
                    );
                } else
                {
                    return array(
                        'result' => 'fail',
                        'message' => 'Invalid password, Please try again'
                    );
                }
            }else
            {
                return array(
                    'result' => 'fail',
                    'error' => 'User Not Found, Please Check Your Credentials And Try Again'
                );
            }

        }
        else
        {
            if(!isset($_POST['phone']))
            {
                return array(
                    'result' => 'fail',
                    'message'=> 'Please provide your phone number');
            }
            if(!isset($_POST['password']))
            {
                return array(
                    'result' => 'fail',
                    'message' =>'Please provide your password');
            }
        }
    }

    public function actionResetpassword()
    {
        if(isset($_POST['id'])&& isset($_POST['oldpassword']) && isset($_POST['newpassword']))
        {
            $id = $_POST['id'];
            $old_p = $_POST['oldpassword'];
            $new_p = $_POST['newpassword'];

            $model = new User();
            $current_user = User::findOne(['id'=> $id, 'status' => self::STATUS_ACTIVE]);

            if($current_user !=null)
            {
                if(Yii::$app->getSecurity()->validatePassword($old_p, $current_user->password_hash))
                {
                    if(strlen($new_p) < 6 )
                    {
                        $result = array(
                            'result' => 'fail',
                            'error' =>  'The password should be at least 6 characters long'
                        );
                        return $result;
                    }
                    else
                    {
                        $current_user->password_hash = Yii::$app->security->generatePasswordHash($new_p);
                        if($current_user->save()){
                            $result = array(
                                'result' => 'success',
                                'message' => 'The new password has been successfully set'
                            );
                            return $result;
                        }
                        else{
                            $result = array(
                                'result' => 'fail',
                                'message' => 'Something went wrong while processing your request. Please try again later'
                            );
                        }
                    }
                }
                else{
                    $result = array(
                        'result' => 'fail',
                        'message' => 'The old password is incorrect. Please try again'
                    );
                    return $result;
                }

            }
            else
            {
                $result = array(
                    'result' => 'fail',
                    'message' => 'User not found'
                );
                return $result;
            }
        }
        else
        {
           $result = array(
               'result' => 'fail',
               'message'=> 'Please provide userid, old password and new password'
           );
           return($result);
        }
    }


}