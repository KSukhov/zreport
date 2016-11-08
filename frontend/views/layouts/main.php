<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\Report;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'zreports',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [ ];
    if (Yii::$app->user->isGuest) {
     //   $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => 'Home', 'url' => ['/site/index']];
        $menuItems[] = ['label' => 'Отчеты', 'url' => ['/report/index?id='.Yii::$app->user->identity->id]];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    <?php
    if (!Yii::$app->user->isGuest) {
        $user_id = Yii::$app->user->identity->id."test";
        $records = Report::find()->where(['user_id'=>$user_id, 'notific'=>null]);
        if($records->count() > 0) {
            foreach ($records->all() as $record){
        ?>

        <script>
            Notification.requestPermission();
            var mailNotification = new Notification("Администратор", {
                tag : "report",
                body : "Запрошен отчет",
                icon : "http://risovach.ru/upload/2013/05/mem/master-joda_18202039_orig_.jpg"
            });
            mailNotification.onclick = function(){
                location.href='/report/edit?id=<?php print $record->id ?>'
            }
            mailNotification.onerror = function(){
                console.log("permission state = default or denied");
            };
        </script>
    <?php }

            $record->notific=1;
            $record->save();
        }

    } ?>

</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; zdorov <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
