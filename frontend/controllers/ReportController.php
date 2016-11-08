<?php
namespace frontend\controllers;
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
use common\models\ReportSearch;
use common\models\Report;
use common\models\ReportItem;

class ReportController extends Controller
{
    /**
     * List of reports.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $data = \Yii::$app->request->get();
        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search($data['id']);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }
    public function actionEdit(){

        if ($data = \Yii::$app->request->post()) {
   // var_dump($data);die;
            $item = new ReportItem();
            $item->title = $data['title'];
            $item->timer = $data['timer'];
            $item->body = $data['body'];
            $item->report_id = $data['report_id'];
            $item->number = $data['number'];
            $item->save();

             return $this->redirect('edit?id='.$data['report_id']);

        }
        $data = \Yii::$app->request->get();
        $report = Report::findIdentity($data['id']);
        $items = ReportItem::getItems($data['id']);
        $count = count($items);
        $models = array();
        for($i = 0; $i < $count; $i++){
            $models[] = $this->loadModel($items[$i]["id"]);
        }
      // var_dump($report->user_id); die();
        return $this->render('edit', [
            'report' => $report,
            'user_id' => $report->user_id,
            'models' => $models,
            'count' => $count,
        ]);
    }
    public function actionUpdate(){
        $post = \Yii::$app->request->post();
        $model = $this->loadModel($post["ReportItem"]["id"]);
        if ($model->load($post)){
            $model->save();
           // return 'test';
        }
        return $this->redirect('edit?id='.$post["ReportItem"]["report_id"]);
    }
    public function actionSend()
    {
        $get = \Yii::$app->request->get();
        $report = Report::findOne(['id' => $get['id']]);
        $report->sended = 1;
        $report->save();
        return $this->redirect('index?id='.$report->user_id);
    }
    public function actionShow(){
        $this->layout = 'print';
        $get = \Yii::$app->request->get();
        $report = Report::findIdentity($get['id']);
        $items = ReportItem::getItems($get['id']);
        $user = User::findOne(['id' => $report->user_id ]);
        return $this->render('show',['report' => $report, 'items' => $items, 'user' => $user->username]);
    }
    public function actionNotes(){
        $post = \Yii::$app->request->post();
      //  var_dump($post);die;
        $report = Report::findIdentity($post['Report']['id']);
        $report->liked = $post['Report']['liked'];
        $report->unliked = $post['Report']['unliked'];
        $report->offer = $post['Report']['offer'];
        $report->save();
        return $this->redirect('edit?id='.$post['Report']['id']);
    }
    private function loadModel($id)
    {
        $model = ReportItem::findOne(['id' => $id]);

        if (null === $model) {

            throw new HttpException(404, 'Employee not found.');
        }

        return $model;
    }

}
