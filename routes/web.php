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

$app->group(['prefix' => 'api/v1'], function($app) {
    $app->get('magazine','MagazineController@index');
    $app->get('magazine/{id}','MagazineController@getMagazine');

    $app->get('magazine/{idMagazine}/issue','IssueController@index');
    $app->get('magazine/{idMagazine}/issue/{idIssue}','IssueController@getIssue');

    $app->get('editor','EditorController@index');
    $app->get('editor/{id}','EditorController@getEditor');

    $app->get('scan-author','ScanAuthorController@index');

    $app->get('game/{idGame}','GameController@getGame');
    $app->get('game/find/{gameName}','GameController@findGames');
    $app->get('game/findMore/{gameName}','GameController@findMoreGames');

    // $app->post('content','ContentController@createContent');
}); 

$app->get('/{any:.*}', function() {
    return view('webapp');
});
