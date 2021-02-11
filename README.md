Instructions to run project local.

1 Clone repositorie.
3 Run `composer install`
4 Copy `.env.example` and rename to `.env`, configure your `.env` with database credentials.
5 Run `php artisan key:generate`
6 Run `php artisan migrate:fresh --seed`
7 Run `php artisan passport:install`
8 Run `npm i`

If you want, you can try run cron with: `cron php artisan schedule:run`
