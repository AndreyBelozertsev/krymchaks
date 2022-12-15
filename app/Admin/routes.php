<?php


Route::post('/settings', '\App\Http\Controllers\SettingController@save')->name('saveSetting');