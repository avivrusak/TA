<?php

namespace app\controllers;

use Yii;
use app\models\DataPetugas;
use app\models\DataLokasiTpu;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DataPetugasController implements the CRUD actions for DataPetugas model.
 */
class DataPetugasController extends Controller
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
     * Lists all DataPetugas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => DataPetugas::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DataPetugas model.
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
     * Creates a new DataPetugas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DataPetugas();

        $arTPU = ArrayHelper::map(DataLokasiTpu::find()->all(), 'ID_TPU', 'nama_lokasi');

        if ($model->load(Yii::$app->request->post())) {
            $model->rule = 2;
            $model->save();
            return $this->redirect(['view', 'id' => $model->ID_PETUGAS]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'arTPU'=>$arTPU
            ]);
        }
    }

    /**
     * Updates an existing DataPetugas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $arTPU = ArrayHelper::map(DataLokasiTpu::find()->all(), 'ID_TPU', 'nama_lokasi');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_PETUGAS]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'arTPU'=>$arTPU
            ]);
        }
    }

    /**
     * Deletes an existing DataPetugas model.
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
     * Finds the DataPetugas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DataPetugas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DataPetugas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
