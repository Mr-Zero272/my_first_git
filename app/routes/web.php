<?php
use App\Router;
use Illuminate\Support\Facades\Route;

// Router::get('/hello', function () {
//     echo "Hello world!";
// });

Router::get('/', 'App\Controllers\HomeController@index');
Router::get('home', 'App\Controllers\HomeController@index');

Router::post('/login', 'App\Controllers\Auth\LoginController@login');
Router::get('/login', 'App\Controllers\Auth\LoginController@login');


Router::get('/logout', 'App\Controllers\Auth\LoginController@logout');
Router::post('/logout', 'App\Controllers\Auth\LoginController@logout');

Router::post('/register', 'App\Controllers\Auth\RegisterController@register');
Router::get('/register', 'App\Controllers\Auth\RegisterController@register');


Router::error(function () {
    echo '404 :: Page Not Found';
});
?>