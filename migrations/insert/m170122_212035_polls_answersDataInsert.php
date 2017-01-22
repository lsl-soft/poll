<?php

use yii\db\Schema;
use yii\db\Migration;

class m170122_212035_polls_answersDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%polls_answers}}',
                           ["id", "id_poll", "answer"],
                            [
    [
        'id' => '1',
        'id_poll' => '1',
        'answer' => 'Yes, very much',
    ],
    [
        'id' => '2',
        'id_poll' => '1',
        'answer' => 'Almost always',
    ],
    [
        'id' => '4',
        'id_poll' => '2',
        'answer' => 'Сertainly',
    ],
    [
        'id' => '5',
        'id_poll' => '3',
        'answer' => 'Of course',
    ],
    [
        'id' => '6',
        'id_poll' => '3',
        'answer' => 'From time to time',
    ],
    [
        'id' => '15',
        'id_poll' => '3',
        'answer' => 'Not in the summer',
    ],
    [
        'id' => '16',
        'id_poll' => '3',
        'answer' => 'Mostly in winter',
    ],
    [
        'id' => '17',
        'id_poll' => '3',
        'answer' => 'No',
    ],
    [
        'id' => '49',
        'id_poll' => '8',
        'answer' => 'Excellent',
    ],
    [
        'id' => '50',
        'id_poll' => '8',
        'answer' => 'Good',
    ],
    [
        'id' => '51',
        'id_poll' => '8',
        'answer' => 'Satisfactorily',
    ],
    [
        'id' => '52',
        'id_poll' => '8',
        'answer' => 'Bad',
    ],
    [
        'id' => '53',
        'id_poll' => '8',
        'answer' => 'Awful',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%polls_answers}} CASCADE');
    }
}
