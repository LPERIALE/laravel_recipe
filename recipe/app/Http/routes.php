<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	
	 Route::get('/home',[
        'as'=>'ricette.home', 
        'uses'=>'RecipeController@showHome']);
        
	 Route::get('/',[
        'as'=>'ricette.home', 
        'uses'=>'RecipeController@showHome']);
        
     Route::get('/lista',[
        'as'=>'ricette.list', 
        'uses'=>'RecipeController@showList']);
     
     Route::get('/cerca',[
        'as'=>'ricette.found', 
        'uses'=>'RecipeController@showFound']);
        
     Route::get('/crea',[
		'middleware' => 'auth',
        'as'=>'ricette.form', 
        'uses'=>'RecipeController@showForm']);
     
     Route::post('/lista',[
        'as'=>'ricette.lista', 
        'uses'=>'RecipeController@create']);
        
     Route::get('/modifica/{id}',[
		'middleware' => 'auth',
        'as'=>'modify', 
        'uses'=>'RecipeController@modify']);
        
     Route::put('/lista/{id}',[
        'as'=>'ricette.modifier', 
        'uses'=>'RecipeController@modifier']);
      
     Route::get('/lista/{id}',[
        'as'=>'finder', 
        'uses'=>'RecipeController@finder']); 
        
     Route::get('/ricetta',[
        'as'=>'title', 
        'uses'=>'RecipeController@findTitle']); 
        
     Route::get('/ricette',[
        'as'=>'ingredients', 
        'uses'=>'RecipeController@findIngredients']);
        
     Route::get('/ricette/nome',[
        'as'=>'name', 
        'uses'=>'RecipeController@findName']);
        
     Route::get('/lista/cancella/{id}',[
        'as'=>'deleteRecipe', 
        'uses'=>'RecipeController@deleteRecipe']);
       
     Route::get('/user/ricette',[
		'middleware' => 'auth',
        'as'=>'userRecipe', 
        'uses'=>'RecipeController@showUserList']);

     Route::auth();

     Route::get('/home', 'HomeController@index');
     
	/*
	|--------------------------------------------------------------------------
	| Admin Routes
	|--------------------------------------------------------------------------
	|
	*/
     
     Route::group(['middleware' => 'admin'], function () {
		Route::get('/admin',[
			'as'=>'admin.home', 
			'uses'=>'RecipeController@adminHome']);
		
		Route::get('/admin/ingredienti',[
			'as'=>'admin.ingreds', 
			'uses'=>'RecipeController@adminIngreds']); 
        
        Route::get('/modifica/user/{user_id}',[
			'as'=>'modifyUser', 
			'uses'=>'RecipeController@modifyUser']);
		
		Route::get('/modifica/ingred/{ingred_id}',[
			'as'=>'modifyIngred', 
			'uses'=>'RecipeController@modifyIngred']);

		Route::put('/admin/user/{user_id}',[
			'as'=>'user.modifier', 
			'uses'=>'RecipeController@modifierUser']);
		
		Route::put('/modifica/ingred/{ingred_id}',[
			'as'=>'modifierIngred', 
			'uses'=>'RecipeController@modifierIngred']);
			
		Route::get('/admin/user/{user_id}',[
			'as'=>'deleteUser', 
			'uses'=>'RecipeController@deleteUser']);
		
		Route::get('/admin/ingred/{ingred_id}',[
			'as'=>'deleteIngred', 
			'uses'=>'RecipeController@deleteIngred']);
			
	 });
});



