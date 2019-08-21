
# API base on Laravel Framework 5.8

### Feature
1. Create model for phone number data
2. Display API on swagger UI
3. This API can be display data and save phone number to database

### Requirement
php 7.1.3 mysql apache|nginx

### Step to install

- Install composer download at https://getcomposer.org/
- Clone this repository to htdocs|www
- Go to wokaio project run this command:

```shell
composer install
```
- Copy file .env.example to .env then edit, example: 

```shell
APP_ENV=local
APP_DEBUG=true
APP_KEY=BPQ4O7ftZ9tivB48XY1NhsNt4eE761Ja

DB_HOST=localhost
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=password

DB_MSSQL_HOST=localhost
DB_MSSQL_DATABASE=database
DB_MSSQL_USERNAME=sa
DB_MSSQL_PASSWORD=password

```
- Run command to migrate

```shell
#to migrate tables
php artisan migrate
#to dump example data
php artisan db:seed
```
#allow writeable to storage dir
```shell
chmod 777 -R storage
```

### Test API on swagger
1. Host + vendor/l5-swagger/index.html
2. Example: http://localhost/demo-api/public/vendor/l5-swagger/index.html

### Test API on postman
1. url host(Example:http://localhost/demo-api/public/api/) + uri
2. Get phones
GET http://localhost/demo-api/public/api/phones
3. Store phone
POST http://localhost/demo-api/public/api/phones

Please contact with me if you have any issue. chauminh.1821993@gmail.com