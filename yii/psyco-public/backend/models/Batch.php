<?php

namespace backend\models;

use Yii;
use common\models\Common;
/**
 * This is the model class for table "psy_batch".
 *
 * @property int $bat_id
 * @property string $bat_text
 */
class Batch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'psy_batch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bat_text'], 'required'],
            [['bat_text'], 'string', 'max' => 100],
            [['column1', 'column2', 'column3'], 'string', 'max' => 225],
            [['bat_show'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Bat ID',
            'bat_text' => 'Batch',
            'bat_show' => 'Showing',
            'column1' => 'Column 1',
            'column2' => 'Column 2',
            'column3' => 'Column 3'
        ];
    }

    public static function countBatches(){
        return self::find()
        ->count();
    }

    public function getShowText(){
        return Common::showing()[$this->bat_show];
    }

    public function getAnswer()
    {
        return $this->hasOne(Batch::className(), ['id' => 'can_batch']);
    }
}
