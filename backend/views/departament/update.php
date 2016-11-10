<?php

/**
 * @var frontend\controllers\OffersController $controller
 * @var yii\web\View $this
 * @var common\models\ar\Stream $model
 * @var common\models\ar\OfferPostBackUrl $postBackModel
 * @var string $clickLink
 * @var yii\data\ArrayDataProvider $dataProvider
 * @var $this yii\web\View
 * @var $model common\models\ar\Offer
 */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\User;
use common\models\Departament;

$this->title = "Редактировать сотрудника"

?>
<div >

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="offer-form">
        <?php $form = ActiveForm::begin([
            'enableClientValidation' => false,
            'options'=>[
                'enctype'=>'multipart/form-data'
            ],
        ]); ?>
        <div class="row">
            <?= $form->errorSummary($model); ?>
            <div class="col-md-6">
                <?= $form->field($model, 'username')->textInput(['maxlength' => 255])->label("логин сотрудника") ?>
                <?= $form->field($model, 'real_name')->textInput(['maxlength' => 255])->label("Имя сотрудника") ?>
                <?= $form->field($model, 'email')->textInput(['maxlength' => 255])->label("email сотрудника") ?>
                <p class="help-block">
                    <?= $form->field($model, 'departament_id')
                        ->dropDownList(
                            Departament::getDepartamentList(),
                            [
                                'prompt' => 'Выберите отдел'
                            ]);
                    ?>

                </p>

                <div class="form-group">


                    <?= Html::submitButton( 'update', ['class' =>  'btn btn-success' ]) ?>

                </div>
            </div> </div>
        <?php ActiveForm::end(); ?>
    </div>


        </div>
    </div>
</div>