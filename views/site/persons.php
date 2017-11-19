<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Inwoners';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-persons">

    <div class="body-content">
        <div class="row">
            <?php foreach($persons as $person): ?>
                <div class="col-lg-4">
                    <h2><?php echo $person->first_name . ' ' . $person->last_name; ?></h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>

                    <p><?= HTML::a('Meer over ' . $person->first_name . ' &raquo;', Url::to(['person/' . $person->id]), ['class' => "btn btn-default"]); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>