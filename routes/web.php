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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/macro', 'Auth\MacroController@index');
Route::get('/pluck/index', 'Index\PluckController@index');
Route::get('/chunk/index', 'Index\ChunkController@index');
Route::get('/chunk/exist', 'Index\ChunkController@exist');

// 模型路由
Route::get('/get_user_phone','Index\OneToOneController@getUserPhone');
Route::get('/get_user_info_by_phone','Index\OneToOneController@getUserInfoByPhone');

Route::get('/get_post_many_comment','Index\OneToManyController@getPostManyComment');
Route::get('/get_post_info_by_comment', 'Index\OneToManyController@getPostInfoByComment');

Route::get('/get_posts_from_country', 'Index\HasManyThroughController@getPostsFromCountry');

Route::get('/get_image_by_post', 'Index\PolymorphicController@getImageByPost');

Route::get('/get_user_role', 'Index\ManyToManyController@getUserRole');
Route::get('/get_user_by_role', 'Index\ManyToManyController@getUserByRole');

Route::get('/get_all_commentpv_by_post', 'Index\PolymorphicController@getAllCommentPvByPost');

Route::get('/get_all_tag_by_post', 'Index\PolymorphicController@getAllTagByPost');
