<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bio".
 *
 * @property integer $bio_id
 * @property string $bio_name
 * @property integer $bio_place_num
 */
class Bio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bio_name', 'bio_place_num'], 'required'],
            [['bio_place_num'], 'integer'],
            [['bio_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bio_id' => 'Bio ID',
            'bio_name' => 'Bio Name',
            'bio_place_num' => 'Bio Place Num',
        ];
    }
}
