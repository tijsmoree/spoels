<?php

namespace app\models;

use Yii;
use yii\base\Model;
//use app\models\Person;

class ProfileForm extends Model {
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $date_of_birth;

    public function rules() {
        return [
            [['first_name', 'last_name', 'email', 'phone'], 'required'],
            ['email', 'email'],
            ['phone', 'number'],
            //['date_of_birth', 'date'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'first_name' => 'Voornaam',
            'last_name' => 'Achternaam',
            'email' => 'Mailadres',
            'phone' => 'Telefoonnummer',
            'date_of_birth' => 'Geboortedatum',
        ];
    }

    public function update($person) {
        if($this->validate()) {
            $person->first_name = $this->first_name;
            $person->last_name = $this->last_name;
            $person->email = $this->email;
            $person->phone = $this->phone;
            $person->save();

            return true;            
        }
        return false;
    }
}
