<?php
/**
 * Created by PhpStorm.
 * User: U1
 * Date: 27.10.2016
 * Time: 19:41
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;


$this->title = 'Отчеты';

?>
<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
<script>
    tinymce.init({
        selector: '.description',
        plugins : 'advlist autolink link image  preview  contextmenu  textcolor',
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor emoticons'
    });
    tinymce.init({
        selector: '.description1',
        plugins : 'advlist autolink link image  preview  contextmenu  textcolor',
        toolbar: 'insertfile undo redo | bold italic | numlist | emoticons'
    });

</script>
<div class="body-content"  >
    <div class="col-md-8" style="background-color: #fcfcfc;">
        <div class="row">
            <h4>Отчет за период <?php print $report->start; ?> - <?php print $report->end ?></h4>
        </div>
        <div class="row">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php
            for ($i=0; $i < $count; $i++ ){
                $form = ActiveForm::begin([
                'enableClientValidation' => false,
                 'action' => 'update',
                'options'=>[
                    'enctype'=>'mltipart/form-data',
                ],
            ]);
            ?>
            <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php print $models[$i]->number; ?>" aria-expanded="true" aria-controls="collapseOne">
                                <?php print $models[$i]->number.". ".$models[$i]->title." (".$models[$i]->timer.")"; ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse<?php print $models[$i]->number; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                <?php
               // print '<h3>Задача №'.$models[$i]->number.'</h3>';
                print $form->field($models[$i], 'title')->textInput(['maxlength' => 255])->label('Название');
                print $form->field($models[$i], 'report_id')->hiddenInput()->label(false);
                print $form->field($models[$i], 'id')->hiddenInput()->label(false);
                print $form->field($models[$i], 'number')->hiddenInput()->label(false);
                print $form->field($models[$i], 'body')->textarea(['class'=>'description'])->label('Описание');
                print $form->field($models[$i], 'timer')-> textInput(['type'=>'number','min'=>'0', 'step'=>'0.5',  'style'=>'width:100px; display: inline;'])->label('Затраты');
                echo Html::submitButton('Обновить', ['class' => 'btn btn-primary']);
                $form->end();
                ?>
                </div>
            </div>
                </div>

                <?php
            }
            ?>

            </div>
    </div>

    </div>
    <div class="col-md-3">
        <br>  <br>
        <?php echo Html::button('К списку', ['class' => 'btn btn-info',
            'onclick' => "location.href='index?id=".$user_id."'"]);
        ?>
    </div>
    <div class="col-md-8"><h4>Новая задача</h4></div>
    <div class="col-md-8">
    <?php  $form = ActiveForm::begin([


        'enableClientValidation' => false,
        'options'=>[
            'enctype'=>'multipart/form-data',
            'method'=>'post'
        ],
    ]);
    ?>
        <div class="row">
            <input class="form-control" value="<?php print $report->id; ?>" type="hidden" name="report_id">
        </div>

        <div class="row">
            Название:<br>
            <input class="form-control" value="<?php print (int)$count+1; ?>" type="hidden" name="number">
        </div>

        <div class="row">
            <input class="form-control" type="text" name="title">
        </div>
        <div class="row">
            Описание:<br>
            <textarea class="form-control description"  name="body"></textarea>
        </div>
        <div class="row" style="display: inline">
          Затрачено:  <input class="form-control" style="width:100px; display: inline;" type="number" min="0" step="0.5" size="6" name="timer">
             часов &nbsp;&nbsp;&nbsp;&nbsp; <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary']); ?>
        </div>

        <?php $form->end(); ?>
    </div><br>

        <div class="col-md-6" style="margin-left: 10px ">
            <div class="row">
                <?php

                $form = ActiveForm::begin([
                    'enableClientValidation' => false,
                    'action' => 'notes',
                    'options'=>[
                        'enctype'=>'mltipart/form-data',
                    ],
                ]);
                print $form->field($report, 'liked')->textarea(['class'=>'description1'])->label('Нравится:');
                print $form->field($report, 'unliked')->textarea(['class'=>'description1'])->label('Не нравится;');
                print $form->field($report, 'offer')->textarea(['class'=>'description1'])->label('Предложения:');
                print $form->field($report, 'id')->hiddenInput()->label(false);
                echo Html::submitButton('Обновить', ['class' => 'btn btn-primary']);
                $form->end();
                ?>
            </div>

        </div>



</div>
<script>
 //   $('.collapse').collapse()
</script>