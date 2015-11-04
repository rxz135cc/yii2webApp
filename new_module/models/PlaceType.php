<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "place_type".
 *
 * @property integer $pt_id
 * @property string $pt_name
 */
class PlaceType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'place_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pt_name'], 'required'],
            [['pt_name'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pt_id' => 'Pt ID',
            'pt_name' => 'Pt Name',
        ];
    }

    public function getPlace(){

        return $this->hasMany(Place::className(), ['pt_id' => 'pt_id']);
    }
}
