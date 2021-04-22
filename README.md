## About

Basic start APIs scaffold for SPAs applications.

- Authentication with Laravel Sanctum
  - Contains login, register and logout endpoints
  - After register or login, it generates a bearer token that can be used for your subsequent SPA requests.
- Authentication with personal roles middleware
  - Can be applied in route just by adding ->middleware('role:role_name');
- And more, just clone =D.


## Installation and use
- Just install the dependencies with [composer install]()
- After that, you can run [php artisan migrate]() to run the migrations (that will import the users, roles, user_role, form and tables)
- Remember to configure your prefered database in .env file 

And, if have any doubts, contact me or go to [laravel documentation](https://laravel.com/docs) =D. 

