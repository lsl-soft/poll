<?php

use yii\db\Schema;
use yii\db\Migration;

class m170120_110250_polls_answers extends Migration
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
            '{{%polls_answers}}',
            [
                'id'=> $this->primaryKey(11)->comment('№ answer'),
                'id_poll'=> $this->integer(11)->null()->defaultValue(null)->comment('№ poll'),
                'answer'=> $this->text()->notNull()->comment('answer'),
            ],$tableOptions
        );
        $this->createIndex('id_poll','{{%polls_answers}}','id_poll',false);
    }

    public function safeDown()
    {
        $this->dropIndex('id_poll', '{{%polls_answers}}');
        $this->dropTable('{{%polls_answers}}');
    }
}
