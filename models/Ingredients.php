<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Recipe;

class Ingredients extends ActiveRecord {
	public function rules() {
        return [
            [['id', 'recipe_id'], 'integer'],
            [['name', 'amount'], 'safe']
        ];
    }

    public static function tableName() {
		return '{{ingredients}}';
	}
}