# laravel simple web shop

Version 1.1

# Getting started:
----------------
1. Install Web shop:
   ```
   
  Copy app folder to your root www(public_html) folder.
  
   ```
2. Set Database in wamp(xampp)
   ```
   
   In root folder find .env
  
   DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shoppingcart
DB_USERNAME=root
DB_PASSWORD=

   ```
3. CMD
   ```
   
   php artisan migrate
   (upload your sql file for Database)
   # start project
   php artisan serve
   
   ```

# Issue of project
```
 Database that your specified for this project while not working at all
```
 1. Fix issue
```
 In App\User.php  change protected table to "users" and add new columb in DB(Via phpmyadmin) created_at	=> timestamp, update_at =>	timestamp
```
