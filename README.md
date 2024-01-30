## Step to reproduce

execute the command:
- `docker-compose build`
- `docker-compose up -d`
- `docker-compose exec php bash`
- `composer install`
- `cp .env.example .env`
- `php artisan key:generate`
- `php artisan migrate`
- `php artisan queue:work`

open browser http://localhost

There will be one job dispatched causing memory overflow

After queue:work dies (because of 'killed') you can go to http://localhost:8080 to verify that there is NO job logged in failed_jobs table
