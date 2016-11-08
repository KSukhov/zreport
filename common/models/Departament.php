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
class Departament extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departament';
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
            ['name', 'string'],
            ['id', 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }
    public static function getDepartaments()
    {
        return static::find()->asArray()->all() ;// fetchAll();// findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }
    public static function getDepartamentList()
    {
        $depapartaments = array();
        $deps = static::find()->asArray()->all();
        foreach($deps as $dep){
            $depapartaments[ $dep["id"]] = $dep["name"];

        }
        return $depapartaments;
    }

    /**
     * Finds departament by name
     *
     * @param string $name
     * @return static|null
     */

    public static function findByName($name)
    {
        return static::findOne(['name' => $name]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
}
