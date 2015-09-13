<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $student_id
 * @property string $student_matrix
 * @property string $student_name
 * @property integer $program_id
 * @property integer $campus_id
 * @property string $student_phone
 * @property string $student_email
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_matrix', 'student_name', 'program_id', 'campus_id', 'student_phone', 'student_email'], 'required'],
            [['program_id', 'campus_id'], 'integer'],
            [['student_matrix'], 'string', 'max' => 11],
            [['student_name'], 'string', 'max' => 155],
            [['student_phone'], 'string', 'max' => 12],
            [['student_email'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_id' => 'Student ID',
            'student_matrix' => 'Student Matrix',
            'student_name' => 'Student Name',
            'program_id' => 'Program ID',
            'campus_id' => 'Campus ID',
            'student_phone' => 'Student Phone',
            'student_email' => 'Student Email',
        ];
    }

    public function getStudentGroup(){

        return $this->hasMany(StudentGroup::className(), ['student_id' => 'student_id']);
    }

    public function getAttendance(){

        return $this->hasMany(Attendance::className(), ['student_id' => 'student_id']);
    }

    public function getMedicalCertificate(){
        //a student has many medical certificate
        return $this->hasMany(MedicalCertificate::className(), ['student_id' => 'student_id']);
    }

    public function getCampus(){

        return $this->hasOne(Campus::className(), ['campus_id' => 'campus_id']);
    }

    public function getProgram(){

        return $this->hasOne(Program::className(), ['program_id' => 'program_id']);
    }

}
