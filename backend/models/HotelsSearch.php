<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Hotels;

/**
 * HotelsSearch represents the model behind the search form about `common\models\Hotels`.
 */
class HotelsSearch extends Hotels
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'discount', 'brone', 'country_id', 'city_id'], 'integer'],
            [['title_ru', 'description_ru', 'place_ru', 'way_ru', 'link'], 'safe'],
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
        $query = Hotels::find();

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
            'id' => $this->id,
            'discount' => $this->discount,
            'brone' => $this->brone,
            'city_id' => $this->country_id,
            'country_id' => $this->country_id,
        ]);

        $query->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'description_ru', $this->description_ru])
            ->andFilterWhere(['like', 'place_ru', $this->place_ru])
            ->andFilterWhere(['like', 'way_ru', $this->way_ru])
            ->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }
}
