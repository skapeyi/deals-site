<?php
/**
 * Created by PhpStorm.
 * User: Samson
 * Date: 10/27/2015
 * Time: 5:45 PM
 */

namespace frontend\controllers;

use Faker\Provider\cs_CZ\DateTime;
use frontend\models\Payment;
use Yii;
use frontend\models\Voucher;
use frontend\models\search\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use frontend\models\Deal;
use frontend\models\CheckoutForm;
use yii\db\Expression;

class CartController extends Controller{
    //we need come constant here

    //const api_url = "https://www.yodime.com/Json_Api_Handler";
    const api_url = "https://www.yodime.com/Json_Api_Handler";
    const api_username = "api_Triumworks";
    const api_password  = "66gu3hrb8kgfp8jbediqbgcvo5";
    const api_email  = "developer@triumworks.com";
    //we also need the api method, but this will vary depending on the method being used..we can set this in the control statement

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','checkout'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','checkout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'checkout' => ['post'],
                ],
            ],
        ];
    }
    //we are going to keep passing the deal id to this method and add it to the session
    public function actionAddtocart($id,$price,$name, $quantity)
    {
        $session = Yii::$app->session;
       //$session->remove('cart');
        if($session->has('cart')) //if the session is there, we need to add to it
        {
            //t
            $item =  [
                'id' => $id,
                'price' => $price,
                'name' => $name,
                'quantity' => $quantity

            ];
            $session['cart'] = array_merge($session['cart'],[$item]);


        }
        else //if the session is not there, we need to create it
        {

            $session['cart'] = array();
            $item = [
                'id' => $id,
                'price' => $price,
                'name' => $name,
                'quantity' => $quantity
            ];
            $session['cart'] = array_merge($session['cart'],[$item]);
        }
        //go to the users' cart page
        $this->redirect(['cart/index']);
    }


    public static  function calculatePrice($quantity, $price)
    {
        return $quantity * $price;
    }


    public static function sumCart($total,$new_item)
    {
        return $total + $new_item;
    }


    public function actionIndex(){

        // we need to redirect to this page and get the deals in the cart and display them

        $session = Yii::$app->session;

        $items = $session['cart'];

        return $this->render('index',[
            'items' => $items,
        ]);

    }

    public function actionCheckout()
    {
        $request = Yii::$app->request;
        if($request->isPost)
        {
            $params = $request->getBodyParams();
            Yii::$app->session->setFlash("success",$params['paymentmethod']);
            //in params, we have our information..i.e the deals,qualities and prices..we now
            //we need to know the payment method selected

            //the posted data has form fields, but four of them are not items to create voucher for.. therefore, we subtract and get the actual items that we need to generate vouchers for.

            $actual_items = (count($params) - 5)/4;
            Yii::info(count($params).' count parmas','debug');
            Yii::info($actual_items.' actual items','debug');
            $deals = [];
            for ($x = 0; $x < $actual_items; $x++)
            {
                //need to create an array here that has the items
                $id = [
                    'deal_id' => $params['cartindexdealid'.$x],
                    'quantity' => $params['cartindexquantity'.$x],
                    'unit_price' => $params['cartindexunitprice'.$x],
                    'total_price' => $params['cartindextotal'.$x]
                ];

                $deals[$x] = $id;
            }
            //Yii::info($deals[0],'debug');


            if($params['paymentmethod']=='Pay on arrival')
            {
                //we just go head and generate the voucher codes..
                //we need to know how may items were in the cart..then we use a for loop to generate a voucher code for each item
                for($y=0; $y<$actual_items; $y++)
                {
                    $quantity = $deals[$y]['quantity'];
                    //the deal for which we are creating a voucher for.
                    $deal = Deal::find($deals[$y]['deal_id'])->one();
                    //Yii::info($deal->title,'debug');
                    for ($z = 0; $z < $quantity; $z++)
                    {
                        $voucher = new Voucher();
                        $voucher->created_by = Yii::$app->user->id;
                        $voucher->updated_by = Yii::$app->user->id;
                        $voucher->deal_id = $deals[$y]['deal_id'];
                        $voucher->payment_method = 'Pay on arrival';
                        $voucher->redeemed = 0;
                        $voucher->deleted = 0;
                        $voucher->activation_status = 1;

                        $deal_expire_date = strtotime( substr($deal->end_date,0,10));

                        $voucher->code = 'DoneDeal-'.date('dmy').'-'.CartController::randomString().'-'.CartController::randomString().'-' .date('dmy',$deal_expire_date);

                        //donedeal-daymonthyear-xcvcxcvxcvxcv-daymonthyear

                        if($voucher->save())
                        {
                            //send the user a message and or email
                            Yii::$app->session->setFlash('success','Your deal is ready');
                        }

                        else
                        {
                            Yii::$app->session->setFlash('error','Processing failed, please try again');
                        }
                    }

                    return $this->redirect(['voucher/myvouchers']);

                }

            }
            elseif($params['paymentmethod'] == 'MTN MobileMoney')
            {
                //we want to create the vouchers once the payment processor receives the payment
                //or, we can create the vouchers here, but de-activate them...
                $payment = new Payment();
                $payment->phone = $params['phone'];
                $payment->amount = $params['carttotal'];
                $payment->created_by = Yii::$app->user->id;
                $payment->updated_by = Yii::$app->user->id;

                if($payment->save())
                {
                    $method = "MTNPayment";
                    //
                    $keys = array('api_method','email','api_username','api_password','transaction_amount','merchant_transaction_id','mtn_number');

                    $values = array($method, self::api_email, self::api_username, self::api_password, $payment->amount, "donedeal_".strval($payment->id), $payment->phone );

                    $post_array = array_combine($keys,$values);
                    $json_obj = json_encode($post_array);
                    Yii::info('The json string is '.$json_obj,'dev');

                    //now we need to send the darn thing over to Yo Dime
                    $curl = curl_init(self::api_url);
                    curl_setopt($curl, CURLOPT_HEADER, false);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_HTTPHEADER,
                        array("Content-type: application/json"));
                    curl_setopt($curl, CURLOPT_POST, true);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $json_obj);
                    Yii::info($json_obj,'debug');

                    $yodime_response = curl_exec($curl);
                    $yodime_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                    if ( $yodime_status == 200 )
                    {
                        $response = json_decode($yodime_response,true);
                        $payment->status = $response['transaction_status'];
                        $payment->yodime_id = $response['yodime_transaction_id'];
                        $payment->save();

                        //then we go ahead and create the vouchers
                        for($y=0; $y<$actual_items; $y++)
                        {
                            $quantity = $deals[$y]['quantity'];
                            //the deal for which we are creating a voucher for.
                            $deal = Deal::find($deals[$y]['deal_id'])->one();
                            //Yii::info($deal->title,'debug');
                            for ($z = 0; $z < $quantity; $z++)
                            {
                                $voucher = new Voucher();
                                $voucher->created_by = Yii::$app->user->id;
                                $voucher->updated_by = Yii::$app->user->id;
                                $voucher->deal_id = $deals[$y]['deal_id'];
                                $voucher->payment_method = 'MTN MobileMoney';
                                $voucher->redeemed = 0;
                                $voucher->deleted = 0;
                                $voucher->activation_status = 0;
                                $voucher->payment_id = $payment->id;

                                $deal_expire_date = strtotime( substr($deal->end_date,0,10));

                                $voucher->code = 'DoneDeal-'.date('dmy').'-'.CartController::randomString().'-'.CartController::randomString().'-' .date('dmy',$deal_expire_date);

                                //donedeal-daymonthyear-xcvcxcvxcvxcv-daymonthyear

                                if($voucher->save())
                                {
                                    //send the user a message and or email
                                    Yii::$app->session->setFlash('success','Your deal is ready');
                                }

                                else
                                {
                                    Yii::$app->session->setFlash('error','Processing failed, please try again');
                                }
                            }

                        }
                    }
                }
            }
            elseif($params['paymentmethod'] == 'Airtel Money')
            {

                //we want to create the vouchers once the payment processor receives the payment
                //or, we can create the vouchers here, but de-activate them...
                $payment = new Payment();
                $payment->phone = $params['phone'];
                $payment->amount = $params['carttotal'];
                $payment->created_by = Yii::$app->user->id;
                $payment->updated_by = Yii::$app->user->id;

                if($payment->save())
                {
                    $method = "AirtelPayment";
                    //
                    $keys = array('api_method','email','api_username','api_password','transaction_amount','merchant_transaction_id','airtel_number','airtel_transaction_id');

                    $values = array($method, self::api_email, self::api_username, self::api_password, $payment->amount, "donedeal_".strval($payment->id), $payment->phone, $payment->phone );

                    $post_array = array_combine($keys,$values);
                    $json_obj = json_encode($post_array);
                    Yii::info('The json string is '.$json_obj,'dev');

                    //now we need to send the darn thing over to Yo Dime
                    $curl = curl_init(self::api_url);
                    curl_setopt($curl, CURLOPT_HEADER, false);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json"));
                    curl_setopt($curl, CURLOPT_POST, true);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $json_obj);
                    Yii::info($json_obj,'debug');

                    $yodime_response = curl_exec($curl);
                    $yodime_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                    if ( $yodime_status == 200 )
                    {
                        $response = json_decode($yodime_response,true);

                        Yii::info($response,'debug');
                        $payment->status = $response['transaction_status'];
                        $payment->yodime_id = $response['yodime_transaction_id'];
                        $payment->save();

                        //then we go ahead and create the vouchers
                        for($y=0; $y<$actual_items; $y++)
                        {
                            $quantity = $deals[$y]['quantity'];
                            //the deal for which we are creating a voucher for.
                            $deal = Deal::find($deals[$y]['deal_id'])->one();
                            //Yii::info($deal->title,'debug');
                            for ($z = 0; $z < $quantity; $z++)
                            {
                                $voucher = new Voucher();
                                $voucher->created_by = Yii::$app->user->id;
                                $voucher->updated_by = Yii::$app->user->id;
                                $voucher->deal_id = $deals[$y]['deal_id'];
                                $voucher->payment_method = 'Airtel Money';
                                $voucher->redeemed = 0;
                                $voucher->deleted = 0;
                                $voucher->activation_status = 0;
                                $voucher->payment_id = $payment->id;

                                $deal_expire_date = strtotime( substr($deal->end_date,0,10));

                                $voucher->code = 'DoneDeal-'.date('dmy').'-'.CartController::randomString().'-'.CartController::randomString().'-' .date('dmy',$deal_expire_date);

                                //donedeal-daymonthyear-xcvcxcvxcvxcv-daymonthyear

                                if($voucher->save())
                                {
                                    //send the user a message and or email
                                    Yii::$app->session->setFlash('success','Your deal is ready');
                                }

                                else
                                {
                                    Yii::$app->session->setFlash('error','Processing failed, please try again');
                                }
                            }
                        }
                    }

                }

            }
            else
            {
                Yii::$app->session->setFlash('error','Something went wrong');
            }
        }

        else
        {

            Yii::$app->session->setFlash('error','Invalid request');
        }

        return $this->render('checkout');


    }


    public static  function randomString($length = 4) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

} 