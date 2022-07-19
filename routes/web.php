<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;

use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request
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

// Route::get('/', function () {
//     return view('home.index', ['met data']);
// }) -> name('home.index');

// Route::get('/contact', function () {
//     return view('home.contact', ['meta data']);
// }) -> name('home.contact');


// Route::view('/', 'home.index') -> name('home.index');
// Route::view('/contact', 'home.contact') -> name('home.contact');
Route::get('/', [HomeController::class, 'home']) -> 
name('home.index');
Route::get('/contact', [HomeController::class, 'contact']) -> 
name('home.contact');
Route::get('/single', AboutController::class);


//use all...
// Route::resource('blog_posts', BlogPostsController::class);
//heres how we limit which routes are registered...
Route::resource('posts', PostsController::class) -> 
only(['index', 'show', 'create', 'store']);
// Route::resource('blog_posts', BlogPostsController::class) -> except('show');

// Route::get('/blog_posts', function() use($blog_posts){
//     //compact($blog_posts) === ['blog_posts' => $blog_posts])
//     // dd(request() -> all());
//      dd((int)request() -> input('page', 1));
//     //  dd((int)request() -> query('page', 1));


//     return view('blog_posts.index', ['blog_posts' => $blog_posts]);
// });





// Route::get('/blog_posts/{id}', function($id) use($blog_posts){
   
    
// })
// -> name('blog_post.show');


Route::get('/recent_posts/{days_ago?}', function ($daysAgo = 20) {
    return 'blog posts from' . $daysAgo . 'days ago';
}) -> name('Blog Post From X Days Ago');


/*Route::prefix('/fun') -> name('fun.') -> group(function() use($blog_posts) {
    Route::get('/responses', function() use($blog_posts) {
        return response($blog_posts, 201) -> header('Content-Type', 'application/json') -> cookie('MY_COOKIE', 'joeleen', 3600);
    }) -> name('responses');
    
    Route::get('/redirect', function() {
    return redirect('/contact');
    }) -> name('redirect');
    
    Route::get('/back', function() {
        return redirect('/contact');
        }) -> name('contact');
    
        Route::get('/named-route', function() {
            return redirect() -> route('blog_post.show', ['id' => 1]);
            }) -> name('blog_post_by_id');
    
            Route::get('/away', function() {
                return redirect() -> away('https://www.google.com');
                }) -> name('away');
    
                Route::get('/json', function() use($blog_posts) {
                    return response() -> json($blog_posts);
                    }) -> name('json');
    
                    Route::get('/download', function() use($blog_posts) {
                        return response() -> download(public_path('/daniel.jpg'), 'face.jpg');
                        }) -> name('download');
});*/


// Route::get('/recent-posts')

// Route::get('/blog_posts/', function () {
// return 'blogposts!';
// });

// Route::get('/blog_posts/1', function () {
//     return 'blogposts! _v1';
//     });