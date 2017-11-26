<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = $person->first_name . ' ' . $person->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Inwoners', 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-content">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Html::encode($person->email) ?></p>
</div>