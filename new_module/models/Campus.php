<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "campus".
 *
 * @property integer $campus_id
 * @property string $campus_name
 */
class Campus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'campus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['campus_name'], 'required'],
            [['campus_name'], 'string', 'max' => 155]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'campus_id' => 'Campus ID',
            'campus_name' => 'Campus Name',
        ];
    }

    public function getStaff(){

        return $this->hasMany(Staff::className(), ['campus_id' => 'campus_id']);
    }

    public function getStudent(){

        return $this->hasMany(Student::className(), ['campus_id' => 'campus_id']);
    }
}
