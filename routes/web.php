<?php

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

