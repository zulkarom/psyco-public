<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Candidate;
use yii\helpers\ArrayHelper;
/**
 * ResultSearch represents the model behind the search form of `backend\models\Candidate`.
 */
class ResultSearch extends Candidate
{
    public $others = null;
    public $bat_id;

    public $col1;
    public $col2;
    public $col3;
    public $col4;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'can_batch', 'bat_id'], 'integer'],
            [['others'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */

    private function columResultAnswers(){
        $result = Domain::find()->where(['bat_id' => $this->bat_id])->all();

        $colum = ["c.id", "c.username", "c.can_name", "b.bat_text" ,
        "a.answer_status", "a.overall_status", "a.finished_at", 'b.column1', 'b.column2', 'b.column3', 'b.column4'];
        $c=1;
        
        foreach($result as $row){
        if($c==1){$comma="";}else{$comma=", ";}
            $str = "";
            $quest = Question::find()->where(['grade_cat' => $row->grade_cat])->all();
            $i=1;
            $jumq = count($quest);
            // echo $jumq;die();
            foreach($quest as $rq){
                if($i == $jumq){$plus = "";}else{$plus=" + ";}
                $str .= "IF(q".$rq->que_id ." > 0,1,0) ". $plus ;
            $i++;
            }
            $str .= " as c". $row->grade_cat;
        $c++;  
        $colum[] = $str; 
        }
        return $colum;
    }

    public function search($params)
    {
        $array_filter = [];
        $colum = Demographic::find()
        ->select('DISTINCT(column_id)')
        ->where(['bat_id' => $this->bat_id])
        ->all();

        foreach($colum as $col){
            $demos = Demographic::find()
            ->where(['bat_id' => $this->bat_id, 'column_id' => $col->column_id])
            ->all();
            
            $array_filter[$col->column_id] = ArrayHelper::map($demos, 'id', 'demo_value'); 
            
        }

        
        $query = Answer::find()
        ->alias('a')
        ->joinWith(['batch b', 'candidate c'])
        ->select($this->columResultAnswers())
        ->andWhere(['b.id' => $this->bat_id]);

        if($array_filter){
            foreach($array_filter as $key => $val){
                $query->andWhere(['a.column' . $key => $val]);
            }
        }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'status' => $this->status,
            'can_batch' => $this->can_batch,
        ]);


        $query->andFilterWhere(['or',
            ['like', 'username', $this->others],
            ['like', 'can_name', $this->others]
        ]);
            

        return $dataProvider;
    }
}
