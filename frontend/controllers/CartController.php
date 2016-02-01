<?php
/**
 * Created by PhpStorm.
 * User: Samson
 * Date: 10/27/2015
 * Time: 5:45 PM
 */

namespace frontend\controllers;

use Yii;
use frontend\models\Order;
use frontend\models\search\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use frontend\models\Deal;
use frontend\models\CheckoutForm;

class CartController extends Controller{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup',],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout',],
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


    public function actionIndex(){
        $this->layout = "main";
        // we need to redirect to this page and get the deals in the cart and display them

        $session = Yii::$app->session;


        $items = $session['cart'];

        $model = new CheckoutForm();


        return $this->render('index',[
            'items' => $items,
            'model' => $model
        ]);
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


    public function actionCheckout()
    {
        $request = Yii::$app->request;
        if($request->isAjax)
        {
            Yii::$app->session->setFlash('success','got the request');
            return $this->renderAjax('checkout');
        }



    }

} 