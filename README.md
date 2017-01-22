### Yii2-poll widget

This is simple poll widget for yii2 framework.
You can use both single and multiple answer.

### Installing

Yii2-poll can be installed using composer. Run following command to download and install yii2-poll:

    composer require lslsoft/yii2-poll

or add this in require section of composer.json of your project

    "lslsoft/yii2-poll" : "dev-master"

### Migrations

Migrations are in the folder

*lslsoft/yii2-poll/migrations/create*

Files which are responsible for creating tables and relations needed

*lslsoft/yii2-poll/migrations/create*

Files which are responsible for inserting some sample data

to apply migrations add in your config file

```php
'migrate-lslsoft-create' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => 'vendor/lslsoft/yii2-poll/migrations',
            'migrationTable' => 'migration_lslsoft_create',
        ],
```

for creating tables and relations needed

and for inserting some sample data:

```php
'migrate-lslsoft-insert' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => 'vendor/lslsoft/yii2-poll/migrations',
            'migrationTable' => 'migration_lslsoft_insert',
        ],

```

###Usage
```php
use lslsoft\poll\Poll;

 <?= Poll::widget(); ?>
 ```
 

Without any paramentr will choose a poll for which date_beg<today<date_end;

## Running the tests

Explain how to run the automated tests for this system

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system

## Built With

* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - The web framework used
* [Maven](https://maven.apache.org/) - Dependency Management
* [ROME](https://rometools.github.io/rome/) - Used to generate RSS Feeds

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Billie Thompson** - *Initial work* - [PurpleBooth](https://github.com/PurpleBooth)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone who's code was used
* Inspiration
* etc
