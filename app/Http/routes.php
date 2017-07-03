<?php
use Session;
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

/*Route::get('/', function () {
    return view('homepage');
});*/

function checking()
{
	if (Session::get('username'))
	{
		if (Session::get('designation')=='hr') 
    		  {
    		  	return redirect('/hr');
    		  }
    	      else
    		  {
    		  	return view('homepage');
    		  }
	}
	else
	{
    	return view('home');
    }
}

Route::get('/', function () {
	//checking();
	return view('home');

});



Route::get('/attendance', function () {
	//checking();
	return view('attendance');

});

Route::get('/admin', function () {
    return view('admin');
});

Route::any('/logout', 'Controller@logout');

Route::any('/logged_in', 'Controller@logged_in');

Route::any('/mark/{log}', ['uses' =>'Controller@mark']);


Route::any('/register/{name}', ['uses' =>'Controller@rec']);

Route::any('/hr', 'Controller@hr');

Route::any('/getdetails', 'Controller@getDetails');

Route::any('/new_emp', 'Controller@new_emp');

Route::any('check/{name}', ['uses' =>'Controller@check']);

Route::any('/add_user', 'Controller@add_user');


Route::any('/login', 'Controller@login');

Route::post('/username', 'Controller@uname');

Route::any('/admin1', 'Controller@admin');

Route::any('/register1', 'Controller@register');

