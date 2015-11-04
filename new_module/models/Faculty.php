<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "faculty".
 *
 * @property integer $faculty_id
 * @property string $faculty_name
 */
class Faculty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faculty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['faculty_name'], 'required'],
            [['faculty_name'], 'string', 'max' => 155]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'faculty_id' => 'Faculty ID',
            'faculty_name' => 'Faculty Name',
        ];
    }

    public function getProgram(){

        //a faculty has many program
        return $this->hasMany(Program::className(), ['faculty_id' => 'faculty_id']);
    }

    public function getStaff(){

        return $this->hasMany(Staff::className(), ['faculty_id' => 'faculty_id']);
    }

}
