<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MedicalCertificate;


/**
 * MedicalCertificateSearch represents the model behind the search form about `backend\models\MedicalCertificate`.
 */
class MedicalCertificateSearch extends MedicalCertificate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mc_id'], 'integer'],
            [['mc_serial', 'student_id', 'mc_problem', 'mc_startdate', 'mc_enddate', 'mc_appdate'], 'safe'],
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
        $query = MedicalCertificate::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('student');

        $query->andFilterWhere([
            'mc_id' => $this->mc_id,
            'mc_startdate' => $this->mc_startdate,
            'mc_enddate' => $this->mc_enddate,
            'mc_appdate' => $this->mc_appdate,
            'clinic_id' => $this->clinic_id,
            'au_id' => $this->au_id,
        ]);

        $query->andFilterWhere(['like', 'mc_serial', $this->mc_serial])
              ->andFilterWhere(['like', 'mc_problem', $this->mc_problem])
              ->andFilterWhere(['like', 'student.student_matrix', $this->student_id]);

        return $dataProvider;
    }
}
