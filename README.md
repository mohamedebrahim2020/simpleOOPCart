
##### Built Using
 PHP
  Laravel
   @laravel Framework,
     
       
### All Needed Files and 


7. run postman collection 

for collection of post man to test APIs
**_[here](https://www.getpostman.com/collections/a100dc896e4542c7ee79)_**



### Hardware Requirements
-	PHP > 7.2
-   Composer
-	Laravel 7.2

### Installation
first
```
$ git clone https://github.com/mohamedebrahim2020/blogAPI.git
```
```
$ cd final_project
```

1. rename .env.example file to .env 
then edit in .env file with
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
2. Install composer dependencies
```
$ composer install
```
3. Generate APP_KEY
```
$ php artisan key:generate
```
4.Run migrations
```
$ php artisan migrate
```
5.Run db seeder
```
$ php artisan db:seed --class=ProductSeeder
```
6. Run server
```
$ php artisan serve
```
7. for unit test
```
$ php vendor/phpunit/phpunit/phpunit
```

8. my design & architecture

i depend in coding on solid priciple specially single resposibilty & small interfaces 
 first i have check class which implements checkstore interface which check about the quantity in store 
 and calculate total prices
 second i have tax class which implements tax interface and make taxes calculation
 third i have offers class which implements offer interface and has 2 child classes (ShoesClass And JacketClass) calculate possible discount
 fourth i have checkout class wich implements checkout interface to show the cart outputs as(overall,discount ,subtotal ,taxes)
 
