<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

class UserSearch extends User
{
    public $firstname;

    public function rules()
    {
        return [
            [['id','departament_id'], 'integer'],
            [['username', 'email', 'real_name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search()
    {
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'id' => ['default' => SORT_DESC],
                    'username' => ['default' => SORT_DESC],
                    'real_name' => ['default' => SORT_DESC],
                    'departament_id' =>['default' => SORT_DESC],
                ]
            ]
        ]);


        return $dataProvider;
    }
}