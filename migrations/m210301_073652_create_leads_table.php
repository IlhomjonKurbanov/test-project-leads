<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%leads}}`.
 */
class m210301_073652_create_leads_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%leads}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string(32)->notNull()->unique(),
            'fullname' => $this->string(32)->notNull()->unique(),
            'phone' => $this->string(32)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%leads}}');
    }
}
