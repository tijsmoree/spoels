<?php

namespace app\models;

use yii\db\ActiveRecord;

class Person extends ActiveRecord {
	public function rules()
    {
        return [
            [['id'], 'integer'],
            [['active'], 'boolean'],
            [['first_name', 'last_name', 'email'], 'safe'],
            [['phone'], 'integer']
        ];
    }

    public static function tableName() {
		return '{{persons}}';
	}

	public static function getAll() {
		$persons = Person::findAll(['active' => true]);
        
        usort($persons, function($a, $b) {
            return strcmp($a->last_name, $b->last_name);
        });

        return $persons;
	}
}