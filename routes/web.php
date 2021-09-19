<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','HomeController@index')->name('index');
Route::get('login','AdminController@Index')->name('login');
Route::get('Login','AdminController@Index')->name('Login');
Route::Post('adminlogin','AdminController@adminlogin')->name('adminlogin');
Route::get('logout','AdminController@LogOut')->name('logout');

// Auth::routes();

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::Get('home', 'AdminController@Home')->name('admin.home');
    Route::Get('numbersystem', 'AdminController@NumberSystem')->name('admin.numbersystem');
    Route::Get('gametype','AdminController@Gametype')->name('gametype');
    Route::Post('gameadd','AdminController@GameAdd')->name('gameadd');
    Route::get('removeitem/{id}','AdminController@RemoveItem')->name('removeitem');
    Route::get('EditeItem/{id}','AdminController@EditeItem')->name('EditeItem');

    Route::get('editedate/{id}','AdminController@EditeDate')->name('editedate');
    Route::get('dalygameresult','AdminController@dalygameresult')->name('dalygameresult');

    Route::get('slote','AdminController@slote')->name('slote');
    Route::Post('timeslode','AdminController@timeslode')->name('timeslode');

    Route::get('Removetimeslode/{id}','AdminController@Removetimeslode')->name('Removetimeslode');
    Route::get('edittimeslote/{id}','AdminController@edittimeslote')->name('edittimeslote');


    //date time route
    Route::get('datetime','Admincontroller@Datetime')->name('datetime');
    Route::Post('datetimeinsert','AdminController@DatetimeInsert')->name('datetimeinsert');
    Route::get('removedatetime/{id}','AdminController@RemoveDatetime')->name('removedatetime');
    Route::get('RemoveDate/{id}','AdminController@RemoveDate')->name('RemoveDate');

    // get no
    Route::Post('getno','AdminController@GetNo')->name('getno');
    //save game
    Route::Post('savegame','AdminController@savegame')->name('savegame');
    //tuday game list
    Route::get('tudaygame','AdminController@TudayGameList')->name('tudaygame');
    Route::get('addnumber','AdminController@addnumber')->name('addnumber');

    Route::get('dalygameresultlist','AdminController@dalygameresultlist')->name('dalygameresultlist');
    Route::Post('changenumber','AdminController@changenumber')->name('changenumber');
    Route::Post('changenumber1','AdminController@changenumber1')->name('changenumber1');
    Route::Post('changenumber2','AdminController@changenumber2')->name('changenumber2');
    Route::Post('changenumber3','AdminController@changenumber3')->name('changenumber3');


    Route::get('sessionclear','AdminController@sessionclear')->name('sessionclear');

});




