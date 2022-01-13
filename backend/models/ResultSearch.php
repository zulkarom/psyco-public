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
    public $limit;
    public $domainOrder;
    public $column1;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'can_batch', 'bat_id', 'limit'], 'integer'],
            [['column1'], 'string', 'max' => 225],
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
        "a.answer_status", "a.overall_status", "a.finished_at", 
        'a.column1', 'a.column2', 'a.column3', 'a.column4'];
        $c=1;
        
        $str_order = "";
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
            $str_order .= $comma."c". $row->grade_cat." DESC";
        $c++;  
        $colum[] = $str; 
        }
        $this->domainOrder = $str_order;
        return $colum;
    }

    public function search($params)
    {

        // SELECT answer_status AS c1, overall_status AS c2, column1 FROM `psy_answers` WHERE column1 IN("PTPTN", "JABATAN DASAR") ORDER BY c1 ASC, c2 ASC, FIELD(column1, "PTPTN", "JABATAN DASAR"),  FIELD(column2, "32", "33")
        
        $order = ''; //// in case takde selection domain
        
        $select = $this->columResultAnswers();
        $order .= $this->domainOrder; //// .= append string order
        $comma = $this->domainOrder ? '' : ','; 
        $order .= $comma; //// klu ada domain order baru start dgn comma

        $array_filter = [];
        $colum = Demographic::find()
        ->select('DISTINCT(column_id)')
        ->where(['bat_id' => $this->bat_id])
        ->all();
        
        if($colum){ //// kena pastikan ada dulu baru foreach
            foreach($colum as $i => $col){
                $demos = Demographic::find()
                ->where(['bat_id' => $this->bat_id, 'column_id' => $col->column_id])
                ->all();
                
                $array_filter[$col->column_id] = ArrayHelper::map($demos, 'id', 'demo_value'); 
                
            }
        }
        
        if($array_filter){ //////// string order field kat sini
            $i = 1;
            foreach($array_filter as $key => $val){
                $comma = $i == 0 ? '' : ','; ////yg kedua seterusnya kena comma
                $order .= $comma. 'FIELD(column'.$key.', '. $this->arrayToStr($val) .')';
            $i++;
            }
        }
        

        // echo $limit;
        // die();
        $query = Answer::find()
        ->alias('a')
        ->joinWith(['batch b', 'candidate c'])
        ->select($select)
        ->orderBy($order) /// guna string biasa
        ->andWhere(['b.id' => $this->bat_id])
        ->limit($this->limit);
        

        if($array_filter){
            foreach($array_filter as $key => $val){
                $query->andWhere(['a.column' . $key => $val]);

            }
        }
        // echo $this->domainOrder;
        // die();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
            // 'pagination' => [
            //     'pageSize' => $this->limit,
            // ],
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
    
    private function arrayToStr($array){
        if($array){
            $str = '';
            $i = 0;
            foreach($array as $a){
                $comma = $i == 0 ? '': ',';
                $str .= $comma. '"' . $a . '"'; //// letak double quote
                $i++;
            }
            return $str;
        }else{
            return '';
        }
    }
}
