Instructions to run project local.

1. Clone repositorie.
2. Run `composer install`
3. Copy `.env.example` and rename to `.env`, configure your `.env` with database credentials.
4. Run `php artisan key:generate`
5. Run `php artisan migrate:fresh --seed`
6. Run `php artisan passport:install`
7. Run `npm i`

If you want, you can try run cron with: `cron php artisan schedule:run`
