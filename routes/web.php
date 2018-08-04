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
// Home and about us route
Route::get('/', 'PagesController@getIndex');
Route::get('/about', 'PagesController@getAbout');

// Route for the contact form
Route::get('/contact', 'PagesController@getContact');
Route::post('/contact', 'PagesController@postContact');

//Route for tech news
Route::resource('/blog', 'PostController');

//Route for events
Route::resource('/event', 'EventController');


//Route for team
Route::get('/team' , 'TeamController@getTeam');
Route::get('/team/{member_id}' , 'TeamController@getMember');

//Route for images in the app folder
Route::get('/team/images/{attribute}',  'TeamController@imagesUrlAction');
Route::get('/gallery/images/{attribute}',  'GalleryController@imagesUrlAction');


//Route to handle news letters subscription
Route::post('/newsletter', 'PagesController@subscribeNewsletter');

//Route to handle user comments
Route::post('/usercomments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'usercomments.store']);



Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::post('/dashboard', ['uses' => 'DashboardController@updateProfile', 'as' => 'dashboard.updateprofile']);
Route::post('/dashboard/pass', ['uses' => 'DashboardController@changePassword', 'as' => 'dashboard.updatepassword']);

Route::post('/like', ['uses' => 'PostController@likePost' , 'as' => 'like']);
Route::post('/going', ['uses' => 'EventController@eventInterest' , 'as' => 'going']);

Route::post('/quickregister', ['uses' => 'PostController@quickRegister' , 'as' => 'quickregister']);

//Route to handle the facebook login

Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');

Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');



Route::group(['prefix' => 'admin', 'middleware' => 'is_admin'], function () {

    Route::get('/dashboard', 'PagesController@getAdminIndex');
    Route::get('/register', 'PagesController@getAdminRegister');
    Route::resource('/courses', 'Admin\CourseController');
    Route::resource('/posts', 'Admin\PostController');
    Route::resource('/events', 'Admin\EventController');
    Route::resource('/tags', 'Admin\TagController');
    Route::resource('/comments', 'Admin\CommentController');
    Route::resource('/categories', 'Admin\CategoryController');
    Route::resource('/team', 'Admin\TeamController');
    Route::resource('/users', 'Admin\UserController');
    Route::resource('/gallery', 'Admin\GalleryController');
    Route::resource('/docs', 'Admin\DocumentController');
    Route::resource('/video', 'Admin\VideoController');
    Route::get('/team/images/{attribute}',  'Admin\TeamController@imagesUrlAction');
    Route::get('/gallery/images/{attribute}',  'Admin\GalleryController@imagesUrlAction');


}); 