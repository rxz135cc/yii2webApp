<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "authorizer".
 *
 * @property integer $au_id
 * @property integer $staff_id
 * @property integer $au_status
 */
class Authorizer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authorizer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staff_id', 'au_status'], 'required'],
            [['staff_id', 'au_status'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'au_id' => 'Au ID',
            'staff_id' => 'Staff ID',
            'au_status' => 'Au Status',
        ];
    }

    public function getStaff(){

        return $this->hasOne(Staff::className(), ['staff_id' => 'staff_id']);
    }

    public function getMedicalCertificate(){

        return $this->hasMany(MedicalCertificate::className(), ['au_id' => 'au_id']);
    }
}
