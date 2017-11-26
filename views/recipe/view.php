<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = $recipe->name;
$this->params['breadcrumbs'][] = ['label' => 'Recepten', 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-content">
    <h1><?= Html::encode($this->title) ?></h1>

    <p class="text-right"><?= Html::encode($recipe->persons . ' personen') ?></p>
    <p class="text-right"><?= Html::encode($recipe->getTime()) ?></p>

    <h4>Ingrediënten</h4>
    <ul class="list-group">
    	<?php foreach($recipe->getIngredients() as $ingredient):
    		if($ingredient->amount == NULL) {
    			$IngredientName = $ingredient->name;
    		} else {
    			$IngredientName = $ingredient->amount . ' ' . strtolower($ingredient->name);
    		} ?>
    		<li class="list-group-item"><?= Html::encode($IngredientName) ?></li>
    	<?php endforeach; ?>
    </ul>
    <h4>Bereidingswijze</h4>
    <p><?= Html::encode($recipe->body) ?></p>
</div>