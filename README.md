# Laravel States

Laravel States is a bundle for Laravel, providing abbreviation, name and country code for US states.

Currently, I only have US states but additional states from other countries could be added using the country code column.

**Please not that this is for Laravel 5 only.**

## Installation

Add `adrianmejias/laravel-states` to `composer.json`.

    "adrianmejias/laravel-states": "~1.0"
    
Run `composer update` to pull down the latest version of Country List.

Edit `app/config/app.php` and add the `provider` and `filter`

    'providers' => [
        AdrianMejias\States\StatesServiceProvider::class,
    ]

Now add the alias.

    'aliases' => [
        'States' => AdrianMejias\States\StatesFacade::class,
    ]
    

## Model

You can start by publishing the configuration. This is an optional step, it contains the table name and does not need to be altered. If the default name `states` suits you, leave it. Otherwise run the following command

    $ php artisan vendor:publish

Next generate the migration file:

    $ php artisan states:migration
    
It will generate the `<timestamp>_setup_states_table.php` migration and the `StatesSeeder.php` seeder. To make sure the data is seeded insert the following code in the `seeds/DatabaseSeeder.php`

    $this->call(StatesSeeder::class);

You may now run it with the artisan migrate command:

    $ php artisan migrate --seed
    
After running this command the filled states table will be available