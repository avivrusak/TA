<?php

namespace app\controllers;

use Yii;
use app\models\DataMakam;
use app\models\DataLokasiTpu;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DataMakamController implements the CRUD actions for DataMakam model.
 */
class DataMakamController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all DataMakam models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => DataMakam::find()
                        ->where(['ID_TPU'=>$id]),
        ]);

        $namaTPU = DataLokasiTpu::find()->where(['ID_TPU'=>$id])->one()->getAttribute('nama_lokasi');
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'id'=>$id,
            'namaTPU'=>$namaTPU
        ]);
    }

    /**
     * Displays a single DataMakam model.
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
     * Creates a new DataMakam model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new DataMakam();

        if ($model->load(Yii::$app->request->post())) {
            $model->ID_TPU = $id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->ID_MAKAM]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'id'=>$id
            ]);
        }
    }

    /**
     * Updates an existing DataMakam model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->ID_MAKAM]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DataMakam model.
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
     * Finds the DataMakam model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DataMakam the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DataMakam::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
