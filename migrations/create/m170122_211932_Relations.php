<?php

use yii\db\Schema;
use yii\db\Migration;

class m170122_211932_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_polls_answers_id_poll','{{%polls_answers}}','id_poll','polls',
'id','CASCADE','CASCADE');
    }

    public function safeDown()
    {
     $this->dropForeignKey('fk_polls_answers_id_poll', '{{%polls_answers}}');
    }
}
