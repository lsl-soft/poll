<?php

use yii\db\Schema;
use yii\db\Migration;

class m170120_110302_polls_result extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%polls_result}}',
            [
                'num'=> $this->integer(11)->notNull()->defaultValue(0)->comment('количество ответов'),
                'id_poll'=> $this->integer(11)->notNull()->comment('№ опроса'),
                'id_answer'=> $this->integer(11)->notNull()->comment('№ ответа'),
                'id_user'=> $this->integer(11)->notNull(),
                'id'=> $this->primaryKey(11),
                'create_at'=> $this->datetime()->notNull(),
                'update_at'=> $this->datetime()->notNull(),
                'ip'=> $this->string(20)->notNull(),
                'host'=> $this->string(20)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('id_answer','{{%polls_result}}','id_answer',false);
        $this->createIndex('id_user','{{%polls_result}}','id_user',false);
        $this->createIndex('id_poll','{{%polls_result}}','id_poll',false);
    }

    public function safeDown()
    {
        $this->dropIndex('id_answer', '{{%polls_result}}');
        $this->dropIndex('id_user', '{{%polls_result}}');
        $this->dropIndex('id_poll', '{{%polls_result}}');
        $this->dropTable('{{%polls_result}}');
    }
}
