<?php

/* @var $this yii\web\View */

$this->title = 'Сотрудники';

?>
<div class="site-index">



    <div class="body-content">

        <div class="row">

                <h2>Сотрудники</h2>
                <?php
                $this->title = 'Сотрудники';
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
                                'attribute' => 'real_name',
                                'label' => 'Имя',
                                'options' => ['width' => '200']
                            ],

                            [
                                'attribute' => 'username',
                                'label' => 'Логин',
                                'options' => ['width' => '200']
                            ],

                            [
                                'attribute' => 'email',
                                'label' => 'Email',
                                'options' => ['width' => '200']
                            ],
                            [
                                'attribute' => 'departament_id',
                                'label' => 'Отдел',
                                'options' => ['width' => '200'],
                                'value' => function($model){
                                    $departament = \common\models\Departament::findIdentity(['id' => $model->departament_id]);
                                    return $departament['name'];
                                }
                            ],

                        ]
                    ]
                );

                ?>

                <p><a class="btn btn-success" href='signup'>Добавить сотрудника</a></p>


        </div>

    </div>
</div>
