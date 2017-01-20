<?php

use yii\db\Schema;
use yii\db\Migration;

class m170120_110218_polls extends Migration
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
            '{{%polls}}',
            [
                'id'=> $this->primaryKey(11)->comment('№ poll'),
                'question'=> $this->text()->notNull()->comment('Question'),
                'date_beg'=> $this->date()->notNull()->comment('Date begin'),
                'date_end'=> $this->date()->notNull()->comment('Date end'),
                'allow_mulitple'=> $this->smallInteger(4)->notNull()->comment('multiple answer'),
                'is_random'=> $this->smallInteger(4)->notNull()->comment('random order'),
                'anonymous'=> $this->smallInteger(4)->notNull()->comment('anonymous answers'),
                'show_vote'=> $this->integer(11)->notNull()->comment('show number of votes'),
            ],$tableOptions
        );
        $this->createIndex('id_2','{{%polls}}','id',true);
        $this->createIndex('id','{{%polls}}','id',false);
    }

    public function safeDown()
    {
        $this->dropIndex('id_2', '{{%polls}}');
        $this->dropIndex('id', '{{%polls}}');
        $this->dropTable('{{%polls}}');
    }
}
