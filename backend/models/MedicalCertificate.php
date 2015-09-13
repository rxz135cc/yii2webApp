<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "medical_certificate".
 *
 * @property integer $mc_id
 * @property string $mc_serial
 * @property integer $student_id
 * @property string $mc_problem
 * @property string $mc_startdate
 * @property string $mc_enddate
 * @property string $mc_appdate
 * @property integer $clinic_id
 * @property integer $au_id
 */
class MedicalCertificate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medical_certificate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mc_serial', 'student_id', 'mc_problem', 'mc_startdate', 'mc_enddate', 'mc_appdate', 'clinic_id', 'au_id'], 'required'],
            [['student_id', 'clinic_id', 'au_id'], 'integer'],
            [['mc_startdate', 'mc_enddate', 'mc_appdate'], 'safe'],
            [['mc_serial'], 'string', 'max' => 50],
            [['mc_problem'], 'string', 'max' => 180]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mc_id' => 'Mc ID',
            'mc_serial' => 'Serial Number',
            'student_id' => 'Student Matrix',
            'mc_problem' => 'Problem/Disease',
            'mc_startdate' => 'From Date',
            'mc_enddate' => 'Till Date',
            'mc_appdate' => 'Appointment On',
            'clinic_id' => 'Produced By Clinic',
            'au_id' => 'Authorizer',
        ];
    }


    public function getStudent(){
        //a medical certificate has one student
        return $this->hasOne(Student::className(), ['student_id' => 'student_id']);
    }

    public function getClinic(){
        return $this->hasOne(Clinic::className(), ['clinic_id' => 'clinic_id']);
    }

    public function getAuthorizer(){
        return $this->hasOne(Authorizer::className(), ['au_id' => 'au_id']);
    }

    public function getNotifyEmail(){

        return $this->hasMany(NotifyEmail::className(), ['mc_id' => 'mc_id']);
    }
}
