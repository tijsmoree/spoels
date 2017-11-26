<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Recipe;

class RecipeForm extends Model {
    public $name;
    public $time;
    public $persons;
    public $ingredients;
    public $body;

    public function rules() {
        return [
            [['name', 'body'], 'required'],
            [['time'], 'date', 'format' => 'HH:mm'],
            [['persons'], 'number'],
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

    public function insert() {
        if($this->validate()) {
            $recipe = new Recipe();
            $recipe->id = Recipe::find()->max('id') + 1;
            $recipe->name = $this->name;
            if($this->time != NULL)
                $recipe->time = $this->time . ':00';
            if($this->persons == NULL) {
                $recipe->persons = 0;
            } else {
                $recipe->persons = $this->persons;
            }
            $recipe->body = $this->body;
            $recipe->insert();

            return true;            
        }
        return false;
    }
}
