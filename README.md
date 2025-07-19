# Task-Manager-Backend

## Install PHP dependencies
```
composer install
```

## Setup Environment Variables
```
cp .env.sample .env
```

### Generate the application key
```
php artisan key:generate
```

### Run migrations
```
php artisan migrate --seed
```

### Start the local development server
```
php artisan serve
```

