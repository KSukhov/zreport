<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Departament;

class ReportSearch extends Report
{

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['start', 'end','created_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($user_id=null)
    {
        $query = Report::find();
      if($user_id)
        $query = Report::find()->where(['user_id'=>$user_id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'created_at' => ['default' => SORT_DESC],
                    'id' => ['default' => SORT_ASC],
                    'start' => ['default' => SORT_DESC],
                    'end' => ['default' => SORT_DESC],
                    'sended' => ['default' => SORT_DESC],

                ]
            ]
        ]);


        return $dataProvider;
    }
}