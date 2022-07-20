<?php

use kotchuprik\sortable\grid\Column;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\NoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<h1>Таблица записей</h1>

<a href="/note/create">Добавить запись</a>

<div>
    <?php Pjax::begin(['timeout' => 3000]); ?>

    <div>Поиск</div>
    <?=  $this->render('_search', ['model' => $searchModel]); ?>

    <div>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'layout' => "{items}\n{pager}\n{summary}",
            'rowOptions' => function ($model) {
                return ['data-sortable-id' => $model->id];
            },
            'columns' => [
                [
                    'class' => Column::class,
                ],
                'id',
                'title',
                'description',
                'content',
                'created_at:date',
                'updated_at:date',
                ],
            'options' => [
                'data' => [
                    'sortable-widget' => 1,
                    'sortable-url' => Url::toRoute(['sorting']),
                ]
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
