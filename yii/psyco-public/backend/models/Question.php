<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "psy_question".
 *
 * @property int $que_id
 * @property string|null $que_text
 * @property string|null $que_text_bi
 * @property int|null $display_cat
 * @property int|null $grade_cat
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'psy_question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['display_cat', 'grade_cat'], 'integer'],
            [['que_text'], 'string', 'max' => 200],
            [['que_text_bi'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'que_id' => 'Que ID',
            'que_text' => 'Que Text',
            'que_text_bi' => 'Que Text Bi',
            'display_cat' => 'Display Cat',
            'grade_cat' => 'Grade Cat',
        ];
    }
}
