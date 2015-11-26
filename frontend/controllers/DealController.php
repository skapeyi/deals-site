<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Deal;
use frontend\models\Order;
use yii\data\Pagination;
use frontend\models\search\DealSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Category;

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
                        'actions' => ['create','index',],
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
        $query = Order::find()->where(['status' => 10]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'defaultPageSize' => 10]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'models' => $models,
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

            if($model->validate())
            {
                if($model->save()){
                    $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
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
            Yii::info('we are hereeee','dev');
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
