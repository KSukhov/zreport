<?php
namespace backend\models;
/**
 * Created by PhpStorm.
 * User: U1
 * Date: 25.10.2016
 * Time: 19:25
 */
use Yii;
use yii\base\Model;
use Codeception\Lib\Interfaces\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\db\Query;
use common\models\Departament;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property integer $created_at
 * @property integer $updated_at
 */

class User extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }

}