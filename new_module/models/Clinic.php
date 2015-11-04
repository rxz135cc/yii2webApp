<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "clinic".
 *
 * @property integer $clinic_id
 * @property string $clinic_name
 * @property integer $staff_id
 */
class Clinic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clinic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clinic_name', 'staff_id'], 'required'],
            [['staff_id'], 'integer'],
            [['clinic_name'], 'string', 'max' => 155]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'clinic_id' => 'Clinic ID',
            'clinic_name' => 'Clinic Name',
            'staff_id' => 'Director',
        ];
    }

    public function getStaff(){

        return $this->hasOne(Staff::className(), ['staff_id' => 'staff_id']);
    }

    public function getMedicalCertificate(){

        return $this->hasMany(MedicalCertificate::className(), ['clinic_id' => 'clinic_id']);
    }
}
