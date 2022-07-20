<?php

namespace app\controllers;

use app\models\Note;
use app\models\search\NoteSearch;
use kotchuprik\sortable\actions\Sorting;
use Yii;
use yii\web\Controller;

class NoteController extends Controller
{
    public function actions()
    {
        return [
            'sorting' => [
                'class' => Sorting::class,
                'query' => Note::find(),
                'orderAttribute' => 'sort',
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new NoteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Note();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}