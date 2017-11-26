<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = $recipe->name;
$this->params['breadcrumbs'][] = ['label' => 'Recepten', 'url' => ['recipe']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-content">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Html::encode($recipe->getTime()) ?></p>
</div>