<?php

use yii\db\Migration;


class m221025_171703_mod_article_namearticle extends Migration
{

    public function safeUp()
    {
        $this->alterColumn('article','NameArticle', $this->string()->notNull());
    }


    public function safeDown()
    {
        $this->alterColumn('article','NameArticle', $this->string()->null());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221025_171703_mod_article_namearticle cannot be reverted.\n";

        return false;
    }
    */
}
