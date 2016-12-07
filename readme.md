# Boilerplate

Installation guide :

###First clone the project
	git clone http://192.168.0.18/root/boilerplate-laravel.git

###Navigate to the project directory and run
	composer install
	
###Copy the .env.example as .env
	cp .env.example .env
	
###Changes to be made in .env
	Make sure you make changes in database as per your requirements.Also change cache_driver from 'file' to 'array'.

###Generate key via artisan command
	php artisan key:generate
	
###Run migrate command to make database migrations
	php artisan migrate
	
###Run seeders command to make seeds. This will give role, permission to 1st created user 
	php artisan db:seed --class=RoleSeeder