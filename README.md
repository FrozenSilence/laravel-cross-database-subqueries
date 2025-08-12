# Laravel Cross database subqueries
Eloquent cross database compatibility in subqueries.

| **Laravel**  |  **laravel-cross-database-subqueries** |  **Lifecycle** |
|---|---|---|
| ^5.5  | ^5.5  | January 24, 2017 |
||| Bug fixes until January 2019 |
||| Security fixes until June 2020 |
| ^5.6  | ^5.6  | February 7, 2018 |
||| 6 months of bug fixes |
||| 1 year of security |
| ^8.0  | ^8.0  | September 22, 2020 |

# Why do I need it?
### To use the following Eloquent methods cross databases:
* has
* whereHas
* doesntHave 
* whereDoesntHave
* withCount (except with prefixes)

# Installation
Install with composer
~~~
composer require hoyvoy/laravel-cross-database-subqueries
~~~

From Laravel 5.5 onwards, it's possible to take advantage of auto-discovery of the service provider.
For Laravel versions before 5.5, you must register the service provider in your config/app.php

~~~
Hoyvoy\CrossDatabase\CrossDatabaseServiceProvider::class,
~~~

# Usage
In your `Models` extends from:
* FrozenSilence\CrossDatabase\Eloquent\Model

# Supported PHP Versions
* \>=7.0

# Supported Databases
* MySQL
* PostgreSQL
* SQL Server

# Issues & Contributing
If you find an issue please report it or contribute by submitting a pull request.
