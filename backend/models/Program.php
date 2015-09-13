<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "program".
 *
 * @property integer $program_id
 * @property string $program_name
 * @property integer $faculty_id
 */
class Program extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'program';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['program_name', 'faculty_id'], 'required'],
            [['faculty_id'], 'integer'],
            [['program_name'], 'string', 'max' => 180]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'program_id' => 'Program ID',
            'program_name' => 'Program Name',
            'faculty_id' => 'Faculty',
        ];
    }

    public function getGroup(){

        return $this->hasMany(Group::className(), ['program_id' => 'program_id']);
    }

    public function getStudent(){

        return $this->hasMany(Student::className(), ['program_id' => 'program_id']);
    }

    public function getFaculty(){
        //a program belongs to one faculty
        return $this->hasOne(Faculty::className(), ['faculty_id' => 'faculty_id']);
    }

}
