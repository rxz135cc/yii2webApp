<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "place".
 *
 * @property integer $place_id
 * @property string $place_name
 * @property integer $pt_id
 */
class Place extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'place';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place_name', 'pt_id'], 'required'],
            [['pt_id'], 'integer'],
            [['place_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'place_id' => 'Place ID',
            'place_name' => 'Place Name',
            'pt_id' => 'Pt ID',
        ];
    }

    public function getPlaceSession(){

        return $this->hasMany(PlaceSession::className(), ['place_id' => 'place_id']);
    }

    public function getPlaceType(){

        return $this->hasOne(PlaceType::className(), ['pt_id' => 'pt_id']);
    }
}
