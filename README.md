<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Demo & Repository
Here's a link of a 2min demo of the project up & running
- https://www.loom.com/share/167655d1f91d4eb6aa29e1c097d1fd50?from_recorder=1&focus_title=1
And if you want to have a track of the commits made it you can go to the repository link
- https://github.com/Andino/task-manager -> It's public 😋

# Application Execution
To use the application we need to follow the next steps:
- Install dependencies
```
composer install

npm install
```

- Then we need to copy the .env file and generate the app key
```
cp .env.example .env
php artisan key:generate
```

- Then, we should fill the database .env information with our local server. We need to add a value to the following .env vars
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager_coalition_technologies
DB_USERNAME=root
DB_PASSWORD=
```

-After fill our database connection info, we can proceed running the migrations
```
php artisan migrate
```

- Last but not least, we can run the laravel and vite services to execute the app
```
php artisan serve
npm run dev
```

## Bibliography
Here we have the list of dependencies/posts that it was used for the development of this project
- Draggable Components for Vue3 (Official Package is not yet upgraded to version 3) -> https://github.com/anish2690/vue-draggable-next
- Fonts: https://fontawesome.com
- Modal Inspiration: https://codepen.io/immarina/pen/oNxXWKa
- Input Inspiration: https://flowbite.com/docs/forms/input-field/
- General Laravel Development: https://laravel.com/docs/9.x
- Loading spinner with css: https://www.w3docs.com/snippets/css/how-to-create-loading-spinner-with-css.html
- Popup Notifications: https://github.com/euvl/vue-notification/tree/master
- Key reorder query to reset order column values: https://www.tutorialspoint.com/reorder-keys-after-deleting-a-record-from-mysql-table
