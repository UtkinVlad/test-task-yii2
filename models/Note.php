<?php

namespace app\models;

use kotchuprik\sortable\behaviors\Sortable;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property int $sort
 * @property int $created_at
 * @property int $updated_at
 */
class Note extends ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            'sortable' => [
                'class' => Sortable::class,
                'query' => self::find(),
                'orderAttribute' => 'sort',
            ],
        ];
    }

    public static function tableName()
    {
        return '{{%note}}';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['sort', 'created_at', 'updated_at'], 'integer'],
            [['title', 'description'], 'string', 'max' => 255],
            [['content'], 'string', 'max' => 2047],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'content' => 'Контент',
            'description' => 'Описание',
            'sort' => 'Порядок',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }
}
