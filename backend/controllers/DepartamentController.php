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
use common\models\User;
use common\models\Departament;
use common\models\DepartamentSearch;
use common\models\Report;
use common\models\Union;
use backend\models\AddDepartamentForm;

class DepartamentController extends Controller
{
    /**
     * List of departaments.     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DepartamentSearch();
        $dataProvider = $searchModel->search();
        $deps = Departament::getDepartaments();
        return $this->render('index', [
            'deps'=>$deps,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }
    public function actionAdd()
    {
        $model = new AddDepartamentForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->add();
                return $this->redirect('index');
        }


        return $this->render('add', [
            'model' => $model,
        ]);
    }
    public function actionRequest(){

        $data = \Yii::$app->request->get();

        $union_report = new Union();
        $union_report->start = $data['from_date'];
        $union_report->end = $data['to_date'];
        $union_report->departament_id =$data['dep_id'];
        $union_report->save();
        $union_id = $union_report->id;
        $users = User::findByDepartament($data['dep_id']);
      //  var_dump($users);
        foreach ($users as $user){
            $report = new Report();
            $report->user_id = $user['id'];
            $report->start = $data['from_date'];
            $report->end = $data['to_date'];
            $user = User::findIdentity($user['id']);
            $user->report =  $user->report + 1;
            $report->union_id = $union_id;
            $user->save();
          //  $report->departa = $data['dep_id'];
            $report->save();
        }

        return $this->redirect('index');
    }

}
