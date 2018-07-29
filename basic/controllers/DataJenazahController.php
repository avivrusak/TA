<?php

namespace app\controllers;

use Yii;
use app\models\DataJenazah;
use app\models\DataAhliWaris;
use yii\helpers\ArrayHelper;
use app\models\DataMakam;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DataJenazahController implements the CRUD actions for DataJenazah model.
 */
class DataJenazahController extends Controller
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
     * Lists all DataJenazah models.
     * @return mixed
     */
    public function actionIndex($id, $isInput)
    {
        if ($isInput == 0) {
            $dataProvider = new ActiveDataProvider([
                'query' => DataJenazah::find()
                            ->where(['ID_MAKAM'=>null])
            ]);    
        }else{
            $dataProvider = new ActiveDataProvider([
                'query' => DataJenazah::find()
                            ->where(['ID_MAKAM'=>$id])
            ]);
        }
        

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'id'=>$id,
        ]);
    }

    /**
     * Displays a single DataJenazah model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => DataAhliWaris::find()->where(['ID_JENAZAH'=>$id]),
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider'=>$dataProvider
        ]);
    }

    /**
     * Creates a new DataJenazah model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DataJenazah();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_JENAZAH]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DataJenazah model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // $idMakam = DataJenazah::find()->select('id_makam')->where(['<>','id_makam', 'null'])->asArray()->all();
        $dataMakam = DataMakam::find()->where(['ID_TPU'=>$model->ID_TPU])->all();
        $n=0;
        $dataMakamAvail = array();
        foreach ($dataMakam as $key => $value) {
            if ($value->jenazah == null) {
                $dataMakamAvail[$n]['ID_MAKAM'] = $value->ID_MAKAM;
                $dataMakamAvail[$n]['NO_MAKAM'] = $value->NO_MAKAM;
                $n++;
            }
        }
        
        $arMakam = ArrayHelper::map($dataMakamAvail, 'ID_MAKAM', 'NO_MAKAM');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_JENAZAH]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'arMakam'=>$arMakam
            ]);
        }
    }

    /**
     * Deletes an existing DataJenazah model.
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
     * Finds the DataJenazah model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DataJenazah the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DataJenazah::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
