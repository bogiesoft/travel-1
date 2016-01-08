<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ObjectCodes;

/**
 * ObjectCodesSearch represents the model behind the search form about `common\models\ObjectCodes`.
 */
class ObjectCodesSearch extends ObjectCodes
{

    public $object;
    public $user;
    public $tour;
    public $city;
    public $country;
    public $category;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'object_id', 'tour_id','user_id',/* 'country_id', 'city_id', 'object_category_id'*/], 'integer'],
            [['code', 'created_at','tour','user','object', 'country', 'city', 'category'], 'safe'],
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
        $query = ObjectCodes::find();


        $query->joinWith(['city', 'country', 'category']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ]
            ],
        ]);

        $dataProvider->sort->attributes['city'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['cities.title_ru' => SORT_ASC],
            'desc' => ['cities.title_ru' => SORT_DESC],
        ];
        // Lets do the same with country now
        $dataProvider->sort->attributes['country'] = [
            'asc' => ['countries.title_ru' => SORT_ASC],
            'desc' => ['countries.title_ru' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['category'] = [
            'asc' => ['object_category.title_ru' => SORT_ASC],
            'desc' => ['object_category.title_ru' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'object_id' => $this->object_id,
            'tour_id' => $this->tour_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'cities.title_ru', $this->city])
            ->andFilterWhere(['like', 'countries.title_ru', $this->country])
            ->andFilterWhere(['like', 'object_category.title_ru', $this->category]);

        return $dataProvider;
    }
}
