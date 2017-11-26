<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Profiel';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-profile">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->session->hasFlash('profileFormSubmitted')): ?>

        <div class="alert alert-success">
            Je persoonlijke data is aangepast.
        </div>

    <?php elseif(Yii::$app->session->hasFlash('passFormSubmitted')): ?>

        <div class="alert alert-success">
            Je wachtwoord is aangepast.
        </div>

    <?php endif; ?>

    <div class="row">
        <div class="col-lg-6">

            <?php $formProfile = ActiveForm::begin(['id' => 'profile-form']); ?>
				<?= $formProfile->field($profile, 'first_name')->textInput([
					'value' => $person->first_name,
                    'placeholder' => $profile->getAttributeLabel('first_name')
				]); ?>
				<?= $formProfile->field($profile, 'last_name')->textInput([
					'value' => $person->last_name,
                    'placeholder' => $profile->getAttributeLabel('last_name')
				]); ?>
				<?= $formProfile->field($profile, 'email')->textInput([
					'value' => $person->email,
                    'placeholder' => $profile->getAttributeLabel('email')
				]); ?>
                <?= $formProfile->field($profile, 'phone')->textInput([
                    'value' => $person->phone,
                    'placeholder' => $profile->getAttributeLabel('phone')
                ]); /*?>
                <?= $formProfile->field($profile, 'date_of_birth')->input('date', [
                    'value' => $person->date_of_birth,
                    'placeholder' => $profile->getAttributeLabel('date_of_birth')
                ]); */?>

                <div class="form-group">
                    <?= Html::submitButton('Opslaan', ['class' => 'btn btn-primary', 'name' => 'profile-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
        <div class="col-lg-6">
            <?php $formPass = ActiveForm::begin(['id' => 'password-form']); ?>
                <?= $formPass->field($pass, 'password')->passwordInput([
                    'placeholder' => $pass->getAttributeLabel('password')
                ]); ?>
                <?= $formPass->field($pass, 'reenter')->passwordInput([
                    'placeholder' => $pass->getAttributeLabel('reenter')
                ]); ?>

                <div class="form-group">
                    <?= Html::submitButton('Opslaan', ['class' => 'btn btn-primary', 'name' => 'password-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>