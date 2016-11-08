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
 * @property integer $created_at
 * @property integer $updated_at
 */
class Union extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'union';
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
            [['id', 'departament_id'], 'integer'],
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
    public static function getUnions()
    {
        return static::find()->asArray()->all() ;// fetchAll();// findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }
    public static function getExecution($union_id){
        $users = Report::find()->where(['union_id'=>$union_id])->count() ;
        $send = Report::find()->where(['union_id'=>$union_id, 'sended' => 1])->count() ;
        return array($users,$send) ;
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
