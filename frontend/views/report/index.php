
<style>
    .form-control {
        color:green;
        width: 100px;

    }
</style>

<div class="body-content">
            <h2>Отчеты</h2>
<?php

/* @var $this yii\web\View */

use dosamigos\datepicker\DatePicker;

$this->title = 'Отчеты';
echo \yii\grid\GridView::widget(
    [

        'dataProvider' => $dataProvider,

        'columns' => [
            [
                'attribute' => 'id',
                'label' => 'ID',
                'options' => ['width' => '50px']
            ],

            [
                'attribute' => 'end',
                'label' => 'Период',
                'options' => ['width' => '200'],
                'format' => 'raw',
                'value' => function($model) {
                    if($model->sended !=1) {
                        $content = "<a href='/report/edit?id=" . $model->id . "'' > C " . $model->start . " по " . $model->end . "</a>";
                    } else {
                        $content = "<a target=_blanck href='/report/show?id=" . $model->id . "'' > C " . $model->start . " по " . $model->end . "</a>";
                    }
                    return $content;
                 }
            ],

            [
                'attribute' => 'sended',
                'label' => 'Статус',
                'format' => 'raw',
                'options' => ['width' => '200'],
                'value' => function($model) {
                    if($model->sended) {
                        $content = 'Отправлен';
                    } else {
                        $content = 'В работе';
                    }
                    return $content;
                }
            ],

            [

                'label' => 'Отправить отчет','format' => 'raw',
                'options' => ['width' => '200'],
                'value' => function($model) {
                    $content = "<form action='send'><table><tr><td>";

                    $content .= '&nbsp;</td><td>&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-success" value="Отправить"';
                   if($model->sended) { $content .= 'disabled' ; }
                    $content .= '></td><td></td></tr></table>';
                    $content .= '<input type = "hidden" name ="id" value="'.$model->id.'" ></form>';
                    return $content;

                }
            ]

            ]
    ]
);

?>


    </div>

