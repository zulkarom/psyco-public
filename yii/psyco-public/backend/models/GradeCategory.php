<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "psy_grade_cat".
 *
 * @property int $id
 * @property string $gcat_text
 * @property int $gcat_order
 */
class GradeCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'psy_grade_cat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gcat_text', 'gcat_order'], 'required'],
            [['gcat_order'], 'integer'],
            [['gcat_text'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gcat_text' => 'Gcat Text',
            'gcat_order' => 'Gcat Order',
        ];
    }

    public static function getGradeCat()
    {
        $query = self::find()
        ->select('gcat_id', 'gcat_text')
        ->orderBy('gcat_order ASC')
        ->all();
    }

    public function columResultAnswers(){
        $result = GradeCategory::find()->all();
        $colum = ["a.id", "a.username", "a.can_name", "a.department", "a.can_zone", "a.can_batch",  "b.bat_text" ,
        "a.answer_status", "a.overall_status", "a.finished_at"];
        $c=1;
        
        foreach($result as $row){
        if($c==1){$comma="";}else{$comma=", ";}
            $str = "";
            $quest = Question::find()->where(['grade_cat' => $row->id])->all();
            $i=1;
            $jumq = count($quest);
            // echo $jumq;die();
            foreach($quest as $rq){
                if($i == $jumq){$plus = "";}else{$plus=" + ";}
                $str .= "IF(q".$rq->que_id ." > 0,1,0) ". $plus ;
            $i++;
            }
            $str .= " as c". $row->id;
        $c++;  
        $colum[] = $str; 
        }
        return $colum;
    }
}
