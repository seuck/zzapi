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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['prefix' => 'api/v1'], function($app) {
    $app->get('magazine','MagazineController@index');
    $app->get('magazine/{id}','MagazineController@getMagazine');

    $app->get('magazine/{idMagazine}/issue','IssueController@index');
    $app->get('magazine/{idMagazine}/issue/{idIssue}','IssueController@getIssue');

    $app->get('editor','EditorController@index');
    $app->get('editor/{id}','EditorController@getEditor');

    $app->get('scan-author','ScanAuthorController@index');
}); 
