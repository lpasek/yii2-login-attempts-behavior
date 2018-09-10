<?php

use yii\db\Migration;

class m171023_155521_create_login_attempt_table extends Migration
{
    private $table = '{{%login_attempt}}';

    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'key' => $this->string()->notNull(),
            'amount' => $this->integer(2)->defaultValue(1),
            'reset_at' => $this->timestamp(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);

        $this->createIndex('login_attempt_key_index', $this->table, 'key');
        $this->createIndex('login_attempt_amount_index', $this->table, 'amount');
        $this->createIndex('login_attempt_reset_at_index', $this->table, 'reset_at');
    }

    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
