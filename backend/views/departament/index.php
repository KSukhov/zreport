
<style>
    .form-control {
        color:green;
        width: 100px;

    }
</style>
<?php

/* @var $this yii\web\View */

use dosamigos\datepicker\DatePicker;
?>
<div class="site-index">



    <div class="body-content">

        <div class="row">

                <h2>Отделы</h2>
<?php
$this->title = 'Отделы';
echo \yii\grid\GridView::widget(
    [

        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'label' => 'ID',
                'options' => ['width' => '50px']
            ],

            [
                'attribute' => 'name',
                'label' => 'Название',
                'options' => ['width' => '200']
            ],

            [

                'label' => 'Последний отчет',
                'options' => ['width' => '200'],
                'format' => 'raw',
                'value' => function($model){
                 $union =   \common\models\Union::find()->where(['departament_id' => $model->id])->OrderBy('created_at desc')->limit(1)->asArray()->all();

                    if(isset($union[0])) {
                        $union = $union[0];
                        $content = date('Y-m-d H:i:s', $union['created_at']) . ' ( C ' . $union['start'] . ' по ' . $union['end'] . ')';
                        $d1 = date_create(date('Y-m-d H:i:s'));
                        $d2 = date_create(date('Y-m-d H:i:s', $union['created_at']));
                        $interval = date_diff($d1, $d2);

                        if($interval->format('%d') < 1)
                            $content = '<span style="color:red; font-weight: bold">'.$content.'</span>';
                        return $content;
                    } else {
                        return "-";
                    }
                }
            ],

            [

                'label' => 'Запросить отчет','format' => 'raw',
                'options' => ['width' => '300'],
                'value' => function($model) {
                    $content = "<form action='request'><table><tr><td>С &nbsp;</td><td>";
                    $content .= DatePicker::widget([
                        'name'  => 'from_date',
                        'value'  => date('Y-m-d'),
                        'inline' => true,
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ]);
                    $content .= "</td><td>&nbsp; По &nbsp;</td><td>&nbsp;";
                    $content .= DatePicker::widget([
                        'name'  => 'to_date',
                        'value'  => date('Y-m-d'),
                        'inline' => true,
                        'class' => 'md',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ]);
                    $content .= '&nbsp;</td><td>&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-success" value="Запрос"><td></td></tr></tr></table>';
                    $content .= '<input type = "hidden" name ="dep_id" value="'.$model->id.'" ></form>';
                    return $content;
                }
            ],
            ]
    ]
);

?>

            <p><a class="btn btn-success" href='add'>Добавить отдел</a></p>



        </div>

    </div>
</div>
