<?php

/* @var $this yii\web\View */
/* @var $model app\models\Note */

?>

<h3>
  Создать запись
</h3>
<div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
