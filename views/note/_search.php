<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\NoteSearch */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="note-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id')->textInput(['placeholder' => 'Поиск по ID'])->label(false) ?>

    <?= $form->field($model, 'title')->textInput(['placeholder' => 'Поиск по заголовку'])->label(false) ?>

    <?= $form->field($model, 'description')->textInput(['placeholder' => 'Поиск по описанию'])->label(false) ?>

    <?= $form->field($model, 'content')->textInput(['placeholder' => 'Поиск по контенту'])->label(false) ?>

    <div>
        <div>Поиск по датам. Формат: дд.мм.гггг</div>
        <?= $form->field($model, 'created_at_from')->textInput(['placeholder' => 'Дата создания (старт)'])->label(false) ?>

        <?= $form->field($model, 'created_at_to')->textInput(['placeholder' => 'Дата создания (конец)'])->label(false) ?>

        <?= $form->field($model, 'updated_at_from')->textInput(['placeholder' => 'Дата обновления (старт)'])->label(false) ?>

        <?= $form->field($model, 'updated_at_to')->textInput(['placeholder' => 'Дата обновления (конец)'])->label(false) ?>
    </div>

    <div>
        <?= Html::submitButton('Искать') ?>
        <?= Html::a('Сбросить фильтр', 'index') ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
