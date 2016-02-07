<?php
/**
 * Created by PhpStorm.
 * User: Sammie
 * Date: 9/10/2015
 * Time: 1:18 PM
 */

namespace frontend\controllers;
use Faker\Provider\tr_TR\DateTime;
use yii\web\Controller;
use yii\base\DynamicModel;
use yii;
use frontend\models\Payment;
class PaymentController extends Controller
{
    const API_END_POINT_LIVE = "https://www.yodime.com/Json_Api_Handler";
    const API_END_POINT_TEST = "http://dev.yodime.com:8080/Json_Api_Handler";
    const API_METHOD_MTN = "MTNPayment";
    const API_METHOD_AIRTEL = "AirtelPayment";
    const API_USERNAME = "api_DoneDeal";
    const API_PASSWORD = "2p1jv9o3gsetbh1mb73ffra6ph";
    const API_EMAIL = "developer@donedeal.ug";

    //let us us this to show all payments
    public function actionIndex()
    {
        $phone = "";
        $mode = "";
        $processor = "";
        $amount="";
        $model = DynamicModel::validateData(compact('mode', 'phone','processor','amount'), [
            [['phone'], 'string', 'max' => 12,'min' => '10'],
            [['phone','mode','processor','amount'], 'required'],
        ]);

        $transactions = Payment::find()->all();

        return $this->render('index',[
            'model' => $model,
            'transactions' => $transactions,
        ]);

    }

    public function actionPayment()
    {
        //if this is a post request
        if(Yii::$app->request->getIsPost())
        {
            //get all the parameters and store them somewhere
            $params = Yii::$app->request->post();
            //we can now access the individual params like this $params['DynamicModel']['phone']

            //we will use YoDime DIRECT PAYMENT.
            $api_endpoint = ""; // first initialize an empty and set api end point according to the user's parameters
            if($params['DynamicModel']['mode'] == 'test')
            {
                $api_endpoint = self::API_END_POINT_TEST;
            }
            else
            {
                $api_endpoint = self::API_END_POINT_LIVE;
            }

            $api_method = "";
            //let us set the payment method.......
            if($params['DynamicModel']['processor'] == 'mtn')
            {
                $api_method = self::API_METHOD_MTN;
                $transaction_amount = $params['DynamicModel']['amount'];
                //for now, let us generate a random key for the transaction id
                $transaction = new Payment();
                $transaction->phone = $params['DynamicModel']['phone'];
                $transaction->amount_received = $params['DynamicModel']['amount'];
                //was setting merchant_transaction_id to auto increment value, but yo dime wants atleast a 3 digit id
                //so it make sense to randomly generate it..wat are the odds, that it would repeat?
                $merchant_transaction_id = mt_rand(100000, 99999999999);
                $transaction ->merchant_transaction_id = strval($merchant_transaction_id);

//                if($transaction->validate()){
//
//                }
//                else{
//                    $errors =$transaction->errors;
//                    Yii::info($errors,'dev');
//                }

                if($transaction->save())
                {
                    $mtn_number = $transaction->phone;
                    //now we need to create a key value pair array and create the json object
                    $keys = array('api_method','email','api_username','api_password','transaction_amount',
                        'merchant_transaction_id','mtn_number');
                    $values= array($api_method, self::API_EMAIL, self::API_USERNAME, self::API_PASSWORD,
                        $transaction_amount, strval($merchant_transaction_id), $mtn_number);
                    $post_array = array_combine($keys,$values);
                    $json_obj = json_encode($post_array);
                    Yii::info('The json string is '.$json_obj,'dev');

                    //now we need to send the darn thing over to Yo Dime
                    $curl = curl_init($api_endpoint);
                    curl_setopt($curl, CURLOPT_HEADER, false);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_HTTPHEADER,
                        array("Content-type: application/json"));
                    curl_setopt($curl, CURLOPT_POST, true);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $json_obj);

                    $yodime_response = curl_exec($curl);
                    //write to the log files the response status
                    $yodime_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                    Yii::info('The request_status for a transaction with merchant id is '.$merchant_transaction_id.'is '. $yodime_status,'dev');

                    //then write to the log file the yo_dime response
                    Yii::info('The response string is for a transactoin with merchant id '.$merchant_transaction_id.'is '.$yodime_response,'dev');

                    if ( $yodime_status == 200 )
                    {
                        $response = json_decode($yodime_response,true);
                        //now we must check for error message, and see if we need to report errors
                        if(array_key_exists('transaction_status',$response) ){
                            $payment = new Payment();
                            $current_payment = $payment::findOne(['merchant_transaction_id' =>$response['merchant_transaction_id'] ]);
                            $current_payment->status = $response['transaction_status'];
                            $current_payment->yodime_transaction_id = $response['yodime_transaction_id'];
                            $current_payment->amount = $response['transaction_amount'];
                            $current_payment->save();
                        }
                        else
                        {
                            Yii::$app->getSession()->setFlash('error','We failed to process your payment. Please contact your system administrator');
                        }

                    }
                    else
                    {
                        Yii::$app->getSession()->setFlash('error','Failed to process payment, server returned '.$yodime_status.' error code' );
                        $transaction->transaction_status = 'failed';
                        $transaction->save();
                    }
                    curl_close($curl);

                }
                else
                {
                    //if we fail to create a transaction id for the user in the payments table
                    $errors = $transaction->errors;
                    Yii::info(print_r($errors),'dev');
                    Yii::$app->getSession()->setFlash('error','Failed to Create a transaction for you, please try again' );
                }
            }
            // we process airtel payment from this else clause.
            else if($params['DynamicModel']['processor'] == 'airtel')
            {
                $api_method = self::API_METHOD_AIRTEL;
                //for now, let us generate a random key for the transaction id
                $merchant_transaction_id = mt_rand(1000,100000);
            }
            else
            {
                Yii::$app->getSession()->setFlash('error','We only use MTN and Airtel for Payments');

            }

        }
        else
        {
            //show a flash message here that something went wrong!
            //
        }
        return $this->render('information');
    }

    public function actionDecodejson(){

        $response = "{\"transaction_status\":\"Processing\",\"merchant_transaction_id\":\"25989\",\"transaction_amount\":\"1000\",\"yodime_transaction_id\":\"t_id1441980554854\"}";
        $response_array = json_decode($response,true);

        Yii::info($response_array['transaction_status'],'dev');
        return $this->render('information');
    }

    public function actionIpnlistener(){
        $post = file_get_contents("php://input");
        //decode json post input as php array:
        $data = json_decode($post, true);
        Yii::info('received json'.$data,'dev');
        $payment = new Payment();
        // $current_payment = $payment::findOne($data['merchant_transaction_id']);
//        if($current_payment != null){
//            Yii::info('We could not find the transaction','dev');
//        }
//        else{
//            Yii::info('Received transaction update for'.$data['merchant_transaction_id'],'dev');
//            //then update the payment details
//        }


    }


}