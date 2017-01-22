<?php

use yii\db\Schema;
use yii\db\Migration;

class m170122_212009_pollsDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%polls}}',
                           ["id", "question", "date_beg", "date_end", "allow_multiple", "is_random", "anonymous", "show_vote"],
                            [
    [
        'id' => '1',
        'question' => 'Do you like our company?',
        'date_beg' => '2023-12-16',
        'date_end' => '2024-12-16',
        'allow_multiple' => '1',
        'is_random' => '1',
        'anonymous' => '1',
        'show_vote' => '1',
    ],
    [
        'id' => '2',
        'question' => 'Do you like our plumbers?',
        'date_beg' => '2016-11-24',
        'date_end' => '2016-11-25',
        'allow_multiple' => '1',
        'is_random' => '0',
        'anonymous' => '0',
        'show_vote' => '0',
    ],
    [
        'id' => '3',
        'question' => 'Do you have running water?',
        'date_beg' => '2016-11-28',
        'date_end' => '2016-11-30',
        'allow_multiple' => '0',
        'is_random' => '1',
        'anonymous' => '1',
        'show_vote' => '1',
    ],
    [
        'id' => '8',
        'question' => 'Evaluate the work of our company',
        'date_beg' => '2016-12-08',
        'date_end' => '2017-12-23',
        'allow_multiple' => '0',
        'is_random' => '1',
        'anonymous' => '1',
        'show_vote' => '1',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%polls}} CASCADE');
    }
}
