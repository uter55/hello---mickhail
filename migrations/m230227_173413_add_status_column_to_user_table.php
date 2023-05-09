<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 *
 */
class m230227_173413_add_status_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'position', $this->smallInteger()->NotNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'position');
    }
}
