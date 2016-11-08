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
 * @property \data $start
 * @property \data $end
 * @property integer $user_id
 * @property integer $sended
 * @property integer $aprove
 * @property integer $notific
 *
 */
class Report extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report';
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
            ['user_id', 'number'],
            ['id', 'integer'],
            [['start','end'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }
    public static function getReports()
    {
        return static::find()->asArray()->all() ;// fetchAll();// findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
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
