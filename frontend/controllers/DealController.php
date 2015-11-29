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
            //$image = UploadedFile::getInstance($model, 'imageFile');

            if($model->validate())
            {
                //convert staart and end date to date time to save to db
//                $model->start_date = date('Y-m-d H:i:s');
//                $model->end_date = date('Y-m-d H:i:s');

                $model->end_date = date('Y-m-d H:i:s',strtotime($model->end_date));
                $model->start_date = date('Y-m-d H:i:s',strtotime($model->start_date));

                Yii::info($model->start_date,'dev');
                Yii::info($model->end_date,'dev');

                if($model->save()){

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

    public function actionImage(){
        $model = new DealImage();

        if (Yii::$app->request->isPost) {
            $model->dealImage = UploadedFile::getInstance($model, 'dealImage');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('image', ['model' => $model]);
    }


}
