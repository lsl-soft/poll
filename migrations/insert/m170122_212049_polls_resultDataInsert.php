<?php

use yii\db\Schema;
use yii\db\Migration;

class m170122_212049_polls_resultDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%polls_result}}',
                           ["num", "id_poll", "id_answer", "id_user", "id", "create_at", "update_at", "ip", "host"],
                            [
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '53',
        'id_user' => '0',
        'id' => '310',
        'create_at' => '2017-01-22 23:34:46',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '2',
        'id_poll' => '8',
        'id_answer' => '50',
        'id_user' => '0',
        'id' => '311',
        'create_at' => '2017-01-22 23:35:42',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '3',
        'id_poll' => '8',
        'id_answer' => '50',
        'id_user' => '0',
        'id' => '312',
        'create_at' => '2017-01-22 23:36:31',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '1',
        'id_answer' => '2',
        'id_user' => '0',
        'id' => '313',
        'create_at' => '2017-01-22 23:38:40',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '1',
        'id_answer' => '1',
        'id_user' => '0',
        'id' => '314',
        'create_at' => '2017-01-22 23:38:40',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '2',
        'id_poll' => '1',
        'id_answer' => '2',
        'id_user' => '0',
        'id' => '315',
        'create_at' => '2017-01-23 00:00:01',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%polls_result}} CASCADE');
    }
}
