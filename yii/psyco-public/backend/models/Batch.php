<?php

namespace backend\models;

use Yii;

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
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Bat ID',
            'bat_text' => 'Bat Text',
        ];
    }
}
