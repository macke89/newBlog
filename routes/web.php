<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\IndexController;
    use App\Http\Controllers\PostController;
    use \App\Http\Controllers\CommentController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Password;

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

//    ABOUT PAGE
    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Auth::routes(['verify' => true]);

//    INDEXPAGE
    Route::get('/', [IndexController::class, 'index'])->name('index');

//    POSTS
    Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');

//    AUTH ROUTES
    Route::group(['middleware' => ['auth', 'verified']], function() {
//        DASHBOARD
        Route::get('/home', [HomeController::class, 'index'])->name('home');
//        POSTS
        Route::resource('posts', PostController::class)->except('show');
//        COMMENTS
        Route::resource('comments', CommentController::class);
//        VOTES COMMENTS
        Route::get('/comment/{comment_id}/vote/{vote}', [CommentController::class,'vote'])->name('comment.vote');
    });
