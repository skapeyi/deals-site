<?php

namespace frontend\controllers;

use frontend\models\DealImage;
use Yii;
use frontend\models\Deal;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
Use yii\imagine\Image;

/**
 * DealController implements the CRUD actions for Deal model.
 */
class DealController extends Controller
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
                        'actions' => ['create','index','image',],
                        'roles' => ['@'],
                    ],


                ],
                'denyCallback'  => function ($rule, $action) {
                    Yii::$app->session->setFlash('error', 'This section is only for registered users. Please login to continue');
                    Yii::$app->user->loginRequired();
                },
            ]
        ];
    }

    /**
     * Lists all Deal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this -> layout = "admin";
        $query = Deal::find()->where(['status' => 10]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'defaultPageSize' => 10]);
        $deals = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy('id DESC')
            ->all();

        return $this->render('index', [
            'deals' => $deals,
            'pages' => $pages,

        ]);

        $this->layout = "admin";

    }

    /**
     * Displays a single Deal model.
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
     * Creates a new Deal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = "admin";
        //get all categories to generate the check boxes for the categories


        $model = new Deal();

        if ($model->load(Yii::$app->request->post()))
        {
            $model->dealimage = UploadedFile::getInstance($model, 'dealimage');
            //need to update imageurl in the database

            $imagelocation = 'images/uploads/'.Yii::$app->security->generateRandomString(5).$model->dealimage->baseName.'.'.$model->dealimage->extension;
            $model->img_url = $imagelocation;


            if($model->validate())
            {
              $model->end_date = date('Y-m-d H:i:s');

                $model->end_date = date('Y-m-d H:i:s',strtotime($model->end_date));
                $model->start_date = date('Y-m-d H:i:s',strtotime($model->start_date));

                Yii::info($model->start_date,'dev');
                Yii::info($model->end_date,'dev');

                if($model->save()){
                    $model->dealimage->saveAs($imagelocation);
                    //create thumbnails and other sizes..we need the original path and the path to the thumbnails
                    $location = explode('.',$imagelocation);

                    //the 281x181 for the front page
                    $small = $location[0].'small';
                    // generate a thumbnail image for the front page
                    Image::thumbnail($imagelocation, 231, 181)
                        ->save($small.'.'.$location[1], ['quality' => 100]);

                    //the 250x181 for the side bar deal
                    $medium = $location[0].'medium';
                    Image::thumbnail($imagelocation, 250, 181)
                        ->save($medium.'.'.$location[1], ['quality' => 100]);

                    //the 670x414 for the deal page
                    $large = $location[0].'large';
                    Image::thumbnail($imagelocation, 670, 414)
                        ->save($large.'.'.$location[1], ['quality' => 100]);

                    //the 1170x400 for featured deals
                    $featured= $location[0].'featured';
                    Image::thumbnail($imagelocation, 1170, 400)
                        ->save($featured.'.'.$location[1], ['quality' => 100]);



                    Yii::$app->session->setFlash('success','Deal has been posted');
                    return $this->redirect(['index']);
                }
                else{
                    Yii::$app->session->setFlash('Something went wrong, please try again');
                }

            }
            else
            {

                $errors = $model->errors;

                if($errors != null)
                {

                    Yii::info($errors, 'dev');

                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
                else
                {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            }

        }
        else
        {

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Deal model.
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
     * Deletes an existing Deal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->layout = "admin";
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Deal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Deal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Deal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
