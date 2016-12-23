<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DonHang;

/**
 * DonHangSearch represents the model behind the search form about `app\models\DonHang`.
 */
class DonHangSearch extends DonHang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ma_don_hang', 'tenKH', 'dia_chi', 'phone', 'email'], 'safe'],
            [['tong_tien'], 'number'],
            [['status'], 'integer'],
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
        $query = DonHang::find();

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
            'tong_tien' => $this->tong_tien,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'ma_don_hang', $this->ma_don_hang])
            ->andFilterWhere(['like', 'tenKH', $this->tenKH])
            ->andFilterWhere(['like', 'dia_chi', $this->dia_chi])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
