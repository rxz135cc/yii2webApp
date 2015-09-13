<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property integer $group_id
 * @property string $group_code
 * @property integer $program_id
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_code', 'program_id'], 'required'],
            [['program_id'], 'integer'],
            [['group_code'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'Group ID',
            'group_code' => 'Group Code',
            'program_id' => 'Program',
        ];
    }

    public function getProgram(){

        return $this->hasOne(Program::className(), ['program_id' => 'program_id']);
    }

    public function getTeach(){

        return $this->hasMany(Teach::className(), ['group_id' => 'group_id']);
    }

    public function getPlaceSession(){

        return $this->hasMany(PlaceSession::className(), ['group_id' => 'group_id']);
    }

    public function getStudentGroup(){

        return $this->hasMany(StudentGroup::className(), ['group_id' => 'group_id']);
    }
}
