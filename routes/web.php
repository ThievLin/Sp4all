<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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

Route::get('/',function(){
	return redirect()->to('/home');
});

Route::get('admin', array('as' => 'admin', 'uses' => 'HomeController@index'));

//Roles
Route::get('roles', ['as' => 'users', 'uses' => 'RoleController@index_role', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin']]);
Route::get('create_roles', ['as' => 'users', 'uses' => 'RoleController@get_create_role', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin']]);
Route::post('create_roles', ['as' => 'users', 'uses' => 'RoleController@post_create_role', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin']]);
Route::get('edit_roles/{id}/edit', ['as' => 'users', 'uses' => 'RoleController@get_edit_role', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin']]);
Route::post('edit_roles/{id}/edit', ['as' => 'users', 'uses' => 'RoleController@post_edit_role', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin']]);
Route::get('delete_roles/{id}/delete', ['as' => 'users', 'uses' => 'RoleController@delete_role', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin']]);

//User
Route::get('users', ['as' => 'users', 'uses' => 'UserController@index_user', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin']]);
Route::get('create_users', ['as' => 'users', 'uses' => 'UserController@get_create_user', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin']]);
Route::post('create_users', ['as' => 'users', 'uses' => 'UserController@post_create_user', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin']]);
Route::get('edit_users/{id}/edit', ['as' => 'users', 'uses' => 'UserController@get_edit_user', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin']]);
Route::post('edit_users/{id}/edit', ['as' => 'users', 'uses' => 'UserController@post_edit_user', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin']]);
Route::get('deleted_users/{id}/deleted', ['as' => 'users', 'uses' => 'UserController@deleted_user', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin']]);

//Myprofile
Route::get('myprofile', ['as' => 'myprofile', 'uses' => 'UserController@get_user_profile', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('myprofile', ['as' => 'myprofile', 'uses' => 'UserController@post_user_profile', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Change User
Route::get('user_change/{id}', ['as' => 'user_change/{id}', 'uses' => 'UserController@get_change_user', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('user_change/{id}', ['as' => 'user_change/{id}', 'uses' => 'UserController@post_change_user', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//change password for useer
Route::get('ch_pass_user/{id}', ['as' => 'ch_pass_user/{id}', 'uses' => 'UserController@ch_pass_user_index']);
Route::get('chang_password/{id}', ['as' => 'chang_password/{id}', 'uses' => 'UserController@get_changepassword', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('chang_password/{id}', ['as' => 'chang_password/{id}', 'uses' => 'UserController@post_changepassword', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Advertising
Route::get('adverting', ['as' => 'adverting', 'uses' => 'AvertisingController@index_ads', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('create_ads', ['as' => 'create_ads', 'uses' => 'AvertisingController@get_create_ads', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('create_ads', ['as' => 'create_ads', 'uses' => 'AvertisingController@post_create_ads', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('ads_edit/{id}/edit', ['as' => 'ads_edit/{id}/edit', 'uses' => 'AvertisingController@get_edit_ads', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('ads_edit/{id}/edit', ['as' => 'ads_edit/{id}/edit', 'uses' => 'AvertisingController@post_edit_ads', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('delete/{id}', ['as' => 'delete/{id}', 'uses' => 'AvertisingController@deleted_imaese', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('delete/{id}/ads', ['as' => 'delete/{id}/ads', 'uses' => 'AvertisingController@deleted_ads', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Menu
Route::get('menus', ['as' => 'menus', 'uses' => 'MenuController@index_menu', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('menu_create', ['as' => 'menu_create', 'uses' => 'MenuController@get_create_menu', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('menu_create', ['as' => 'menu_create', 'uses' => 'MenuController@post_create_menu', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('menu_edit/{id}/edit', ['as' => 'menu_edit/{id}/edit', 'uses' => 'MenuController@get_edit_menu', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('menu_edit/{id}/edit', ['as' => 'menu_edit/{id}/edit', 'uses' => 'MenuController@post_edit_menu', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('menu_delete/{id}/delete', ['as' => 'menu_delete/{id}/delete', 'uses' => 'MenuController@get_delete_menu', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Menu type
Route::get('menu_type', ['as' => 'menu_type', 'uses' => 'MenuTypeController@index_menu_type', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('create_menu_type', ['as' => 'create_menu_type', 'uses' => 'MenuTypeController@get_create_menu_type', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('create_menu_type', ['as' => 'create_menu_type', 'uses' => 'MenuTypeController@post_create_menu_type', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('edit_menu_type/{id}/edit', ['as' => 'edit_menu_type/{id}/edit', 'uses' => 'MenuTypeController@get_edit_menu_type', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('edit_menu_type/{id}/edit', ['as' => 'edit_menu_type/{id}/edit', 'uses' => 'MenuTypeController@post_edit_menu_type', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('delete_menu_type/{id}/delete', ['as' => 'delete_menu_type/{id}/delete', 'uses' => 'MenuTypeController@get_deleted_menu_type', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Post
Route::get('posts', ['as' => 'posts', 'uses' => 'PostController@index_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('create_post', ['as' => 'create_post', 'uses' => 'PostController@get_create_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('create_post', ['as' => 'create_post', 'uses' => 'PostController@post_create_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('edit/{id}/post', ['as' => 'edit/{id}/post', 'uses' => 'PostController@get_edit_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('edit/{id}/post', ['as' => 'edit/{id}/post', 'uses' => 'PostController@post_edit_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('delete/{id}/post', ['as' => 'delete/{id}/post', 'uses' => 'PostController@get_delete_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('create_category_of_post', ['as' => 'create_category_of_post', 'uses' => 'PostController@get_create_category_of_post']);
Route::post('create_category_of_post', ['as' => 'create_category_of_post', 'uses' => 'PostController@post_create_category_of_post']);

//Category
Route::get('categorys', ['as' => 'categorys', 'uses' => 'CategoryController@index_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('create_categorys', ['as' => 'create_categorys', 'uses' => 'CategoryController@get_create_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('create_categorys', ['as' => 'create_categorys', 'uses' => 'CategoryController@post_create_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('edit/{id}/category', ['as' => 'edit/{id}/category', 'uses' => 'CategoryController@get_edit_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('edit/{id}/category', ['as' => 'edit/{id}/category', 'uses' => 'CategoryController@post_edit_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('delete/{id}/category', ['as' => 'delete/{id}/category', 'uses' => 'CategoryController@get_delete_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Courses Category
Route::get('coureses_categorys', ['as' => 'coureses_categorys', 'uses' => 'CouresesController@index_coureses_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('create_coureses_categorys', ['as' => 'create_coureses_categorys', 'uses' => 'CouresesController@get_create_coureses_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('create_coureses_categorys', ['as' => 'create_coureses_categorys', 'uses' => 'CouresesController@post_create_coureses_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('edit/{id}/coureses_category', ['as' => 'edit/{id}/coureses_category', 'uses' => 'CouresesController@get_edit_coureses_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('edit/{id}/coureses_category', ['as' => 'edit/{id}/coureses_category', 'uses' => 'CouresesController@post_edit_coureses_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('delete/{id}/coureses_category', ['as' => 'delete/{id}/coureses_category', 'uses' => 'CouresesController@get_delete_coureses_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Course
Route::get('coureses', ['as' => 'coureses', 'uses' => 'CouresesController@index_coureses_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('create_coureses_post', ['as' => 'create_coureses_post', 'uses' => 'CouresesController@get_create_coureses_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('create_coureses_post', ['as' => 'create_coureses_post', 'uses' => 'CouresesController@post_create_coureses_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('edit/{id}/coureses_post', ['as' => 'edit/{id}/coureses_post', 'uses' => 'CouresesController@get_edit_coureses_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('edit/{id}/coureses_post', ['as' => 'edit/{id}/coureses_post', 'uses' => 'CouresesController@post_edit_coureses_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('delete/{id}/coureses_post', ['as' => 'delete/{id}/coureses_post', 'uses' => 'CouresesController@get_delete_coureses_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Career Category
Route::get('category_jobs', ['as' => 'category_jobs', 'uses' => 'CouresesController@index_jobs_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('category_jobs/create', ['as' => 'category_jobs/create', 'uses' => 'CouresesController@get_create_jobs_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('category_jobs/create', ['as' => 'category_jobs/create', 'uses' => 'CouresesController@post_create_jobs_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('category_jobs/{id}/edit', ['as' => 'category_jobs/{id}/edit', 'uses' => 'CouresesController@get_edit_jobs_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('category_jobs/{id}/edit', ['as' => 'category_jobs/{id}/edit', 'uses' => 'CouresesController@post_edit_jobs_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('category_jobs/{id}/deleted', ['as' => 'category_jobs/{id}/deleted', 'uses' => 'CouresesController@get_delete_jobs_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Career Company
Route::get('agencys', ['as' => 'agencys', 'uses' => 'CouresesController@index_company', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('agencys/create', ['as' => 'agencys/create', 'uses' => 'CouresesController@get_create_company', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('agencys/create', ['as' => 'agencys/create', 'uses' => 'CouresesController@post_create_company', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('agencys/{id}/edit', ['as' => 'agencys/{id}/edit', 'uses' => 'CouresesController@get_edit_company', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('agencys/{id}/edit', ['as' => 'agencys/{id}/edit', 'uses' => 'CouresesController@post_edit_company', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('agencys/{id}/deleted', ['as' => 'agencys/{id}/deleted', 'uses' => 'CouresesController@get_delete_company', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Career
Route::get('careers', ['as' => 'careers', 'uses' => 'CouresesController@index_careers_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('careers/create', ['as' => 'careers/create', 'uses' => 'CouresesController@get_create_careers_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('careers/create', ['as' => 'careers/create', 'uses' => 'CouresesController@post_create_careers_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('careers/{id}/edit', ['as' => 'careers/{id}/edit', 'uses' => 'CouresesController@get_edit_careers_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('careers/{id}/edit', ['as' => 'careers/{id}/edit', 'uses' => 'CouresesController@post_edit_careers_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('careers/{id}/deleted', ['as' => 'careers/{id}/deleted', 'uses' => 'CouresesController@get_delete_careers_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Product Category
Route::get('products-category', ['as' => 'products-category', 'uses' => 'ProductController@index_product_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('products-category/create', ['as' => 'products-category/create', 'uses' => 'ProductController@get_create_product_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('products-category/create', ['as' => 'products-category/create', 'uses' => 'ProductController@post_create_product_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('products-category/{id}/edit', ['as' => 'products-category/{id}/edit', 'uses' => 'ProductController@get_edit_product_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('products-category/{id}/edit', ['as' => 'products-category/{id}/edit', 'uses' => 'ProductController@post_edit_product_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('products-category/{id}/deleted', ['as' => 'products-category/{id}/deleted', 'uses' => 'ProductController@get_delete_product_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Brand
Route::get('products-brand', ['as' => 'products-brand', 'uses' => 'ProductController@index_product_brand', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('products-brand/create', ['as' => 'products-brand/create', 'uses' => 'ProductController@get_create_product_brand', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('products-brand/create', ['as' => 'products-brand/create', 'uses' => 'ProductController@post_create_product_brand', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('products-brand/{id}/edit', ['as' => 'products-brand/{id}/edit', 'uses' => 'ProductController@get_edit_product_brand', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('products-brand/{id}/edit', ['as' => 'products-brand/{id}/edit', 'uses' => 'ProductController@post_edit_product_brand', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('products-brand/{id}/deleted', ['as' => 'products-brand/{id}/deleted', 'uses' => 'ProductController@get_delete_product_brand', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Product
Route::get('products-product', ['as' => 'products-product', 'uses' => 'ProductController@index_product', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('products-product/create', ['as' => 'products-product/create', 'uses' => 'ProductController@get_create_product', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('products-product/create', ['as' => 'products-product/create', 'uses' => 'ProductController@post_create_productt', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('products-product/{id}/edit', ['as' => 'products-product/{id}/edit', 'uses' => 'ProductController@get_edit_product', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('products-product/{id}/edit', ['as' => 'products-product/{id}/edit', 'uses' => 'ProductController@post_edit_product', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('products-product/{id}/deleted', ['as' => 'products-product/{id}/deleted', 'uses' => 'ProductController@get_delete_product', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Branch
Route::get('branch', ['as' => 'branch', 'uses' => 'BranchController@index_branch', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('branch/create', ['as' => 'branch/create', 'uses' => 'BranchController@get_create_branch', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('branch/create', ['as' => 'branch/create', 'uses' => 'BranchController@post_create_branch', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('branch/{id}/edit', ['as' => 'branch/{id}/edit', 'uses' => 'BranchController@get_edit_branch', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('branch/{id}/edit', ['as' => 'branch/{id}/edit', 'uses' => 'BranchController@post_edit_branch', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('branch/{id}/deleted', ['as' => 'branch/{id}/deleted', 'uses' => 'BranchController@get_delete_branch', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Event
Route::get('category_news_events', ['as' => 'category_news_events', 'uses' => 'NEventController@index_new_event_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('category_news_events/create', ['as' => 'category_news_events/create', 'uses' => 'NEventController@get_create_new_event_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('category_news_events/create', ['as' => 'category_news_events/create', 'uses' => 'NEventController@post_create_new_event_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('category_news_events/{id}/edit', ['as' => 'category_news_events/{id}/edit', 'uses' => 'NEventController@get_edit_new_event_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('category_news_events/{id}/edit', ['as' => 'category_news_events/{id}/edit', 'uses' => 'NEventController@post_edit_new_event_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('category_news_events/{id}/deleted', ['as' => 'category_news_events/{id}/deleted', 'uses' => 'NEventController@get_delete_new_event_category', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Category News Event
Route::get('news_events', ['as' => 'news_events', 'uses' => 'NEventController@index_news_event_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('news_events/create', ['as' => 'news_events/create', 'uses' => 'NEventController@get_create_news_event_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('news_events/create', ['as' => 'news_events/create', 'uses' => 'NEventController@post_create_news_event_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('news_events/{id}/edit', ['as' => 'news_events/{id}/edit', 'uses' => 'NEventController@get_edit_news_event_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('news_events/{id}/edit', ['as' => 'news_events/{id}/edit', 'uses' => 'NEventController@post_edit_news_event_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('news_events/{id}/deleted', ['as' => 'news_events/{id}/deleted', 'uses' => 'NEventController@get_delete_news_event_post', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('multiple_delete_new_event', ['as' => 'multiple_delete_new_event', 'uses' => 'NEventController@multiple_delete_new_event', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Billborad
Route::get('billborad', ['as' => 'billborad', 'uses' => 'BillboradController@index_billborad', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('create_billborad', ['as' => 'create_billborad', 'uses' => 'BillboradController@get_create_billborad', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('create_billborad', ['as' => 'create_billborad', 'uses' => 'BillboradController@post_create_billborad', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('edit/{id}/billborad', ['as' => 'edit/{id}/billborad', 'uses' => 'BillboradController@get_edit_billborad', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('edit/{id}/billborad', ['as' => 'edit/{id}/billborad', 'uses' => 'BillboradController@post_edit_billborad', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('delete/{id}/billborad', ['as' => 'delete/{id}/billborad', 'uses' => 'BillboradController@get_delete_billborad', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Post Billborad
Route::get('post_billborad', ['as' => 'post_billborad', 'uses' => 'BillboradController@index_post_billborad', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('create_post_billborad', ['as' => 'create_post_billborad', 'uses' => 'BillboradController@get_create_post_billborad', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('create_post_billborad', ['as' => 'create_post_billborad', 'uses' => 'BillboradController@post_create_post_billborad', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('edit/{id}/post_billborad', ['as' => 'edit/{id}/post_billborad', 'uses' => 'BillboradController@get_edit_post_billborad', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('edit/{id}/post_billborad', ['as' => 'edit/{id}/post_billborad', 'uses' => 'BillboradController@post_edit_post_billborad', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('delete/{id}/post_billborad', ['as' => 'delete/{id}/post_billborad', 'uses' => 'BillboradController@get_delete_post_billborad', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Page
Route::get('pages', ['as' => 'pages', 'uses' => 'PageController@index_page', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('create_page', ['as' => 'create_page', 'uses' => 'PageController@get_create_page', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('create_page', ['as' => 'create_page', 'uses' => 'PageController@post_create_page', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('page_edit/{id}/edit', ['as' => 'page_edit/{id}/edit', 'uses' => 'PageController@get_edit_page', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('page_edit/{id}/edit', ['as' => 'page_edit/{id}/edit', 'uses' => 'PageController@post_edit_page', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('page_delete/{id}/delete', ['as' => 'page_delete/{id}/delete', 'uses' => 'PageController@get_delete_page', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Slide
Route::get('slides', ['as' => 'slides', 'uses' => 'SlideController@index_slide', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('create_slide', ['as' => 'create_slide', 'uses' => 'SlideController@get_create_slide', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('create_slide', ['as' => 'create_slide', 'uses' => 'SlideController@post_create_slide', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('slide/{id}/edit', ['as' => 'slide/{id}/edit', 'uses' => 'SlideController@get_edit_slide', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('slide/{id}/edit', ['as' => 'slide/{id}/edit', 'uses' => 'SlideController@post_edit_slide', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('delete/{id}', ['as' => 'delete/{id}', 'uses' => 'SlideController@deleted_images', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Slide Type
Route::get('slide_types', ['as' => 'slide_types', 'uses' => 'SlideTypeController@index_slide_type', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('create_slide_type', ['as' => 'create_slide_type', 'uses' => 'SlideTypeController@get_create_slide_type', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('create_slide_type', ['as' => 'create_slide_type', 'uses' => 'SlideTypeController@post_create_slide_type', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('slide_type/{id}/edit', ['as' => 'slide_type/{id}/edit', 'uses' => 'SlideTypeController@get_edit_slide_type', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('slide_type/{id}/edit', ['as' => 'slide_type/{id}/edit', 'uses' => 'SlideTypeController@post_edit_slide_type', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('slide_type/{id}/delete', ['as' => 'slide_type/{id}/delete', 'uses' => 'SlideTypeController@get_deleted_slide_type', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('slide/{id}/delete', ['as' => 'slide/{id}/delete', 'uses' => 'SlideController@get_delete_slide', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Setting
Route::get('setting', ['as' => 'setting', 'uses' => 'SettingController@index_setting', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('create_setting', ['as' => 'create_setting', 'uses' => 'SettingController@get_create_setting', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('create_setting', ['as' => 'create_setting', 'uses' => 'SettingController@post_create_setting', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('setting/{id}/edit', ['as' => 'setting/{id}/edit', 'uses' => 'SettingController@get_edit_setting', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('setting/{id}/edit', ['as' => 'setting/{id}/edit', 'uses' => 'SettingController@post_edit_setting', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('setting/{id}/delete', ['as' => 'setting/{id}/delete', 'uses' => 'SettingController@get_deleted_slide_type', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Social
Route::get('social', ['as' => 'social', 'uses' => 'SocialController@index_social', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('create_social', ['as' => 'create_social', 'uses' => 'SocialController@get_create_social', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('create_social', ['as' => 'create_social', 'uses' => 'SocialController@post_create_social', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('social/{id}/edit', ['as' => 'social/{id}/edit', 'uses' => 'SocialController@get_edit_social', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('social/{id}/edit', ['as' => 'social/{id}/edit', 'uses' => 'SocialController@post_edit_social', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('social/{id}/delete', ['as' => 'social/{id}/delete', 'uses' => 'SocialController@get_delete_social', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
// Widget
Route::get('widgets', ['as' => 'widgets', 'uses' => 'SettingController@widget_jndex']);
Route::post('widgets', ['as' => 'widgets', 'uses' => 'SettingController@post_widget_index']);
Route::get('widgets/json', ['as' => 'widgets/json', 'uses' => 'SettingController@widget_json']);

//Gallery
Route::get('gallery', ['as' => 'gallery', 'uses' => 'GalleryController@index_gallery', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('create_galleries', ['as' => 'create_galleries', 'uses' => 'GalleryController@get_create_gallery', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('create_galleries', ['as' => 'create_galleries', 'uses' => 'GalleryController@post_create_gallery', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('galleries/{id}/edit', ['as' => 'galleries/{id}/edit', 'uses' => 'GalleryController@get_edit_gallery', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('galleries/{id}/edit', ['as' => 'galleries/{id}/edit', 'uses' => 'GalleryController@post_edit_gallery', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('delete/{id}', ['as' => 'delete/{id}', 'uses' => 'GalleryController@deleted_images', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('galleries/{id}/delete', ['as' => 'galleries/{id}/delete', 'uses' => 'GalleryController@get_delete_gallery', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Category Gallery
Route::get('cat_galleries', ['as' => 'cat_galleries', 'uses' => 'Cat_GalleryController@index_cat_gallery', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('create_cat_galleries', ['as' => 'create_cat_galleries', 'uses' => 'Cat_GalleryController@get_create_cat_gallery', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('create_cat_galleries', ['as' => 'create_cat_galleries', 'uses' => 'Cat_GalleryController@post_create_cat_gallery', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('cat_gallery/{id}/edit', ['as' => 'cat_gallery/{id}/edit', 'uses' => 'Cat_GalleryController@get_edit_cat_gallery', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('cat_gallery/{id}/edit', ['as' => 'cat_gallery/{id}/edit', 'uses' => 'Cat_GalleryController@post_edit_cat_gallery', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('cat_gallery/{id}/delete', ['as' => 'cat_gallery/{id}/delete', 'uses' => 'Cat_GalleryController@get_deleted_cat_gallery', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

//Footer
Route::get('footer', ['as' => 'footer', 'uses' => 'FooterController@index', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('create_footer', ['as' => 'create_footer', 'uses' => 'FooterController@get_create_footer', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('create_footer', ['as' => 'create_footer', 'uses' => 'FooterController@post_create_footer', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('edit/{id}/footer', ['as' => 'edit/{id}/footer', 'uses' => 'FooterController@get_edit_footer', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::post('edit/{id}/footer', ['as' => 'edit/{id}/footer', 'uses' => 'FooterController@post_edit_footer', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);
Route::get('deleted/{id}/footer', ['as' => 'deleted/{id}/footer', 'uses' => 'FooterController@get_edit_footer', 'middleware' => 'roles', 'roles' => ['Administrator', 'Admin', 'User']]);

// Language
Route::get('language', ['as' => 'language', 'uses' => 'LanguageController@get_index_lang']);
Route::get('lang/create', ['as' => 'lang/create', 'uses' => 'LanguageController@get_create_lang']);
Route::post('lang/create', ['as' => 'lang/create', 'uses' => 'LanguageController@post_create_lang']);
Route::get('lang/{id}/edit', ['as' => 'lang/{id}/edit', 'uses' => 'LanguageController@get_edit_lang']);
Route::post('lang/{id}/edit', ['as' => 'lang/{id}/edit', 'uses' => 'LanguageController@post_edit_lang']);
Route::get('deleted/{id}/language', ['as' => 'deleted/{id}/language', 'uses' => 'LanguageController@del_lang']);

//Search Product
Route::get('product/search_product_get', ['as' => 'product/search_product_get', 'uses' => 'FrontendController@search_product_get']);
//Login
Route::get('login', [LoginController::class, 'get_login']);
Route::post('login', [LoginController::class, 'post_login']);
Route::get('logout', [LoginController::class, 'dologout']);

// Handle Request dynamic link
Route::get('{name}', ['as' => '{name}', 'uses' => 'FrontendController@home_index_link']);

// handle multi language
// Route::get('{local}/{name}', ['as' => '{local}/{name}', 'uses' => 'FrontendController@home_index_link_local']);