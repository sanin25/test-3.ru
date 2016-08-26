<?php 
Route::group(['middleware' => config('lafiles.middleware') ? config('lafiles.middleware') : null], function () {
    
    Route::get('lafiles/containers', [
        'as' => 'lafiles.containers',
        'uses' => '\Jasekz\Laradrop\Http\Controllers\LaradropController@getContainers'
    ]);
    
    Route::post('lafiles/move', [
        'as' => 'lafiles.move',
        'uses' => '\Jasekz\Laradrop\Http\Controllers\LaradropController@move'
    ]);
    
    Route::post('lafiles/create', [
        'as' => 'lafiles.create',
        'uses' => '\Jasekz\Laradrop\Http\Controllers\LaradropController@create'
    ]);
    
    Route::resource('lafiles', '\Jasekz\Laradrop\Http\Controllers\LaradropController');
    
});