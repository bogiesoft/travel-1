<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Webcam;

/**
 * WebcamSearch represents the model behind the search form about `common\models\Webcam`.
 */
class WebcamSearch extends Webcam
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'size_width', 'size_height'], 'integer'],
            [['title_ru', 'image', 'code', 'city_id', 'country_id', 'description_ru', 'timezone'], 'safe'],
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
        $query = Webcam::find();

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
            'size_width' => $this->size_width,
            'size_height' => $this->size_height,
        ]);

        $query->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'city_id', $this->city_id])
            ->andFilterWhere(['like', 'country_id', $this->country_id])
            ->andFilterWhere(['like', 'description_ru', $this->description_ru])
            ->andFilterWhere(['like', 'timezone', $this->timezone]);

        return $dataProvider;
    }
}
