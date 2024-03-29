<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'AngularController@serveApp');

    Route::get('/unsupported-browser', 'AngularController@unsupported');
});

//public API routes
$api->group(['middleware' => ['api']], function ($api) {

    // Authentication Routes...
    $api->post('auth/login', 'Auth\AuthController@login');
    $api->post('auth/register', 'Auth\AuthController@register');

    // Password Reset Routes...
    $api->post('auth/password/email', 'Auth\PasswordResetController@sendResetLinkEmail');
    $api->get('auth/password/verify', 'Auth\PasswordResetController@verify');
    $api->post('auth/password/reset', 'Auth\PasswordResetController@reset');

    $api->post('posts', 'CreatePostController@create');
    $api->get('posts', 'PostsController@get');

    $api->post('/bases', 'BasesController@save');
    $api->get('/bases', 'BasesController@get');
    $api->get('/bases/coleta', 'BasesController@colect');
    $api->put('/bases/{base_id}', 'BasesController@update');

    $api->get('/basePerChannel/coleta', 'basePerChannelController@colect');
    $api->get('/basePerChannel/notMyBase', 'basePerChannelController@colectNotMyBase');
    $api->get('/basePerChannel', 'basePerChannelController@get');
    $api->post('/basePerChannel', 'basePerChannelController@save');

    $api->get('/channels/', 'ChannelsController@get');
    $api->get('/channels/coleta', 'ChannelsController@colectMyData');
    
    $api->get('/emailMarketing/', 'EmailMarketingController@get');
    $api->get('/emailMarketing/all', 'EmailMarketingController@getAll');
    $api->post('/emailMarketing/', 'EmailMarketingController@save');
    
    $api->get('/emailMarketingInfos/', 'EmailMarketingInfosController@get');
    $api->post('/emailMarketingInfos/', 'EmailMarketingInfosController@save');

});

//protected API routes with JWT (must be logged in)
$api->group(['middleware' => ['api', 'api.auth']], function ($api) {
});
