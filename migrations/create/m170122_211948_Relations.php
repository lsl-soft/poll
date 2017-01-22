<?php

use yii\db\Schema;
use yii\db\Migration;

class m170122_211948_Relations extends Migration
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
    }

    public function safeDown()
    {
     $this->dropForeignKey('fk_polls_result_id_poll', '{{%polls_result}}');
     $this->dropForeignKey('fk_polls_result_id_answer', '{{%polls_result}}');
    }
}
