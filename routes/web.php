<?php
use App\Http\Controllers\Custom\CategoryController;

use App\Http\Controllers\Custom\PostController;
use App\Http\Controllers\Custom\IndexController;
use App\Http\Controllers\Custom\TagController;
use App\Http\Controllers\Custom\TrendingController;
use App\Http\Controllers\Custom\BookmarkController;
use App\Http\Controllers\Custom\LikeController;
use App\Http\Controllers\Custom\CommentController;
use App\Http\Controllers\Custom\LiveStreamController;
// test deploywww

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);
    //
    Route::resource('categories', 'CategoryController');

    // 
    Route::resource('posts', 'PostController');

    Route::resource('tags', 'TagController');

    Route::get('comments', 'CommentController@index')->name('comments.index');

Route::get('comments/{comment}/approve', 'CommentController@approve')->name('comments.approve');

Route::get('comments/{comment}/reject', 'CommentController@reject')->name('comments.reject');

Route::delete('comments/{comment}', 'CommentController@destroy')->name('comments.destroy');

Route::resource('likes', 'LikeController')->only(['index','destroy']);
Route::resource('bookmarks', 'BookmarkController')->only(['index','destroy']);
Route::delete('bookmarks/destroy', 'BookmarkController@massDestroy')->name('bookmarks.massDestroy');
Route::resource('ads', 'AdController');

 Route::resource('live', 'LiveStreamController');

   
    // 🔥 Toggle live on/off
    Route::post('live/{live}/toggle', [\App\Http\Controllers\Admin\LiveStreamController::class, 'toggle'])
        ->name('live.toggle');

   
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});



Route::get('/', [IndexController::class, 'index'])->name('custom.home');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/post/{slug}', [PostController::class, 'show'])->name('post.show');

Route::get('/tag/{id}', [TagController::class, 'show'])->name('tag.show');

Route::get('/trending', [TrendingController::class, 'index'])->name('trending');

Route::get('/live', [LiveStreamController::class, 'index'])->name('live');


Route::middleware('auth')->group(function () {

    // 🔥 Bookmark list page
    Route::get('/bookmarks', [BookmarkController::class, 'index'])
        ->name('bookmarks');

        Route::post('/bookmark/{post}', [BookmarkController::class, 'store'])
            ->name('bookmark.store');

    // 🔥 Remove bookmark
    Route::delete('/bookmarks/{bookmark}', [BookmarkController::class, 'destroy'])
        ->name('bookmarks.destroy');

        Route::post('/like/{post}', [LikeController::class, 'toggle'])
    ->name('like.toggle');

    Route::post('/comments/{post}', [CommentController::class, 'store'])
    ->name('comments.store');


});