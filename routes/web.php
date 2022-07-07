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

// Route::get('/', function () {
//     return view('home.index', ['met data']);
// }) -> name('home.index');

// Route::get('/contact', function () {
//     return view('home.contact', ['meta data']);
// }) -> name('home.contact');


Route::view('/', 'home.index') -> name('home.index');
Route::view('/contact', 'home.contact') -> name('home.contact');


$blog_posts = [
    1 => [
        'title' => 'Intro to Laravel',
        'content' => 'This is a short intro to Laravel',
        'is_new' => true,
        'has_comments' => true
    ],
    2 => [
        'title' => 'Intro to PHP',
        'content' => 'This is a short intro to PHP',
        'is_new' => false
    ],
    3 => [
        'title' => 'Intro to golang',
        'content' => 'This is a short intro to goland',
        'is_new' => false
    ]
];


Route::get('/blog_posts', function() use($blog_posts){
    //compact($blog_posts) === ['blog_posts' => $blog_posts])
    return view('blog_posts.index', ['blog_posts' => $blog_posts]);
});





Route::get('/blog_posts/{id}', function($id) use($blog_posts){
    // $blog_posts = [
    //     1 => [
    //         'title' => 'Intro to Laravel',
    //         'content' => 'This is a short intro to Laravel',
    //         'is_new' => true,
    //         'has_comments' => true
    //     ],
    //     2 => [
    //         'title' => 'Intro to PHP',
    //         'content' => 'This is a short intro to PHP',
    //         'is_new' => false
    //     ]
    // ];
    
abort_if(!isset($blog_posts[$id]), 404);




    return view('blog_posts.show', ['blog_post' => $blog_posts[$id]]);
})
-> name('blog_post.show');


Route::get('/recent_posts/{days_ago?}', function ($daysAgo = 20) {
    return 'blog posts from' . $daysAgo . 'days ago';
}) -> name('Blog Post From X Days Ago');


Route::prefix('/fun') -> name('fun.') -> group(function() use($blog_posts) {
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
});


// Route::get('/recent-posts')

// Route::get('/blog_posts/', function () {
// return 'blogposts!';
// });

// Route::get('/blog_posts/1', function () {
//     return 'blogposts! _v1';
//     });