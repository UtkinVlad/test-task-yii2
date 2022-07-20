<?php

namespace app\models\search;

use yii\data\ActiveDataProvider;
use app\models\Note;

class NoteSearch extends Note
{
    public string $created_at_from = '';
    public string $created_at_to = '';
    public string $updated_at_from = '';
    public string $updated_at_to = '';

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['created_at_from', 'created_at_to', 'updated_at_from', 'updated_at_to'], 'date', 'format' => 'd.m.yyyy'],
            [['title', 'description', 'content'], 'string', 'max' => 255],
        ];
    }

    public function search($params)
    {
        $query = Note::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['sort'=>SORT_ASC]],
            'pagination' => [
                'pageSize' => 6,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id])
                   ->andFilterWhere(['like', 'title', $this->title])
                   ->andFilterWhere(['like', 'content', $this->content])
                   ->andFilterWhere(['like', 'description', $this->description])
                   ->andFilterWhere(['>=', 'created_at', $this->created_at_from ?
                       strtotime($this->created_at_from . ' 00:00:00') : null])
                   ->andFilterWhere(['<=', 'created_at', $this->created_at_to ?
                       strtotime($this->created_at_to . ' 23:59:59') : null])
                   ->andFilterWhere(['>=', 'updated_at', $this->updated_at_from ?
                       strtotime($this->updated_at_from . ' 00:00:00') : null])
                   ->andFilterWhere(['<=', 'updated_at', $this->updated_at_to ?
                       strtotime($this->updated_at_to . ' 23:59:59') : null]);

        return $dataProvider;
    }
}
