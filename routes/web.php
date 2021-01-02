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

    Auth::routes();

//    DASHBOARD
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

//    INDEXPAGE
    Route::get('/', [IndexController::class, 'index'])->name('index');

//    FORGOT PASSWORD
    Route::get('/forgot-password', function () {
        return view('auth.passwords.email');
    })->middleware('guest')->name('password.request');

    Route::post('/forgot-password', function (Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    })->middleware('guest')->name('password.email');


    Route::resource('posts', PostController::class)->middleware('auth');
    Route::resource('comments', CommentController::class)->middleware('auth');
