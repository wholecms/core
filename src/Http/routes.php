<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 5.8.2015
 * Time: 15:23
 */



/*
 * FrontEnd Routes
 * */
Route::get('/',['as'=>'master_page','uses'=>'\Whole\Core\Http\Controllers\IndexController@index']);
Route::get('/{slug}-{id}',['as'=>'content_page','uses'=>'\Whole\Core\Http\Controllers\IndexController@contentPages']);




/*
 * BackEnd Routes
 * */

Route::get('/admin/login',['middleware'=>'is_login','as'=>'admin.login','uses'=>'\Whole\Core\Http\Controllers\Admin\AuthController@login']);
Route::post('admin/login',['as'=>'admin.login.action','uses'=>'\Whole\Core\Http\Controllers\Admin\AuthController@loginAction']);

Route::group(['middleware'=>['is_admin','permitted_page'],'prefix' => 'admin'],function(){
    Route::get('/', ['as' => 'admin.index', 'uses' => '\Whole\Core\Http\Controllers\Admin\IndexController@index']);
    Route::get('/logout',['as'=>'admin.logout','uses'=>'\Whole\Core\Http\Controllers\Admin\AuthController@logout']);
    Route::resource('user','\Whole\Core\Http\Controllers\Admin\UsersController');
    Route::resource('role','\Whole\Core\Http\Controllers\Admin\RolesController');
    Route::resource('template','\Whole\Core\Http\Controllers\Admin\TemplatesController',['except'=>['update','edit','show']]);


    Route::resource('master-page','\Whole\Core\Http\Controllers\Admin\MasterPagesController',
        ['names'=>
            [
                'index'     => 'admin.master_page.index',
                'create'    => 'admin.master_page.create',
                'store'     => 'admin.master_page.store',
                'show'      => 'admin.master_page.show',
                'edit'      => 'admin.master_page.edit',
                'update'    => 'admin.master_page.update',
                'destroy'   => 'admin.master_page.destroy',
            ]]);
    Route::post('/master-page/select-template',['as'=>'admin.master_page.select_template','uses'=>'\Whole\Core\Http\Controllers\Admin\MasterPagesController@selectTemplate']);


    Route::resource('content-page','\Whole\Core\Http\Controllers\Admin\ContentPagesController',
        ['names'=>
            [
                'index'     => 'admin.content_page.index',
                'create'    => 'admin.content_page.create',
                'store'     => 'admin.content_page.store',
                'show'      => 'admin.content_page.show',
                'edit'      => 'admin.content_page.edit',
                'update'    => 'admin.content_page.update',
                'destroy'   => 'admin.content_page.destroy',
            ]]);

    Route::post('/content-page/select-template',['as'=>'admin.content_page.select_template','uses'=>'\Whole\Core\Http\Controllers\Admin\ContentPagesController@selectTemplate']);


    Route::resource('block','\Whole\Core\Http\Controllers\Admin\BlocksController');
    Route::post('/block/ajax/update',['as'=>'admin.block.ajax_update','uses'=>'\Whole\Core\Http\Controllers\Admin\BlocksController@ajaxUpdate']);
    Route::post('/block/attribute/create/{id}',['as'=>'admin.block.attribute_create','uses'=>'\Whole\Core\Http\Controllers\Admin\BlocksController@attributeCreate']);

    Route::resource('content','\Whole\Core\Http\Controllers\Admin\ContentsController');
    Route::post('/content/ajax/update',['as'=>'admin.content.ajax_update','uses'=>'\Whole\Core\Http\Controllers\Admin\ContentsController@ajaxUpdate']);
    Route::resource('component','\Whole\Core\Http\Controllers\Admin\ComponentsController');

    Route::resource('page','\Whole\Core\Http\Controllers\Admin\PagesController');
    Route::post('/page/ajax/update',['as'=>'admin.page.ajax_update','uses'=>'\Whole\Core\Http\Controllers\Admin\PagesController@ajaxUpdate']);

    Route::resource('setting','\Whole\Core\Http\Controllers\Admin\SettingsController',['only'=>['index','update']]);

    Route::resource('permitted-page','\Whole\Core\Http\Controllers\Admin\PermittedPagesController',
        ['names'=>
            [
                'index'     => 'admin.permitted_page.index',
                'store'     => 'admin.permitted_page.store',
            ],
            'only'=>['index','store']
        ]);

    Route::get('logs/login',['as'=>'admin.logs.login','uses'=>'\Whole\Core\Http\Controllers\Admin\LogsController@login']);
    Route::get('logs/errors',['as'=>'admin.logs.errors','uses'=>'\Whole\Core\Http\Controllers\Admin\LogsController@errors']);
    Route::get('logs/process',['as'=>'admin.logs.process','uses'=>'\Whole\Core\Http\Controllers\Admin\LogsController@process']);
    Route::delete('logs/clea',['as'=>'admin.logs.clear','uses'=>'\Whole\Core\Http\Controllers\Admin\LogsController@clear']);
	Route::get('cache/clear',['as'=>'admin.cache.clear','uses'=>'\Whole\Core\Http\Controllers\Admin\ToolsController@clearCache']);
    Route::get('analytics',['as'=>'admin.analytics.index','uses'=>'\Whole\Core\Http\Controllers\Admin\AnalyticsController@index']);
    Route::post('analytics/active-user',['as'=>'admin.analytics.active_user','uses'=>'\Whole\Core\Http\Controllers\Admin\AnalyticsController@getActiveUser']);

});

