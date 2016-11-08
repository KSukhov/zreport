<?php
namespace backend\models;

use yii\base\Model;
use common\models\Departament;

/**
 * Signup form
 */
class AddDepartamentForm extends Model
{
    public $name;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'trim'],
            ['name', 'required']
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */

    public function add()
    {
        $departament = new Departament();
        $departament->name = $this->name;
        
        return $departament->save();
    }
}
