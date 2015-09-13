<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\NotifyEmail;

/**
 * NotifyEmailSearch represents the model behind the search form about `backend\models\NotifyEmail`.
 */
class NotifyEmailSearch extends NotifyEmail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ne_id', 'mc_id', 'staff_id'], 'integer'],
            [['staff_email', 'attachment'], 'safe'],
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
        $query = NotifyEmail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ne_id' => $this->ne_id,
            'mc_id' => $this->mc_id,
            'staff_id' => $this->staff_id,
        ]);

        $query->andFilterWhere(['like', 'staff_email', $this->staff_email])
            ->andFilterWhere(['like', 'attachment', $this->attachment]);

        return $dataProvider;
    }
}
