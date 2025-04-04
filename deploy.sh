composer install
npm install

php artisan config:cache

mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS APIREST_LARAVEL"

php artisan migrate
php artisan db:seed

php artisan storage:link
php artisan optimize:clear
php artisan key:generate
php artisan serve
