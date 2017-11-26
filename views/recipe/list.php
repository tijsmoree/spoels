<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Recepten';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-recipes">

    <div class="body-content">
        <h1>Recepten</h1>
        <?php if(Yii::$app->session->hasFlash('recipeDeleted')): ?>
            <div class="alert alert-success">
                <strong>Verwijderd!</strong> Het recept is verwijderd.
            </div>
        <?php elseif(Yii::$app->session->hasFlash('recipeCreated')): ?>
            <div class="alert alert-success">
                <strong>Aangemaakt!</strong> Je hebt een recept aangemaakt!
            </div>
        <?php endif;

        if(!Yii::$app->user->isGuest)
            echo Html::a(
                '<span class="glyphicon glyphicon-plus"></span> Toevoegen',
                Url::to(['recipe/create']),
                ['class' => "btn btn-success"]); ?>
        <div class="row row-eq-height">
            <?php foreach($recipes as $recipe): ?>
                <div class="col-lg-3">
                    <h2><?= $recipe->name ?></h2>
                    <div class="text-right">
                        <p><em><?= $recipe->persons . ' personen' ?><br>
                        <?= $recipe->getTime() ?></em></p>
                    </div>
                    <p>Ingrediënten: <?php $i = sizeof($recipe->getIngredients());
                    $i > 7 ? $i = 5 : $i += 1;
                    foreach($recipe->getIngredients() as $ingredient):
                        echo strtolower($ingredient->name);
                        if(--$i == 1) break;
                        echo ', ';
                    endforeach; ?></p>
                    <div class="btn-group pull-right pull-down"><?php
                    echo HTML::a('Recept &raquo;',
                        Url::to(['recipe/' . $recipe->id]),
                        [
                            'style' => "vertical-align:middle",
                            'class' => "btn btn-default"
                        ]);
                    if(!Yii::$app->user->isGuest):
                        echo Html::a(
                            '<span class="glyphicon glyphicon-edit"></span>',
                            Url::to(['recipe/' . $recipe->id . '/edit']),
                            ['class' => "btn btn-info"]);
                        echo Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            Url::to(['recipe/' . $recipe->id . '/delete']),
                            ['class' => "btn btn-danger"]);
                    endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>