<style>
    .form-control {
        color:green;
        width: 100px;

    }
</style>
<div class="site-index">
    <div class="body-content">
<?php

/* @var $this yii\web\View */

use dosamigos\datepicker\DatePicker;
use common\models\Union;



$this->title = 'Отчеты';

?>

        <h2>Отчеты</h2>
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
        <a class="otab" href="#lands"  role="tab" data-toggle="tab" id="landtab">Сводные отчеты</a></li>
    <li role="presentation" >
        <a href="#home" class="otab"  role="tab" data-toggle="tab" id="maintab">Персональные отчеты</a></li>

        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="lands">
                <?php echo \yii\grid\GridView::widget(
                    [

                        'dataProvider' => $dataUnionProvider,

                        'columns' => [
                            [
                                'attribute' => 'id',
                                'label' => 'ID',
                                'options' => ['width' => '50px']
                            ],
                            [
                                'attribute' => 'created_at',
                                'label' => 'Запрошен',
                                'options' => ['width' => '50px'],
                                'value' => function($model) {
                                    return date('Y-m-d H:i:s', $model->created_at);
                                },
                            ],


                            [
                                'attribute' => 'departament_id',
                                'label' => 'Отдел',
                                'options' => ['width' => '50px'],
                                'value' => function($model) {
                                    $departament = \common\models\Departament::findIdentity($model->departament_id);
                                    return $departament->name;
                                }

                            ],
                            [
                                'attribute' => 'end',
                                'label' => 'Период',
                                'options' => ['width' => '200'],
                                'format' => 'raw',
                                'value' => function($model) {

                                    $content = "<a target='_blank' href='show-union?id=" . $model->id . "'' > C " . $model->start . " по " . $model->end . "</a>";
                                    return $content;
                                }
                            ],

                            [
                                'label' => 'Исполнение',
                                'options' => ['width' => '30px'],
                                'format' => 'raw',
                                'value' => function($model) {
                                    $content = "";
                                    $result = Union::getExecution($model->id);
                                    $content .= $result[1]." из  ".$result[0];
                                    return $content;
                                }
                            ],
                        ]]);
                ?>
            </div>
            <div role="tabpanel" class="tab-pane " id="home">
<?php echo \yii\grid\GridView::widget(
    [

        'dataProvider' => $dataProvider,

        'columns' => [
                [
                    'attribute' => 'id',
                    'label' => 'ID',
                    'options' => ['width' => '50px']
                ],
            [
                'attribute' => 'created_at',
                'label' => 'Запрошен',
                'options' => ['width' => '50px'],
                'value' => function($model) {
                    return date('Y-m-d H:i:s', $model->created_at);
                },
            ],

                [
                    'attribute' => 'user_id',
                    'label' => 'Сотрудник',
                    'options' => ['width' => '50px'],
                    'value' => function($model) {
                        $user = \common\models\User::findIdentity($model->user_id);
                        return $user->real_name;
                    }
                ],

            [
                'attribute' => 'end',
                'label' => 'Период',
                'options' => ['width' => '200'],
                'format' => 'raw',
                'value' => function($model) {
                    if($model->sended ==1) {
                        $content = "<a href='show?id=" . $model->id . "'' target='_blank' > C " . $model->start . " по " . $model->end . "</a>";
                    } else {
                        $content = " C " . $model->start . " по " . $model->end;
                    }
                    return $content;
                 }
            ],

            [
                'attribute' => 'sended',
                'label' => 'Исполнение',
                'options' => ['width' => '30px'],
                'format' => 'raw',
                'value' => function($model) {
                    if($model->sended) {
                        $content = '<span class="glyphicon glyphicon-ok" style="color: #00aa00"></span>';
                    }
                    else {
                        $content = '<span class="glyphicon glyphicon-time" ></span>';;
                    }
                    return $content;
                }
            ],


            [

                'label' => 'Вернуть','format' => 'raw',
                'options' => ['width' => '300'],
                'value' => function($model) {
                    $content = "<form action='backto'><table><tr><td>";

                    $content .= '&nbsp;</td><td>&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-success" value="Вернуть"';
                   if(!$model->sended) { $content .= 'disabled' ; }
                    $content .= '></td><td></td></tr></table>';
                    $content .= '<input type = "hidden" name ="id" value="'.$model->id.'" ></form>';
                    return $content;
                }
            ],
            ]
    ]
);

?>
          </div>


</div>





    </div>
</div>
<?php


$this->registerJs("
    $('#myTabs a').click(function (e) {
	e.preventDefault();
		$(this).tab('show');
    })
	$('.otab').click(function (e) {
		e.preventDefault();
		document.cookie = 'offer_tab='+this.id;
		// alert(this.id);
	});
	$(document).ready(function () {
		var otab = document.cookie.match ( '(^|;) ?' + 'offer_tab' + '=([^;]*)(;|$)' );
		
		if(otab[2]){
			$('#'+otab[2]).click() ;
		}
		});
	");
    ?>