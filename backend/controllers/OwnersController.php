<?php

namespace backend\controllers;

use Yii;
use backend\models\Owners;
use backend\models\OwnersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OwnersController implements the CRUD actions for Owners model.
 */
class OwnersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Owners models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OwnersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Owners model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Owners model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Owners();

        if ($model->load(Yii::$app->request->post())) {
            $data = Yii::$app->request->post();
            $model->psprt_series = utf8_encode(Yii::$app->security->encryptByKey($data['Owners']['psprt_series'], 'key1'));
            $model->psprt_given_by = utf8_encode(Yii::$app->security->encryptByKey($data['Owners']['psprt_given_by'], 'key1'));

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
//        $model = new Owners();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
    }

    public function actionEncode(){
        $owners = Owners::find()->all();//Owners::findAll(['status' => 1]);
        foreach ($owners as $ow) {
            $this->encode($ow->id, $ow->psprt_series, $ow->psprt_given_by);
        }
        return $this->redirect(['index']);
    }

    public function encode($id, $psprt_series, $psprt_given_by){
        return Owners::updateAll(
            [
                'psprt_series' => utf8_encode(Yii::$app->security->encryptByKey($psprt_series, 'key1')),
                'psprt_given_by' => utf8_encode(Yii::$app->security->encryptByKey($psprt_given_by, 'key1')),
            ],
            ['id' => $id]
        );
    }

    /**
     * Updates an existing Owners model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $data = Yii::$app->request->post();
            $model->psprt_series = utf8_encode(Yii::$app->security->encryptByKey($data['Owners']['psprt_series'], 'key1'));
            $model->psprt_given_by = utf8_encode(Yii::$app->security->encryptByKey($data['Owners']['psprt_given_by'], 'key1'));

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
    }

    /**
     * Deletes an existing Owners model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Owners model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Owners the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Owners::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
