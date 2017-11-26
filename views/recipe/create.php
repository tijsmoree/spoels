<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Aanmaken';
$this->params['breadcrumbs'][] = ['label' => 'Recepten', 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-recipe">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-6">

            <?php $formRecipe = ActiveForm::begin(['id' => 'create-recipe-form']); ?>
				<?= $formRecipe->field($form, 'name')->textInput([
                    'placeholder' => $form->getAttributeLabel('name')
				]); ?>
				<?= $formRecipe->field($form, 'time')->input('time', [
                    'placeholder' => $form->getAttributeLabel('time')
				]); ?>
				<?= $formRecipe->field($form, 'persons')->input('number', [
                    'placeholder' => $form->getAttributeLabel('persons')
                ]); ?>
                <?= $formRecipe->field($form, 'body')->textarea([
                    'placeholder' => $form->getAttributeLabel('body')
				]); ?>

                <div class="form-group">
                    <?= Html::submitButton('Opslaan', ['class' => 'btn btn-primary', 'name' => 'recipe-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
    </div>
</div>