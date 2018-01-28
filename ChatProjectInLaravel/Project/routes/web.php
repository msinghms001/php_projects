<?php

Route::resource('register','registerController');
Route::post('store','registerController@store');

Route::get('dynamicChatView','ChatsController@fetchmessages');

Route::get('people','friendsController@index');
Route::post('friends/storing','friendsController@storing');
Route::get('friends/show/{id}','friendsController@showmyfriends');

Route::get('/', 'ChatsController@homelogin')->name('homewelcome');
Route::post('chat','ChatsController@index');
Route::get('chat/show/{id}','ChatsController@show')->name("showing");
Route::get('logout','ChatsController@logout');
Route::get('edit/{id}','ChatsController@edit');

Route::get('testChat',function(){
	return view('chattingView.shot');
});

Route::get('validate',function(){
	return csrf_token();
});
Route::post('/validate2','msgValidator@index');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');