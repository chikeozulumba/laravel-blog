<?php

Route::group(
    ['middleware' => [ 'web']],
    function () {

        // alternative Route 
        Route::get('/auth/logout', 'Auth\LoginController@getLogout');


        // Start categories route
        Route::resource('categories', 'CategoriesController', ['except' => ['create']]);

        // comments 
        Route::post('comments/{post_id}', [ 
            'uses' =>  'CommentsController@store', 
            'as' => 'comments.store'] );

        // End categories routes

        Route::get('/', 'PagesController@getIndex')->name('home');

        Route::get('/about', 'PagesController@getAbout')->name('about');

        Route::get('/contact', 'PagesController@getContact')->name('contact');

        Route::post('/contact', 'PagesController@postContact')->name('Contact Form');

        Route::resource('posts', 'PostController');

        Route::resource('tags', 'TagController');

        // Route::get('/single', 'PagesController@getContact');

        Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle']);
        Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);

        // Comments
        Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
        Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
        Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
        Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
        Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);
        
    }
);

Auth::routes();
