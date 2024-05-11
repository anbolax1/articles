<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title Название
 * @property string $announcement Анонс
 * @property string|null $text Текст
 * @property string|null $image Картинка
 * @property int $author_id Автор
 *
 * @property Author $author
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'announcement', 'author_id'], 'required'],
            [['text', 'image'], 'string'],
            [['author_id'], 'integer'],
            [['title', 'announcement'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::class, 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'announcement' => 'Анонс',
            'text' => 'Текст',
            'image' => 'Картинка',
            'author_id' => 'Автор',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::class, ['id' => 'author_id']);
    }
}
