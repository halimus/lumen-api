<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function() use ($app) {
    //return $app->version();
    return "Lumen RESTful API By Halim";
});
 
$app->group(['prefix' => 'api/v1'], function($app){
    
    //Languages routes
    $app->get('languages','LanguageController@index');            //All Languages
    $app->get('languages/{id}','LanguageController@show');        //Fetch Language By id
    $app->post('languages','LanguageController@store');           //Create a Language record
    $app->put('languages/{id}','LanguageController@update');      //Update Language By id
    $app->delete('languages/{id}','LanguageController@destroy');  //Delete Language By id

    //Books routes
    $app->get('books','BookController@index');           
    $app->get('books/{id}','BookController@show');       
    $app->post('books','BookController@store');        
    $app->put('books/{id}','BookController@update');      
    $app->delete('books/{id}','BookController@destroy');  
    
});