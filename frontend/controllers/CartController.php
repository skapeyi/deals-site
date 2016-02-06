<?php
/**
 * Created by PhpStorm.
 * User: Samson
 * Date: 10/27/2015
 * Time: 5:45 PM
 */

namespace frontend\controllers;

use Faker\Provider\cs_CZ\DateTime;
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
    const api_url = "https://www.yodime.com/Json_Api_Handler";
    const api_username = "api_Triumworks";
    const api_password  = "8v4860tv4p0ivl77mhb6d7hkoo";
    const email  = "developer@triumworks.com";
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
            //Yii::info($params,'debug');
            //Yii::info(count($params),'debug');
            //the posted data has form fields, but four of them are not items to create voucher for.. therefore, we subtract and get the actual items that we need to generate vouchers for.

            $actual_items = (count($params) - 4)/4;
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
            elseif($params['paymentmethod'] == 'Airtel Money')
            {
                $method = "MTNPayment";

            }
            elseif($params['paymentmethod'] == 'MTN MobileMoney')
            {
                $method = "AirtelPayment";

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