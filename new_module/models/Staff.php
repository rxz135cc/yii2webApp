<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property integer $staff_id
 * @property string $staff_workid
 * @property string $staff_name
 * @property string $staff_email
 * @property integer $dept_id
 * @property string $staff_gred
 * @property integer $faculty_id
 * @property integer $campus_id
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staff_email'], 'required'],
            [['dept_id', 'faculty_id', 'campus_id'], 'integer'],
            [['staff_workid'], 'string', 'max' => 60],
            [['staff_name'], 'string', 'max' => 155],
            [['staff_email'], 'string', 'max' => 80],
            [['staff_gred'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'staff_id' => 'Staff ID',
            'staff_workid' => 'Staff Workid',
            'staff_name' => 'Staff Name',
            'staff_email' => 'Staff Email',
            'dept_id' => 'Dept ID',
            'staff_gred' => 'Staff Gred',
            'faculty_id' => 'Faculty ID',
            'campus_id' => 'Campus ID',
        ];
    }

    public function getTeach(){

        return $this->hasMany(Teach::className(), ['staff_id' => 'staff_id']);
    }

    public function getAuthorizer(){

        return $this->hasMany(Authorizer::className(), ['staff_id' => 'staff_id']);
    }

    public function getClinic(){

        return $this->hasMany(Clinic::className(), ['staff_id' => 'staff_id']);
    }

    public function getUser(){

        return $this->hasMany(User::className(), ['staff_id' => 'staff_id']);
    }

    public function getNotifyEmail(){

        return $this->hasMany(NotifyEmail::className(), ['staff_id' => 'staff_id']);
    }

    public function getDepartment(){

        return $this->hasOne(Department::className(), ['dept_id' => 'dept_id']);
    }

    public function getFaculty(){

        return $this->hasOne(Faculty::className(), ['faculty_id' => 'faculty_id']);
    }

    public function getCampus(){

        return $this->hasOne(Campus::className(), ['campus_id' => 'campus_id']);
    }

}
