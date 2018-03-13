## Laravel UsersAdmin
This package creates DB table user_roles and serves CRUD pages of users in administrative panel included its roles.
The package includes facade to operate user's role.
It includes a ServiceProvider to register the package and attach it to the output. 

## Installation
Add the package to root composer.json:
````
"require": {
        ...
        "vadiasov/users-admin": "^1.0.0",
  }
````
Then run:
````
composer update
````
Register package in config/app.php
````
'providers' => [
        /*
         * Package Service Providers...
         */
        Vadiasov\UsersAdmin\UserServiceProvider::class,
````
Create model:
````
php artisan make:model User_role
````
Publish migrations and seeds. Run:
````
php artisan vendor:publish
````
and enter appropriate number of this package (see terminal output after last command).


Migrate:
````
php artisan migrate
````
Seed if you need demo data:
````
php artisan db:seed class=UserRolesSeeder
````

## Routes
The routes are in the package:
````
admin/users
admin/users/create
admin/users/{id}/edit
admin/users/{id}/delete
````
## Methods
````
UsersAdmin::hasRole($userId, $roleId)
UsersAdmin::setRole($userId, $roleId) (will be created later)
````
