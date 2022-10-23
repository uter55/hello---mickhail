<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m221009_171405_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Article', [
            'id' => $this->primaryKey(),
            'NameArticle'=> $this->string(),
            'text'=> $this->string(8000)->notNull(),
            'createdAt' => $this->timestamp(),
            'updatedAt' => $this->timestamp(),


        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Article');
    }
}
