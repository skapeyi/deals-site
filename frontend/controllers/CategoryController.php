<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Category;
use yii\data\Pagination;
use yii\filters\AccessControl;
use frontend\models\search\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
                        'actions' => ['index','view','create','update','delete'],
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout ="admin";
        // we need to find all the categories in here, the date created, the id and the category creator
        $query = (new \yii\db\Query())->select('category.id, category.name, category.created_at, user.email')->from('category')->leftJoin('user', 'user.id = category.created_by')->where(['category.status' => 10])->orderBy('category.created_at DESC');

        $countquery = clone $query; // the count query is used for pagination

        //set up the pagination parameters
        $pages = new Pagination(['totalCount' => $countquery->count(),'defaultPageSize' => 10]);

        //then find the actual categories, depending on the pagination size
        $categories = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'categories' => $categories,
            'pages' => $pages,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout ="admin";
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
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
     * Deletes an existing Category model.
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
