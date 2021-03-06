<?php

use yii\helpers\Html;

$this->title = 'Aanpassen';
$this->params['breadcrumbs'][] = ['label' => 'Recepten', 'url' => ['list']];
$this->params['breadcrumbs'][] = ['label' => $recipe->name, 'url' => ['recipe/' . $recipe->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-content">
    <h1><?= Html::encode($this->title) ?></h1>

    <p class="text-right"><?= Html::encode($recipe->persons . ' personen') ?></p>
    <p class="text-right"><?= Html::encode($recipe->getTime()) ?></p>

    <h4>Ingrediënten</h4>
    <ul class="list-group">
    	<?php foreach($recipe->getIngredients() as $ingredient): ?>
    		<li class="list-group-item"><?= Html::encode($ingredient->name) ?></li>
    	<?php endforeach; ?>
    </ul>
    <h4>Beschrijving</h4>
    <p><?= Html::encode($recipe->body) ?></p>
</div>