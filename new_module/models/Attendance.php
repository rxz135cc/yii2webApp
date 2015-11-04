<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "attendance".
 *
 * @property integer $att_id
 * @property integer $ps_id
 * @property integer $student_id
 * @property integer $as_id
 */
class Attendance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attendance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ps_id', 'student_id', 'as_id'], 'required'],
            [['ps_id', 'student_id', 'as_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'att_id' => 'Att ID',
            'ps_id' => 'Ps ID',
            'student_id' => 'Student ID',
            'as_id' => 'As ID',
        ];
    }

    public function getPlaceSession(){

        return $this->hasOne(PlaceSession::className(), ['ps_id' => 'ps_id']);
    }

    public function getStudent(){

        return $this->hasOne(Student::className(), ['student_id' => 'student_id']);
    }

    public function getAttendanceStatus(){

        return $this->hasOne(AttendanceStatus::className(), ['as_id' => 'as_id']);
    }
}
