<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "place_session".
 *
 * @property integer $ps_id
 * @property integer $course_id
 * @property string $ps_start
 * @property string $ps_end
 * @property integer $place_id
 * @property integer $group_id
 */
class PlaceSession extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'place_session';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'ps_start', 'ps_end', 'place_id', 'group_id'], 'required'],
            [['course_id', 'place_id', 'group_id'], 'integer'],
            [['ps_start', 'ps_end'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ps_id' => 'Ps ID',
            'course_id' => 'Course ID',
            'ps_start' => 'Ps Start',
            'ps_end' => 'Ps End',
            'place_id' => 'Place ID',
            'group_id' => 'Group ID',
        ];
    }

    public function getAttendance(){

        return $this->hasMany(Attendance::className(), ['ps_id' => 'ps_id']);
    }

    public function getGroup(){

        return $this->hasOne(Group::className(), ['group_id' => 'group_id']);
    }

    public function getCourse(){

        return $this->hasOne(Course::className(), ['course_id' => 'course_id']);
    }

    public function getPlace(){
        
        return $this->hasOne(Place::className(), ['place_id' => 'place_id']);
    }
}
