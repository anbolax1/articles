<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%catogory}}`.
 */
class m240511_124847_create_catogory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%catogory}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->comment('Название'),
            'description' => $this->text()->notNull()->comment('Описание')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%catogory}}');
    }
}
