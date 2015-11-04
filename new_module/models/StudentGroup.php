<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "student_group".
 *
 * @property integer $sg_id
 * @property integer $student_id
 * @property integer $group_id
 */
class StudentGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'group_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sg_id' => 'Sg ID',
            'student_id' => 'Student ID',
            'group_id' => 'Group ID',
        ];
    }

    public function getGroup(){

        return $this->hasOne(Group::className(), ['group_id' => 'group_id']);
    }

    public function getStudent(){

        return $this->hasOne(Student::className(), ['student_id' => 'student_id']);
    }
}
