# cesi_emploi
Code du projet sur symfony réalisé au CESI

## Installation

`git clone https://github.com/DevEkode/cesi_emploi.git`  
`cd cesi_emploi`

### Install dependencies

1. Install composer (https://getcomposer.org/)  
2. `php composer.phar install` or `composer install`

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

