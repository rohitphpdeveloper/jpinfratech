<?php



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

Route::get('/','HomeController@index');

Route::get('/faq','HomeController@faq');

Route::get('/contact_us','HomeController@contact');

Route::post('/contactus','HomeController@contact_us');

Route::get('/contactus','HomeController@faq');

Route::get('news/{slug}','HomeController@news');



Route::get('page/{slug}', 'HomeController@pages')->where('slug', '[_A-Za-z-]+');


Auth::routes();

//user details

Route::group(['middleware' => ['auth']], function () {

	Route::get('/home','HomeController@home');

	Route::get('/eventlist','EventController@event');

	Route::get('/voting/{id}','EventController@voting');

	Route::post('/thankyou','EventController@thankyou');

	Route::get('/thank_you','EventController@thank_you');

	Route::get('/profile','EventController@profile');

	Route::get('/enquiry','EventController@enquiry');

	Route::post('/user_enquiry','EventController@userenquiry');

	Route::get('change_password','CommonController@change_password');
	Route::post('/change_password_otp','CommonController@change_password_otp');
	Route::get('/change_password_otp_from','CommonController@change_password_otp_from');
	Route::post('/change_password_submit','CommonController@change_password_submit');

});

//Login

Route::post('/login_otp_send','Auth\LoginController@login_otp_send');
Route::get('/login_otp','Auth\LoginController@login_otp');
Route::get('/login_buyers','Auth\LoginController@login_buyers');
Route::post('/hblogin','Auth\LoginController@hblogin');
Route::post('/login_otp','Auth\LoginController@verifed_login_otp');


// admin route

Route::group(array('prefix' => 'admin', 'middleware' => 'admin'), function () {

	Route::get('admin','Admin\DashboardController@index');
	Route::get('/dashboard','Admin\DashboardController@index');
	Route::get('/download','Admin\DownloadController@export');
	Route::get('/reply/{id}','Admin\QueryController@reply');
	Route::POST('/reply_answer','Admin\QueryController@reply_answer');
	Route::resource('/users','Admin\UserController');
	Route::get('/user_import','Admin\UserController@user_import');
    Route::post('/user_import','Admin\UserController@import_excel');
	Route::resource('/pages','Admin\PageController');
	Route::resource('/resolution','Admin\ResolutionController');
	Route::post('/resolution/finalize','Admin\ResolutionController@finalize');
	Route::resource('/voting','Admin\VotingController');
	Route::resource('/queries','Admin\QueryController');
	Route::get('/contact_queries','Admin\QueryController@contact_query');
	Route::resource('/faq','Admin\FaqController');
	Route::resource('/blog', 'Admin\BlogController');
	Route::resource('/reports_fd', 'Admin\ReportController');
	Route::get('/reports_buyers', 'Admin\ReportController@reports_buyers');
	Route::get('/reports', 'Admin\ReportController@reports');
	Route::get('/resolution_log/{id}', 'Admin\ResolutionController@resolution_log');
	Route::resource('/sub_admin','Admin\SubadminController');
	Route::resource('/backup','Admin\BackupController');
	Route::post('/backup/backup_data','Admin\BackupController@backup');
	Route::post('/backup/restore_data','Admin\BackupController@restore');
	Route::get('/report/{id}', 'Admin\ReportController@download_report');


});



Route::get('admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Admin\Auth\LoginController@login');
Route::post('admin/logout', 'Admin\Auth\LoginController@logout');
Route::get('/404','CommonController@pageNotFound');

// Password Reset Routes...
Route::get('admin/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('admin/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('admin/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm');
Route::post('admin/reset', 'Admin\Auth\ResetPasswordController@reset');









