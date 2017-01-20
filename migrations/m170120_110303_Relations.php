<?php

use yii\db\Schema;
use yii\db\Migration;

class m170120_110303_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_polls_result_id_poll','{{%polls_result}}','id_poll','polls',
'id','CASCADE','CASCADE');
        $this->addForeignKey('fk_polls_result_id_answer','{{%polls_result}}','id_answer','polls_answers',
'id','CASCADE','CASCADE');
        $this->addForeignKey('fk_polls_result_id_user','{{%polls_result}}','id_user','user',
'id','CASCADE','CASCADE');
    }

    public function safeDown()
    {
     $this->dropForeignKey('fk_polls_result_id_poll', '{{%polls_result}}');
     $this->dropForeignKey('fk_polls_result_id_answer', '{{%polls_result}}');
     $this->dropForeignKey('fk_polls_result_id_user', '{{%polls_result}}');
    }
}
