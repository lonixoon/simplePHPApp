<?php
/**
 * Created by PhpStorm.
 * User: RU00160171
 * Date: 24.10.2017
 * Time: 10:11
 */

define('ROUTES',[
//    '/' => 'MainController@index',
    '/' => 'MainController@showFeedback',


    '/test' =>'TestController@index',

    '/login' =>'LoginController@index',
    '/loginOut' =>'LoginController@loginOut',

    '/feedback' =>'FeedbackController@index',
    '/feedbackSend' =>'FeedbackController@feedbackSend',

    '/reg' =>'RegController@index',
    '/regSendData' =>'RegController@reg',

    '/404' =>'ErrorController@index'
]);

define('AUTH_ROUTES',[
    '/feedback'
]);