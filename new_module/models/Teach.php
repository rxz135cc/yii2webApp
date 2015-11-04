<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "teach".
 *
 * @property integer $teach_id
 * @property integer $staff_id
 * @property integer $group_id
 */
class Teach extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teach';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staff_id', 'group_id'], 'required'],
            [['staff_id', 'group_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'teach_id' => 'Teach ID',
            'staff_id' => 'Staff ID',
            'group_id' => 'Group ID',
        ];
    }

    public function getGroup(){

        return $this->hasOne(Group::className(), ['group_id' => 'group_id']);
    }

    public function getStaff(){

        return $this->hasOne(Staff::className(), ['staff_id' => 'staff_id']);
    }
}
