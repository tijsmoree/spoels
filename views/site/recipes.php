<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Recepten';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-recepten">

    <div class="body-content">
        <h1>Recepten</h1>
        <div class="row">
            <?php foreach($recipes as $recipe): ?>
                <div class="col-lg-3">
                    <h2><?= $recipe->name ?></h2>
                    <div class="text-right">
                        <em><?= $recipe->persons . ' personen' ?><br>
                        <?= $recipe->getTime() ?></em>
                    </div>
                    <p>Ingrediënten: <?php $i = sizeof($recipe->getIngredients());
                    $i > 7 ? $i = 5 : $i += 1;
                    foreach($recipe->getIngredients() as $ingredient):
                        echo strtolower($ingredient->name);
                        if(--$i == 0) break;
                        echo ', ';
                    endforeach; ?>...</p>
                    <div><?= HTML::a($recipe->name . ' &raquo;',
                        Url::to(['recipe/' . $recipe->id]),
                        ['class' => "btn btn-default"]); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>