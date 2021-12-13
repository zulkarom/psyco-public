<?php

namespace backend\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

class AssignmentSearch extends User
{
	public $staff_no;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['user_name', 'staff_name', 'user_email', 'staff_code'], 'string']
			

        ];
    }

    /**
     * @inheritdoc
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
    public function search($params)
    {
        $query = User::find()->where(['<>', 'user_id', 1])->orderBy('staff_name ASC');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'pagination' => [
                'pageSize' => 100,
            ],

        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		$query->andFilterWhere(['like', 'user_name', $this->user_name]);
		$query->andFilterWhere(['like', 'user_email', $this->user_email]);
        $query->andFilterWhere(['like', 'staff_code', $this->staff_code]);
		$query->andFilterWhere(['like', 'staff_name', $this->staff_name]);
		

        return $dataProvider;
    }
}
