<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DataLokasiTpu;

/**
 * DataLokasiTpuSearch represents the model behind the search form about `app\models\DataLokasiTpu`.
 */
class DataLokasiTpuSearch extends DataLokasiTpu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_TPU', 'harga_sewa'], 'integer'],
            [['nama_lokasi', 'alamat_lokasi', 'jumlah_makam', 'luas_lahan'], 'safe'],
            [['latitude', 'longitude'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DataLokasiTpu::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID_TPU' => $this->ID_TPU,
            'harga_sewa' => $this->harga_sewa,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ]);

        $query->andFilterWhere(['like', 'nama_lokasi', $this->nama_lokasi])
            ->andFilterWhere(['like', 'alamat_lokasi', $this->alamat_lokasi])
            ->andFilterWhere(['like', 'jumlah_makam', $this->jumlah_makam])
            ->andFilterWhere(['like', 'luas_lahan', $this->luas_lahan]);

        return $dataProvider;
    }
}
