<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Candidate;

/**
 * ResultSearch represents the model behind the search form of `backend\models\Candidate`.
 */
class ResultSearch extends Candidate
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'can_batch', 'can_zone', 'finished_at', 'answer_status', 'answer_status2', 'overall_status', 'question_last_saved', 'created_at', 'updated_at', 'user_active', 'user_deleted', 'user_account_type', 'user_has_avatar', 'user_creation_timestamp', 'user_suspension_timestamp', 'user_last_login_timestamp', 'user_failed_logins', 'user_last_failed_login', 'user_password_reset_timestamp'], 'integer'],
            [['session_id', 'username', 'auth_key', 'matric_no', 'program', 'password_hash', 'password_reset_token', 'email', 'can_name', 'department', 'answer_last_saved', 'answer_last_saved2', 'verification_token', 'user_remember_me_token', 'user_activation_hash', 'user_password_reset_hash', 'user_provider_type'], 'safe'],
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
    public function search($params)
    {
        $query = Candidate::find()
        ->alias('c')
        ->joinWith(['batch b', 'answer a'])
        ->where(['!=' ,'c.id', 1]);

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
            'id' => $this->id,
            'status' => $this->status,
            'can_batch' => $this->can_batch,
            'can_zone' => $this->can_zone,
            'finished_at' => $this->finished_at,
            'answer_status' => $this->answer_status,
            'answer_status2' => $this->answer_status2,
            'overall_status' => $this->overall_status,
            'question_last_saved' => $this->question_last_saved,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_active' => $this->user_active,
            'user_deleted' => $this->user_deleted,
            'user_account_type' => $this->user_account_type,
            'user_has_avatar' => $this->user_has_avatar,
            'user_creation_timestamp' => $this->user_creation_timestamp,
            'user_suspension_timestamp' => $this->user_suspension_timestamp,
            'user_last_login_timestamp' => $this->user_last_login_timestamp,
            'user_failed_logins' => $this->user_failed_logins,
            'user_last_failed_login' => $this->user_last_failed_login,
            'user_password_reset_timestamp' => $this->user_password_reset_timestamp,
        ]);

        $query->andFilterWhere(['like', 'session_id', $this->session_id])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'matric_no', $this->matric_no])
            ->andFilterWhere(['like', 'program', $this->program])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'can_name', $this->can_name])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'answer_last_saved', $this->answer_last_saved])
            ->andFilterWhere(['like', 'answer_last_saved2', $this->answer_last_saved2])
            ->andFilterWhere(['like', 'verification_token', $this->verification_token])
            ->andFilterWhere(['like', 'user_remember_me_token', $this->user_remember_me_token])
            ->andFilterWhere(['like', 'user_activation_hash', $this->user_activation_hash])
            ->andFilterWhere(['like', 'user_password_reset_hash', $this->user_password_reset_hash])
            ->andFilterWhere(['like', 'user_provider_type', $this->user_provider_type]);

        return $dataProvider;
    }
}
