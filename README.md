# Command to run code

git clone https://github.com/Sourabhtripathi1/Electronic-Shop-Laravel.git

cd Electronic-Shop-Laravel

composer install

php artisan key:generate

php artisan Storage:link

code .



## To host

git clone https://github.com/Sourabhtripathi1/Electronic-Shop-Laravel.git

cd Electronic-Shop-Laravel

composer install --optimize-autoloader --no-dev

php artisan key:generate

php artisan config:cache

php artisan event:cache

php artisan route:cache

php artisan view:cache

php artisan storage:link

chmod -R 777 /var/www/Electronic-Shop-Laravel/


