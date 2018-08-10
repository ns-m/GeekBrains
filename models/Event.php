<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property string $name
 * @property string $start_at
 * @property string $end_at
 * @property string $created_at
 * @property string $updated_at
 * @property int $author_id
 * @property User $author
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['start_at', 'end_at', 'created_at', 'updated_at', 'author_id'], 'safe'],
            [['name'], 'string', 'max' => 255],
            ['author_id', 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя События',
            'start_at' => 'Начало',
            'end_at' => 'Конец',
            'created_at' => 'Создано',
            'updated_at' => 'Отредактировано',
            'author_id' => 'Автор',
        ];
    }

//    public function doCoolThing(): void
//    {
//        \var_dump('HELLO!');
//    }
    /**
     * @return ActiveQuery
     */
public function getAuthor(): ActiveQuery
{
    $this->author;
    return $this->hasMany(User::class, ['id' => 'author_id']);
}
}
