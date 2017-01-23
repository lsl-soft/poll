### Yii2-poll widget

This is simple poll widget for yii2 framework.
You can use both single and multiple answer.

<<<<<<< HEAD
([More information lslsoft.com](http://lslsoft.com/2017/01/22/simple-poll-widget-for-yii2/)
=======
([More information: lslsoft.com](http://lslsoft.com/2017/01/22/simple-poll-widget-for-yii2/))
>>>>>>> origin/master

### Installing

Yii2-poll can be installed using composer. Run following command to download and install yii2-poll:

    composer require lslsoft/yii2-poll

or add this in require section of composer.json of your project

    "lslsoft/yii2-poll" : "dev-master"

### Migrations

Migrations are in the folder

    lslsoft/yii2-poll/migrations/create

Files which are responsible for creating tables and relations needed

    lslsoft/yii2-poll/migrations/create

Files which are responsible for inserting some sample data

to apply migrations add in your config file

```php
'migrate-lslsoft-create' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => 'vendor/lslsoft/yii2-poll/migrations/create',
            'migrationTable' => 'migration_lslsoft_create',
        ],
```
to run use the command 

```php
php yii migrate-lslsoft-create
```

for creating tables and relations needed

and for inserting some sample data:

```php
'migrate-lslsoft-insert' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => 'vendor/lslsoft/yii2-poll/migrations/insert',
            'migrationTable' => 'migration_lslsoft_insert',
        ],

```

to run use the command 

```php
php yii migrate-lslsoft-insert
```
###Internalization

You should add in your config file

'i18n' => [
            'translations' => [
                'sourceLanguage' => 'en-En',
                
                'polls*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii/vendor/lslsoft/poll/messages',
                ],
                
            ],
        ],
Basic language for extension - english
In the folder 
    *lslsoft/yii2-poll/migrations/messages*
you will find folder for russian and chinese

###Usage
```php
use lslsoft\poll\Poll;

 <?= Poll::widget(); ?>

```
Without any parameter will choose a first poll for which 

    date_beg < today < date_end;

```php
 <?= Poll::widget([
                    'idPoll' => 1,
                    
                ]                     
                    ); ?>
```

will use poll from table polls with id=1;

On default results will be shown as simple bar chart

```php
 <?= Poll::widget([
                    'idPoll' => 1,
                    'resultView'=>'table'
                    
                ]                     
                    ); ?>
```
will display results as a GridView;


### Tables

```sql
TABLE `polls` (
  `id` int(11) NOT NULL COMMENT '№ poll',
  `question` text NOT NULL COMMENT 'Question', //text of the poll's question 
  `date_beg` date NOT NULL COMMENT 'Date begin',//Date when poll should start
  `date_end` date NOT NULL COMMENT 'Date end', //Date when poll should end
  `allow_multiple` tinyint(4) NOT NULL COMMENT 'Multiple answer', //Define type of poll - with only one possible answer or not
  `is_random` tinyint(4) NOT NULL COMMENT 'Random order', //if true - display answers in random order
  `anonymous` tinyint(4) NOT NULL COMMENT 'Anonymous answers',//if true - user can vote without sign up
  `show_vote` int(11) NOT NULL COMMENT 'Show number of votes' //if true - the results will be shown after sending vote
) ENGINE=InnoDB DEFAULT CHARSET=;
```

```sql
CREATE TABLE `polls_answers` (
  `id` int(11) NOT NULL COMMENT '№ answer',
  `id_poll` int(11) DEFAULT NULL COMMENT '№ poll',
  `answer` text NOT NULL COMMENT 'answer'
) ENGINE=InnoDB;

```

```sql
CREATE TABLE `polls_result` (
  `num` int(11) NOT NULL DEFAULT '0' COMMENT 'Number of the voting',
  `id_poll` int(11) NOT NULL COMMENT '№ of poll',
  `id_answer` int(11) NOT NULL COMMENT '№ of answer',
  `id_user` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `ip` varchar(20) NOT NULL,
  `host` varchar(20) DEFAULT NULL
) ENGINE=InnoDB;
```

<<<<<<< HEAD


=======
>>>>>>> origin/master
### Author

* **Leonid Lyalin** 

### License

This project is licensed under the BSD-3-Clause

<<<<<<< HEAD

### Authors

* **Leonid Lyalin** 


### Acknowledgments
=======
## Acknowledgments
>>>>>>> origin/master


* Thanks to all Yii framework team for inspiration and special thanks to Alexander Makarov (@samdark)
* Thanks to @Insolita for magic yii2-migrik

