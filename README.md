## About

Basic start APIs scaffold for SPAs applications.

- Authentication with Laravel Sanctum
  - Contains login, register and logout endpoints
  - After register or login, it generates a bearer token that can be used for your subsequent SPA requests
- Authorization with personal roles middleware
  - Can be applied in route just by adding ->middleware('role:role_name')
- Feature tests [./vendor/bin/phpunit]()
- Automated the building and testing process using a CI/CD pipeline created for and run by CircleCI
- And more, just clone =D.


## Installation and use
- Just install the dependencies with [composer install]()
- After that, you can run [php artisan migrate]() to run the migrations (that will import the users, roles, user_role, form and tables)
- Remember to configure your prefered database in .env file 

And, if have any doubts, contact me or go to [laravel documentation](https://laravel.com/docs) =D. 

