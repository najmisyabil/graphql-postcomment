<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Step-by-step guide

1. Git clone from this repo
2. cd into the cloned directory
3. setup .env (Copy .env.example as .env and set DB details)
4. Open a terminal and run:<br>
    i- composer install<br>
    ii- php artisan key:generate<br>
    iii- php artisan serve<br>
5. Setup crontab to periodically run the scheduler to download and update posts and comments from third-party api<br>
   i- sudo systemctl status cron (check if cron is already installed and running. For Arch Linux based can try check on cronie instead of cron)<br>
   ii- crontab -e (to edit user's cron)<br>
   iii- paste and save this -> * * * * * php /path/to/project/directory/artisan schedule:run 1>> /dev/null 2>&1<br>
## OR <br>
   if you just want to populate the comments and posts table for one time only, run:<br>
    php artisan schedule:run
6. Open GraphiQL or GraphQl Playground to test the api
