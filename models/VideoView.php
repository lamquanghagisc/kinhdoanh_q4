<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "video_view".
 *
 * @property int $id
 * @property int|null $video_id
 */
class VideoView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video_view';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_id'], 'default', 'value' => null],
            [['video_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'video_id' => 'Video ID',
        ];
    }
    public function getVideo(){
        return $this->hasOne(Video::className(),['id'=>'video_id']);
    }
}
