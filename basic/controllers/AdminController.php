<?php

namespace app\controllers;

use Yii;
use app\models\DataLokasiTpu;
use app\models\DataLokasiTpuSearch;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DataLokasiController implements the CRUD actions for DataLokasiTpu model.
 */
class AdminController extends Controller
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


    public function actionIndexPemakaman()
    {
        $dataPemakaman = DataLokasiTpu::find()->all();

        // $dataProvider = new ActiveDataProvider([
        //     'query' => DataLokasiTpu::find(),
        // ]);

        return $this->render('index_pemakaman', [
            'dataPemakaman'=>$dataPemakaman
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    
}
