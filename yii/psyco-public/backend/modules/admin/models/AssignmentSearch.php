<?php

namespace backend\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

class AssignmentSearch extends User
{
    public $can_name;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['username', 'can_name'], 'string']
			

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
        $query = User::find()->where(['<>', 'user_id', 1])->orderBy('can_name ASC');

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
		$query->andFilterWhere(['like', 'username', $this->username]);
		$query->andFilterWhere(['like', 'can_name', $this->can_name]);
		

        return $dataProvider;
    }
}
