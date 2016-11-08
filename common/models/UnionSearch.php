<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Departament;
use common\models\Union;

class UnionSearch extends Union
{

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['start', 'end'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search()
    {
        $query = Union::find();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'created_at' => ['default' => SORT_DESC],
                    'departament_id' => ['default' => SORT_DESC],
                    'id' => ['default' => SORT_DESC],
                    'start' => ['default' => SORT_DESC],
                    'end' => ['default' => SORT_DESC],


                ]
            ]
        ]);


        return $dataProvider;
    }
}