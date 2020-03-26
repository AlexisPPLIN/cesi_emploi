# cesi_emploi
Code du projet sur symfony 5.0.5 réalisé au CESI

## Requirements

* PHP >= 7.2
* composer (https://getcomposer.org/) 
* A working database (mysql, postgresql, SQLite, ...)

## Installation

`git clone https://github.com/DevEkode/cesi_emploi.git`  
`cd cesi_emploi`

### Install dependencies

`php composer.phar install` or `composer install`

## Configuration

1. Copy `.env.example` to `.env`
2. Edit `.env` file :
```dotenv
# db_user => database username
# db_pass => username password
# db_name => database name
# Change your serverVersion
# Check the ip and port
DATABASE_URL=mysql://db_user:db_pass@127.0.0.1:3306/db_name?serverVersion=10.4
```

## Migrate database

1. Create database with : `php bin\console doctrine:database:create`
2. Create database schema with : `php bin\console doctrine:schema:create`
3. Create first migration with : `php bin\console make:migration`
3. Migrate database with : `php bin\console doctrine:migrations:migrate`

Enjoy !