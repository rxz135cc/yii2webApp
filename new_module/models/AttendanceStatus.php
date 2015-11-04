<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "attendance_status".
 *
 * @property integer $as_id
 * @property string $as_name
 */
class AttendanceStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attendance_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['as_name'], 'required'],
            [['as_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'as_id' => 'As ID',
            'as_name' => 'As Name',
        ];
    }

    public function getAttendance(){

        return $this->hasMany(Attendance::className(), ['as_id' => 'as_id']);
    }
}
