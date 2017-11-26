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
            //['date_of_birth', 'date', 'format' => 'yyyy-mm-dd'],
            ['phone', 'number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'first_name' => 'Voornaam',
            'last_name' => 'Achternaam',
            'email' => 'Mailadres',
            'phone' => 'Telefoonnummer',
            //'date_of_birth' => 'Geboortedatum',
        ];
    }

    public function update($person) {
        if($this->validate()) {
            $person->first_name = $this->first_name;
            $person->last_name = $this->last_name;
            $person->email = $this->email;
            $person->phone = $this->phone;
            //$person->date_of_birth = '07-21-1997';//Yii::$app->formatter->asDate($this->date_of_birth, 'php:Y-m-d');
            $person->save();

            return true;            
        }
        return false;
    }
}
