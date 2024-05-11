<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%author}}`.
 */
class m240511_124212_create_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%author}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('ФИО автора'),
            'birth_year' => $this->smallInteger()->unsigned()->notNull()->comment('Год рождения'),
            'biography' => $this->text()->null()->comment('Биография')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%author}}');
    }
}
