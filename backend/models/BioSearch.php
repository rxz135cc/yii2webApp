<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bio;

/**
 * BioSearch represents the model behind the search form about `app\models\Bio`.
 */
class BioSearch extends Bio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bio_id', 'bio_place_num'], 'integer'],
            [['bio_name'], 'safe'],
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
        $query = Bio::find();

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
            'bio_id' => $this->bio_id,
            'bio_place_num' => $this->bio_place_num,
        ]);

        $query->andFilterWhere(['like', 'bio_name', $this->bio_name]);

        return $dataProvider;
    }
}
