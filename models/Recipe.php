<?php

namespace app\models;

use yii\db\ActiveRecord;

class Recipe extends ActiveRecord {
	public function rules()
    {
        return [
            [['id', 'active', 'persons'], 'integer'],
            [['name', 'time', 'ingredients', 'body'], 'safe'],
        ];
    }

    public static function tableName() {
		return '{{recipes}}';
	}

	public static function getAll() {
		$recipes = Recipe::findAll(['active' => true]);
        
        usort($recipes, function($a, $b) {
            return strcmp($a->name, $b->name);
        });

        return $recipes;
	}

    public function getTime() {
        $h = date('G', strtotime($this->time));
        $m = date('i', strtotime($this->time));
        
        if($h == 0) {
            return $m . ' minuten';
        } elseif($m == 0) {
            return $h . ' uur';
        } else {
            return $h . ' uur en ' . $m . ' minuten';
        }
    }

	public function getIngredients() {
		return explode("\r\n", $this->ingredients);
	}
}