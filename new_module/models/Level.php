<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "level".
 *
 * @property integer $level_id
 * @property string $level_name
 */
class Level extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_name'], 'required'],
            [['level_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'level_id' => 'Level ID',
            'level_name' => 'Level Name',
        ];
    }

    public function getUser(){

        return $this->hasMany(User::className(), ['level_id' => 'level_id']);
    }
}
