# Marketing_Wizard Laravel Project Install Guide.
1.download zip from git repo.


2.extract and copy and paste to apache web service root directory.
  if using xampp, go to xampp/htdocs/marketing_wizard. if use wamp, go to wamp/www/marketing_wizard
  
  
3.create marketing_wizard database and import sql file.


4.create .env to marketing_wizard/core/.env from .env.example.(copy and past)


5.config DB info in .env file and core/config/database.php
  like below
            {'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'marketing_wizard'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),}....
            
            
6.install composer on core folder. run command: composer install.


7.after sucessfuly installed and key generate. command: php artisan key:generate


8.end: visit like this: http://localhost.com/marketing_wizard


9.for login use email:dk1986830@gmail.com, password:123456
  it can be changed on DB
