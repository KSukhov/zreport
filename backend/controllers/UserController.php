<?php
namespace backend\controllers;
/**
 * Created by PhpStorm.
 * User: U1
 * Date: 25.10.2016
 * Time: 12:04
 */


use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use backend\models\SignupForm;
use common\models\UserSearch;

class UserController extends Controller
{
    /**
     * List of users.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                return $this->redirect('index');
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

}