<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Advices;

/**
 * AdvicesSearch represents the model behind the search form about `common\models\Advices`.
 */
class AdvicesSearch extends Advices
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'show'], 'integer'],
            [['main_title_ru', 'sub_title_ru', 'button_title_ru', 'excerpt_ru', 'full_content_ru', 'created_at', 'updated_at'], 'safe'],
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
        $query = Advices::find();

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
            'show' => $this->show,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'main_title_ru', $this->main_title_ru])
            ->andFilterWhere(['like', 'sub_title_ru', $this->sub_title_ru])
            ->andFilterWhere(['like', 'button_title_ru', $this->button_title_ru])
            ->andFilterWhere(['like', 'excerpt_ru', $this->excerpt_ru])
            ->andFilterWhere(['like', 'full_content_ru', $this->full_content_ru]);

        return $dataProvider;
    }
}
