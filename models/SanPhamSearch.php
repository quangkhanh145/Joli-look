<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SanPham;

/**
 * SanPhamSearch represents the model behind the search form about `app\models\SanPham`.
 */
class SanPhamSearch extends SanPham
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_danhmuc', 'mau_sac', 'image'], 'safe'],
            [['so_luong'], 'integer'],
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
        $query = SanPham::find();

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
            'so_luong' => $this->so_luong,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'id_danhmuc', $this->id_danhmuc])
            ->andFilterWhere(['like', 'mau_sac', $this->mau_sac])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
