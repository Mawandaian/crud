<?php
// Create Post
Route::post('/create_post', 'DatabaseController@saveData');

// Read Posts
Route::get('/', 'DatabaseController@loadPage');

// Update Post
Route::get('/update_post', 'DatabaseController@updateData');

// Delete Post
Route::get('/delete_post', 'DatabaseController@deleteData');
