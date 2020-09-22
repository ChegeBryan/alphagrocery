### Getting started

1. Create database `alphagrocery`
2. Move to the project folder and launch a terminal instance from the root.
3. On the terminal run, `composer install`
4. Create a `.env` file by using the provided run, `mv .env.example .env`, this will rename the provided `.env.example` file to `.env`.
5. Edit the `.env` file adding your database connections details.
6. Generate api key using the command, `php artisan key:generate`
7. Run `php artisan migrate`
8. (Optional) Fill the database with dummy data, run `php artisan db:seed`.
9. Create storage link, run `php artisan storage:link`.
10. Start server,run: `php artisan serve`.
