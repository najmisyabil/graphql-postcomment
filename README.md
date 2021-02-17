<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Step-by-step guide

1. <p>Git clone from this repo</p>
2. <p>cd into the cloned directory</p>
3. <p>setup .env (Copy .env.example as .env and set DB details)</p>
4. <p>Open a terminal and run:</p>
> composer install
<p>Wait until the install process is completed, then run</p>
> php artisan key:generate

<p>followed by</p>
> php artisan serve

5. <p>Setup crontab to periodically run the scheduler to download and update posts and comments from third-party api<br></p>
    i- Check if cron is already installed and running. For Arch Linux based can try check on cronie instead of cron
    > sudo systemctl status cron (OR cronie)
    ii- Edit user's cron list
    > crontab -e
    iii- paste and save this to enable the built-in laravel scheduler
    > * * * * * php /path/to/project/directory/artisan schedule:run 1>> /dev/null 2>&1
    <h6>OR</h6>
    iv- If you just want to populate the comments and posts table for one time only. Just run
    > php artisan schedule:run
    </p>
6. <p>Open GraphiQL or GraphQl Playground to test the api</p>
