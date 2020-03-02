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


Route::get('/aaa','Admin\GoodsController@create');
Route::post('aaa/store','Admin\GoodsController@store');
Route::get('aaa/index','Admin\GoodsController@index');
Route::get('aaa/edit{id}','Admin\GoodsController@edit');
Route::post('aaa/update{id}','Admin\GoodsController@update');
Route::get('aaa/destroy{id}','Admin\GoodsController@destroy');


// Route::get('/', function () {
// 	//echo 123;
// 	$name = '1908 欢迎您';
//     return view('welcome',['name'=>$name]);
// });
// 1：实现两种方式访问http://www.1908.com/show 输出“这里是商品详情页”字样




// Route::get('/show', function () {
// 	echo "这里是商品详情页";
// });

// // 2：访问http://www.1908.com/show/1 输出“商品Id是：1”字样
// Route::get('/show/{id}', function ($id) {
// 	echo "商品id是".$id;
// });

// // 3：访问http://www.1908.com/show/23/裤子 输出“商品Id是：23，关键字是：裤子”字样
// Route::get('/show/{id}/{name}', function ($id ,$name) {
// 	echo "商品id是".$id;
// 	echo "关键字是".$name;
// });

// // 4:实现两种方式访问http://www.1908.com/brand/add显示添加界面
// Route::get('/brand/add', 'userController@index');
// Route::view('/brand/adds', 'brand/add');

// // 5：实现访问http://www.1908.com/category/add显示添加分类界面，并带过去参数 变量 fid=“服装”;
// Route::get('category/add', function () {
// 	$fid="服装";
// 	return view("brand.adds",['fid'=>$fid]);
// });


// Route::get('/user', 'userController@index');
// Route::get('/adduser', 'userController@addg');
// Route::post('/adddo', 'userController@adddo');
// //正则约束
// Route::get('/goods/{id}', function ($goods_id) {
// 	echo "商品id：";
// 	echo $goods_id;
// })->where('id','\d+');

// Route::get('/goods/{id}/{name}', function ($goods_id,$name) {
// 	echo "商品id：";
// 	echo $goods_id;
// 	echo "商品名称:";
// 	echo $name;
// })->where(['id'=>'\d+','name'=>'\w+']);

// //外来务工人员统计l
// Route::prefix('people')->middleware('CheckLogin')->group(function(){
// 	Route::get('create', 'PeopleController@create');
// 	Route::post('store', 'PeopleController@store');
// 	Route::get('/', 'PeopleController@index');
// 	Route::get('edit/{id}', 'PeopleController@edit');
// 	Route::post('update/{id}', 'PeopleController@update');
// 	Route::get('destroy/{id}', 'PeopleController@destroy');
// });
// //学生表  测试
// Route::get('student/index', 'StudentController@index');
// Route::post('student/add', 'StudentController@add');
// Route::get('student/list', 'StudentController@list');
// Route::get('/student/update/{id}', 'StudentController@update');
// Route::post('/student/upddo/{id}', 'StudentController@upddo');
// Route::get('/student/delete/{id}', 'StudentController@delete');

// //商品品牌
// Route::get('shangpin/index', 'ShangpinController@index');
// Route::post('shangpin/add', 'ShangpinController@add');
// Route::get('shangpin/list', 'ShangpinController@list');
// Route::get('/shangpin/update/{id}', 'ShangpinController@update');
// Route::post('/shangpin/upddo/{id}', 'ShangpinController@upddo');
// Route::get('/shangpin/delete/{id}', 'ShangpinController@delete');

// // //登录
// // Route::view('/login', 'login');
// // //执行登录
// // Route::post('/logindo', 'LoginController@logindo');

// //文章 周考
// //Route::prefix('wenzhang')->middleware('CheckLogin')->group(function(){
// 	Route::get('wenzhang/index', 'WenzhangController@index');
// 	Route::post('wenzhang/checkOnly', 'WenzhangController@checkOnly');
// 	Route::post('wenzhang/adddo', 'WenzhangController@adddo');
// 	Route::get('wenzhang/list', 'WenzhangController@list');
// 	Route::get('/wenzhang/upd/{id}', 'WenzhangController@upd');
// 	Route::post('/wenzhang/upddo/{id}', 'WenzhangController@upddo');
// 	Route::get('/wenzhang/destroy/{id}', 'WenzhangController@destroy');
// //});
// //
// Route::get('goods/index', 'GoodsController@index');
// Route::post('goods/add', 'GoodsController@add');
// Route::get('goods/list', 'GoodsController@list');
// Route::get('/goods/update/{id}', 'GoodsController@update');
// Route::post('/goods/upddo/{id}', 'GoodsController@upddo');
// Route::get('/goods/delete/{id}', 'GoodsController@delete');
// Route::post('/goods/checkOnly/{id}', 'GoodsController@checkOnly');


// Route::get('goodss/index', 'GoodssController@index');
// Route::post('goodss/add', 'GoodssController@add');
// Route::get('goodss/list', 'GoodssController@list');
// Route::post('/goodss/destroy/{id}', 'GoodssController@destroy');
// Route::get('/goodss/edit/{id}', 'GoodssController@edit');
// Route::post('/goodss/upd/{id}', 'GoodssController@upd');

// Route::get('login/login', 'LoginController@login');
// Route::post('login/logindo', 'LoginController@logindo');
// Route::get('login/list', 'LoginController@list');
// Route::post('/login/destroy/{id}', 'LoginController@destroy');
// Route::get('/login/edit/{id}', 'LoginController@edit');
// Route::post('/login/upd/{id}', 'LoginController@upd');


// //前台
// Route::get('/','Index\IndexController@index');
// Route::get('/login','Index\IndexController@login');
// Route::post('/logindo','Index\IndexController@logindo');
// Route::get('/prolist','Index\IndexController@prolist');
// Route::get('/proinfo/{id}','Index\IndexController@proinfo');
// Route::get('/car','Index\IndexController@car');

// Route::get('/sendsms','Index\LoginController@sendSms');
// //发送短信
// Route::get('/reg','Index\LoginController@reg');
// Route::get('/ajaxsend','Index\LoginController@ajaxsend');
// Route::post('/regdo','Index\LoginController@regdo');
// //设置cookie
// Route::get('/setcookie','Index\IndexController@setCookie');
// //周测
// Route::get('gly/login', 'GlyController@login');
// Route::post('gly/logindo', 'GlyController@logindo');
// Route::get('gly/list', 'GlyController@list');
// Route::get('/gly/edit/{id}', 'GlyController@edit');
// Route::post('/gly/upd/{id}', 'GlyController@upd');
// Route::post('/gly/destroy/{id}', 'GlyController@destroy');

//品牌
Route::get('admin/create', 'Admin\BrandController@create');
Route::post('admin/adddo', 'Admin\BrandController@adddo');
Route::get('admin/', 'Admin\BrandController@index');
Route::get('/admin/edit/{id}', 'Admin\BrandController@edit');
Route::post('/admin/upd/{id}', 'Admin\BrandController@upd');
Route::post('/admin/destroy/{id}', 'Admin\BrandController@destroy');
// 管理员
 Route::get('goods_admin/create','Admin\AdminController@create');

Route::post('goods_admin/store','Admin\AdminController@store');

Route::get('goods_admin','Admin\AdminController@index');

Route::get('goods_admin/edit/{id}','Admin\AdminController@edit');

Route::post('goods_admin/update/{id}','Admin\AdminController@update');

Route::get('goods_admin/destroy/{id}','Admin\AdminController@destroy');
