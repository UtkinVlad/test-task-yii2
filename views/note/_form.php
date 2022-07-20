<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Note */
/* @var $form yii\bootstrap\ActiveForm */

?>

<div class="note-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        ],
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Заголовок']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'placeholder' => 'Описание']) ?>

    <?= $form->field($model, 'content')->textInput(['maxlength' => true, 'placeholder' => 'Content']) ?>

    <?= Html::submitButton('Сохранить') ?>

    <?php ActiveForm::end(); ?>

</div>
