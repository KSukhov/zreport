<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Departament;

class DepartamentSearch extends Departament
{
    public $firstname;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search()
    {
        $query = Departament::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'id' => ['default' => SORT_DESC],
                    'name' => ['default' => SORT_DESC]
                ]
            ]
        ]);


        return $dataProvider;
    }
}