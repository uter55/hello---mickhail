<?php

use yii\db\Migration;


class m221009_171405_create_article_table extends Migration
{

    public function safeUp()
    {

        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'NameArticle'=> $this->string(),
            'text'=> $this->string(8000)->notNull(),
            'createdAt' => $this->timestamp(),
            'updatedAt' => $this->timestamp(),


        ]);
    }


    public function safeDown()
    {

        $this->dropTable('article');
    }
}
