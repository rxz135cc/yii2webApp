<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "notifyEmail".
 *
 * @property integer $ne_id
 * @property integer $mc_id
 * @property integer $staff_id
 * @property string $staff_email
 * @property string $attachment
 */
class NotifyEmail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notifyEmail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mc_id', 'staff_id', 'staff_email'], 'required'],
            [['mc_id', 'staff_id'], 'integer'],
            [['staff_email'], 'string', 'max' => 80],
            [['attachment'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ne_id' => 'Ne ID',
            'mc_id' => 'Mc ID',
            'staff_id' => 'Staff ID',
            'staff_email' => 'Staff Email',
            'attachment' => 'Attachment',
        ];
    }

    public function getStaff(){

        return $this->hasOne(Staff::className(), ['staff_id' => 'staff_id']);
    }

    public function getMedicalCertificate(){

        return $this->hasOne(MedicalCertificate::className(), ['mc_id' => 'mc_id']);
    }
}
