# Laravel Rest-Api

## Endpoints, Documentation

https://documenter.getpostman.com/view/25454680/2s8ZDbVLJn#e0c9c8e4-9cd5-4840-b4ed-d1dcc467e38a

## Requirements
```
For the application to work, you need to create an .env file or rename the existing .env.example file.
Set up the database connection. Specially:
DB_DATABASE=varid-backend   -> database_name
DB_USERNAME=root            -> username to localhost 
DB_PASSWORD=                -> password 

Set the QUEUE_CONNECTION to "database" and add new variable QUEUE_DRIVER:
QUEUE_CONNECTION=database
QUEUE_DRIVER=database
```

## Project setup
### Clone or download the repository.
```
git clone https://github.com/AdrianOchala/varid-backend.git
```

### Install all dependencies
```
composer install
```

### Run migration and seeders for database
```
php artisan migrate:fresh --seed
```

### Start the server for development
```
php artisan serve
```

### Run listeners for events
```
php artisan queue:work
```
