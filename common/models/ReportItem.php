<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $name
 */
class ReportItem extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report_item';

    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['report_id', 'number'],
            ['id', 'integer'],
            [['title','body','report_id', 'timer'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }
    public static function getItems($report_id)
    {

        $items = static::find()->where(['report_id' => $report_id])->asArray()->all();
      //  var_dump($items);die($report_id);
        return $items;
    }

    /**
     * Finds report by date
     *
     * @param number $user_id
     * @return static|null
     */

    public static function findByDate($start, $end)
    {

    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
}
