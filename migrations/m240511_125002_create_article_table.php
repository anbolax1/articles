<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m240511_125002_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->comment('Название'),
            'announcement' => $this->string()->notNull()->comment('Анонс'),
            'text' => $this->text()->comment('Текст'),
            'image' => $this->text()->null()->comment('Картинка'),
            'author_id' => $this->integer()->notNull()->comment('Автор')
        ]);

        $this->addForeignKey(
            'fk-author_ud',
            '{{%article}}',
            'author_id',
            '{{%author}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-author_ud',
            '{{%article}}'
        );
        $this->dropTable('{{%article}}');
    }
}
