<?php

namespace app\models;

use Yii;
use yii\base\Model;

class PasswordForm extends Model {
    public $password;
    public $reenter;

    public function rules() {
        return [
            [['password', 'reenter'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'password' => 'Wachtwoord',
            'reenter' => 'Nogmaals',
        ];
    }

    public function update($admin) {
        if($this->validate() && $this->password == $this->reenter) {
            $admin->password = $this->password;
            $admin->save();

            return true;            
        }
        return false;
    }
}
