<?php

use yii\db\Schema;
use yii\db\Migration;

class m170120_111724_polls_resultDataInsert extends Migration
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
        'id_answer' => '49',
        'id_user' => '0',
        'id' => '229',
        'create_at' => '2016-12-27 21:32:31',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '49',
        'id_user' => '0',
        'id' => '230',
        'create_at' => '2016-12-27 21:34:37',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '50',
        'id_user' => '0',
        'id' => '231',
        'create_at' => '2016-12-27 21:34:49',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '50',
        'id_user' => '0',
        'id' => '232',
        'create_at' => '2016-12-27 21:35:09',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '51',
        'id_user' => '0',
        'id' => '233',
        'create_at' => '2016-12-27 21:36:03',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '51',
        'id_user' => '0',
        'id' => '234',
        'create_at' => '2016-12-27 21:36:25',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '50',
        'id_user' => '0',
        'id' => '235',
        'create_at' => '2016-12-27 21:36:39',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '52',
        'id_user' => '0',
        'id' => '236',
        'create_at' => '2017-01-17 12:03:50',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '52',
        'id_user' => '0',
        'id' => '237',
        'create_at' => '2017-01-17 12:07:23',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '50',
        'id_user' => '0',
        'id' => '238',
        'create_at' => '2017-01-17 12:08:35',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '50',
        'id_user' => '0',
        'id' => '239',
        'create_at' => '2017-01-17 12:12:09',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '49',
        'id_user' => '0',
        'id' => '240',
        'create_at' => '2017-01-17 12:12:17',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '51',
        'id_user' => '0',
        'id' => '241',
        'create_at' => '2017-01-17 12:13:06',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '49',
        'id_user' => '0',
        'id' => '242',
        'create_at' => '2017-01-17 12:14:41',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '49',
        'id_user' => '0',
        'id' => '243',
        'create_at' => '2017-01-17 17:40:41',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '49',
        'id_user' => '0',
        'id' => '244',
        'create_at' => '2017-01-18 08:16:20',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '49',
        'id_user' => '0',
        'id' => '245',
        'create_at' => '2017-01-18 08:43:29',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '49',
        'id_user' => '0',
        'id' => '246',
        'create_at' => '2017-01-18 10:52:48',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '49',
        'id_user' => '0',
        'id' => '247',
        'create_at' => '2017-01-18 11:55:18',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '49',
        'id_user' => '0',
        'id' => '248',
        'create_at' => '2017-01-18 12:01:42',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '49',
        'id_user' => '0',
        'id' => '249',
        'create_at' => '2017-01-18 12:03:20',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '49',
        'id_user' => '0',
        'id' => '250',
        'create_at' => '2017-01-18 12:18:51',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '50',
        'id_user' => '0',
        'id' => '251',
        'create_at' => '2017-01-18 19:17:51',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '50',
        'id_user' => '0',
        'id' => '252',
        'create_at' => '2017-01-18 19:18:13',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '50',
        'id_user' => '0',
        'id' => '253',
        'create_at' => '2017-01-18 19:19:49',
        'update_at' => '0000-00-00 00:00:00',
        'ip' => '::1',
        'host' => null,
    ],
    [
        'num' => '1',
        'id_poll' => '8',
        'id_answer' => '50',
        'id_user' => '0',
        'id' => '254',
        'create_at' => '2017-01-18 19:20:49',
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
