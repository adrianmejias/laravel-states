# Laravel States

Laravel States is a bundle for Laravel, providing abbreviation and name for all USA States.

**Please not that this is for Laravel 5 only.**

## Installation

Add `adrianmejias/laravel-states` to `composer.json`.

    "adrianmejias/laravel-states": "dev-master"
    
Run `composer update` to pull down the latest version of Country List.

Edit `app/config/app.php` and add the `provider` and `filter`

    'providers' => [
        'AdrianMejias\States\StatesServiceProvider',
    ]

Now add the alias.

    'aliases' => [
        'States' => 'AdrianMejias\States\StatesFacade',
    ]
    

## Model

You can start by publishing the configuration. This is an optional step, it contains the table name and does not need to be altered. If the default name `states` suits you, leave it. Otherwise run the following command

    $ php artisan vendor:publish

Next generate the migration file:

    $ php artisan states:migration
    
It will generate the `<timestamp>_setup_states_table.php` migration and the `StatesSeeder.php` seeder. To make sure the data is seeded insert the following code in the `seeds/DatabaseSeeder.php`

    // Seed the states
    $this->call('SatesSeeder');
    $this->command->info('Seeded the states!'); 

You may now run it with the artisan migrate command:

    $ php artisan migrate --seed
    
After running this command the filled states table will be available