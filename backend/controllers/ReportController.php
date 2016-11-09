<?php
namespace backend\controllers;
/**
 * Created by PhpStorm.
 * User: U1
 * Date: 25.10.2016
 * Time: 12:04
 */



use common\models\Union;
use Yii;
use yii\web\Controller;
use common\models\User;
use common\models\Departament;
use common\models\DepartamentSearch;
use common\models\ReportSearch;
use common\models\Report;
use common\models\ReportItem;
use common\models\UnionSearch;

class ReportController extends Controller
{
    /**
     * List of reports.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search();
        $searchUnionModel = new UnionSearch();


        $dataUnionProvider = $searchUnionModel->search();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchUnionModel' => $searchUnionModel,
            'dataUnionProvider' => $dataUnionProvider,
        ]);
    }

    public function actionShow(){
        $this->layout = 'print';
        $get = \Yii::$app->request->get();
        $report = Report::findIdentity($get['id']);
        $items = ReportItem::getItems($get['id']);
        $user = User::findOne(['id' => $report->user_id ]);
        return $this->render('show',['report' => $report, 'items' => $items, 'user' => $user->real_name]);
    }
    public function actionShowUnion(){
        $this->layout = 'print';
        $get = \Yii::$app->request->get();
        $union = Union::findIdentity($get['id']);
        $reports = Report::find()->where(['union_id' =>  $get['id']])->asArray()->all();

        $items = array();
        foreach ( $reports as $report) {
            $items[] = ReportItem::getItems($report['id']);
        }
        return $this->render('show-union',['union' => $union, 'reports' => $reports, 'items' => $items]);
    }
public function actionSend()
    {
        $get = \Yii::$app->request->get();
        $report = Report::findOne(['id' => $get['id']]);
        $report->sended = 1;
        $report->save();
        return $this->redirect('index?id='.$get['id']);
    }
    public function actionBackto()
    {
        $get = \Yii::$app->request->get();
        $report = Report::findOne(['id' => $get['id']]);
        $report->sended = 0;
        $report->save();
        return $this->redirect('index');
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
