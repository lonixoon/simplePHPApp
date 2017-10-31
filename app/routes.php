<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 10:11
 */

define('ROUTES',[
    '/' => 'MainController@index',
    '/test' =>'TestController@index',
    '/login' =>'LoginController@index',
    '/logout' =>'LoginController@logOut',
    '/feedback' =>'FeedbackController@index',
    '/reg' =>'RegController@index',
    '/404' =>'ErrorController@index'
]);

define('AUTH_ROUTES',[
    '/feedback'
]);