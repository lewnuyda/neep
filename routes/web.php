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

Route::get('/', function () {
    return view('welcome');
});

Route::any('main', 'MainController@main');

Route::get('/main', 'MainController@main')->name('main');
Route::get('/contact_us', 'MainController@contact_us')->name('contact_us');


Route::any('admin/login', 'AdminLoginController@login');


Route::any('/login/checklogin', 'AdminLoginController@checklogin');

Route::get('/admin/dashboard', 'Admin\DashboardController@index');
Route::get('/admin/login/logout', 'AdminLoginController@logout');


Route::any('/admin/manage_users', 'Admin\ManageUsersController@index');
//Route::group(['middleware' => 'auth'], function() {
Route::get('/admin/manage_users/get_all_users','Admin\ManageUsersController@get_all_users');


Route::get('/admin/manage_users/get_user/{id}','Admin\ManageUsersController@get_user');

Route::post('/admin/manage_users/update_user','Admin\ManageUsersController@update_user');

Route::post('/admin/manage_users/save_user','Admin\ManageUsersController@save_user');



Route::any('/admin/neep_requests', 'Admin\NeepRequestsController@index');

Route::any('/admin/neep_requests/get_all_neep_requests','Admin\NeepRequestsController@get_all_neep_requests');

Route::get('/admin/neep_requests/get_usr_neep_request_html/{id}','Admin\NeepRequestsController@get_usr_neep_request_html');

Route::get('/admin/neep_requests/create_usr_neep_request_pdf/{id}','Admin\NeepRequestsController@create_usr_neep_request_pdf');

Route::get('/admin/neep_requests/get_expert_list/{id}','Admin\NeepRequestsController@get_expert_list');


Route::get('/admin/neep_requests/get_expert_profile_html/{id}','Admin\NeepRequestsController@get_expert_profile_html');

Route::get('/admin/neep_requests/create_expert_profile_pdf/{id}','Admin\NeepRequestsController@create_expert_profile_pdf');

Route::any('/admin/neep_requests/sendMailToExpert','Admin\NeepRequestsController@sendMailToExpert');

Route::get('/admin/neep_requests/get_neep_action/{id}','Admin\NeepRequestsController@get_neep_action');

Route::get('/admin/neep_expert/response/{id}/{expert_id}','NeepExpertController@response');

Route::any('/neep_expert/save_neep_expert_response','NeepExpertController@save_neep_expert_response');
//});

//Route::post('send-mail', [MailController::class, 'mailSend'])->name('mailSend');
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/home', 'HomeController@index')->name('home');*/



/*Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('lewjason.nuyda@hotmail.com')->send(new \App\Mail\MailNotif($details));
   
    dd("Email is Sent.");
});*/
