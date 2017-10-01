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

Route::get('/', 'PagesController@home')->name('home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');


Route::get('/tickets', 'TicketsController@index');

// show - показати окремий квиток
Route::get('/ticket/{slug}', 'TicketsController@show');

//-----------------------------------------------------------------
// create - показати форму для введення даних, щоб створити квиток
Route::get('/contact', 'TicketsController@create');

// store - прийняти дані з форми і зберегти у БД
Route::post('/contact', 'TicketsController@store');

//---------------------------------------------------------------------
// edit - показати форму для редагування існуючого квитка
Route::get('/ticket/{slug}/edit', 'TicketsController@edit');

// update - прийняти дані з форми редагування і оновити дані у БД
Route::post('/ticket/{slug}/edit', 'TicketsController@update');

//---------------------------------------------------------------------
// destroy - видалити окремий квиток
Route::post('/ticket/{slug}/delete', 'TicketsController@destroy');

//--------------------------------------------------------------------
//
Route::post('/comment', 'CommentsController@newComment');

/*
|---------------------------------------------------------------------
|Route для тестового відправлення email
|
*/
Route::get('/sendemail', function(){
    $data = ['name' => 'Learning Laravel'];
    Mail::send('emails.welcome', $data, function ($message){
        $message->from('admin@domain.com', 'Learning Laravel');
        $message->to('myEmail@domain')->subject('Learning Laravel test email');
    });
    return "Your email has been sent successfully";
});

/*
|--------------------------------------------------------------------------
|Authentication
|--------------------------------------------------------------------------
 */
// user register
//Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
//Route::post('/register', 'Auth\RegisterController@register');
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

// user logout
//Route::get('/logout', 'Auth\LoginController@logout');

//user login
//Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/login', 'SessionsController@create');
Route::get('/logout', 'SessionsController@destroy');
Route::post('/login', 'SessionsController@store');


/*
|--------------------------------------------------------------------------
|Admin
|--------------------------------------------------------------------------
 */

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function(){

    Route::get('/', 'PagesController@home');

    // display all users
    Route::get('users', 'UserController@index');

    Route::get('users/{id?}/edit', 'UserController@edit');
    Route::post('users/{id?}/edit', 'UserController@update');


    // display all roles
    Route::get('roles', 'RolesController@index');

    //create roles
    Route::get('roles/create', 'RolesController@create');
    Route::post('roles/create', 'RolesController@store');

    // display a single role
    Route::get('roles/{id}', 'RolesController@show');

    //edit roles
    Route::get('roles/{id}/edit', 'RolesController@edit')->name('role_edit');
    Route::post('roles/{role}/edit', 'RolesController@update')->name('role_update');

/*
  |---------------------------------------------------------------------------------
    admin/ posts
*/
    Route::get('posts', 'PostsController@index');
    Route::get('posts/create', 'PostsController@create');
    Route::post('posts', 'PostsController@store');
    Route::get('posts/{post}/edit', 'PostsController@edit');
    Route::patch('posts/{post}', 'PostsController@update');


    /*
     |-----------------------------------------------------------------------------
    admin/categories
     */

    Route::get('categories', 'CategoriesController@index');
    Route::get('categories/create', 'CategoriesController@create');
    Route::post('categories', 'CategoriesController@store');

});
/*
 |------------------------------
 | Blog
 |------------------------------
 * */
Route::get('/blog', 'BlogController@index');
Route::get('/blog/{slug}', 'BlogController@show');




