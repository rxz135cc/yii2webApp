<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $course_id
 * @property string $course_code
 * @property string $course_name
 * @property integer $dept_id
 * @property integer $course_credithours
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_code', 'course_name', 'dept_id', 'course_credithours'], 'required'],
            [['dept_id', 'course_credithours'], 'integer'],
            [['course_code'], 'string', 'max' => 20],
            [['course_name'], 'string', 'max' => 180]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_id' => 'Course ID',
            'course_code' => 'Course Code',
            'course_name' => 'Course Name',
            'dept_id' => 'Dept ID',
            'course_credithours' => 'Course Credithours',
        ];
    }

    public function getPlaceSession(){

        return $this->hasMany(PlaceSession::className(), ['course_id' => 'course_id']);
    }

     public function getDepartment(){

        return $this->hasOne(Department::className(), ['dept_id' => 'dept_id']);
    }
}
