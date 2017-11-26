<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RecipeForm extends Model {
    public $name;
    public $time;
    public $persons;
    public $ingredients;
    public $body;

    public function rules() {
        return [
            [['name', 'body'], 'required'],
            ['time', 'time'],
            ['persons', 'number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Naam',
            'time' => 'Tijdsduur',
            'persons' => 'Aantal personen',
            'ingredients' => 'Ingrediënten',
            'body' => 'Bereidingswijze',
        ];
    }

    public function insert($recipe) {
        if($this->validate()) {
            $person->name = $this->name;
            $person->time = $this->time;
            $person->persons = $this->persons;
            $person->body = $this->body;
            $person->insert();

            return true;            
        }
        return false;
    }
}
