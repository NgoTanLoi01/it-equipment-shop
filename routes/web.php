<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAccountController;
use App\Http\Controllers\LoginGoogleFaceBookController;
use Illuminate\Support\Facades\Route;



//man hinh admin
Route::get('/admin', [AdminController::class, 'loginAdmin'])->name('loginAdmin');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin']);
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'postRegister']);
Route::get('/homeAdmin', [HomeController::class, 'indexAdmin'])->name('homeAdmin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//man hinh user
Route::get('/', [HomeAdminController::class, 'index'])->name('home');
Route::get('/category/{slug}/{id}', [
    'as' => 'category.product',
    'uses' => 'App\Http\Controllers\CategoryAdminController@index'
]);

//tim kiem san pham
Route::post('/tim_kiem', [HomeAdminController::class, 'search'])->name('tim_kiem.search');
Route::get('/tim_kiem/suggestions', [HomeAdminController::class, 'suggestions'])->name('tim_kiem.suggestions');


//chi tiet & review san pham
Route::get('/detail/{slug}', [HomeAdminController::class, 'detail'])->name('detail');
Route::post('/detail/{slug}/review', [HomeAdminController::class, 'storeReview'])->name('detail.storeReview');


//man hinh user page
Route::get('/blog', [HomeAdminController::class, 'blog']);
Route::get('/about', [HomeAdminController::class, 'about']);
Route::get('/lien_he', [HomeAdminController::class, 'lien_he']);
Route::get('/yeu_thich', [HomeAdminController::class, 'yeu_thich']);
Route::get('/product_all', [HomeAdminController::class, 'product_all'])->name('product_all');

//so sanh san pham
Route::get('/compare', [HomeAdminController::class, 'compare'])->name('compare');
Route::get('/get-products-same-category/{categoryId}', [HomeAdminController::class, 'getProductsSameCategory']);

//login
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);

//login with google
Route::get('auth/google', [LoginGoogleFaceBookController::class, 'redirectToGoogle'])->name('login-by-google');
Route::get('auth/google/callback', [LoginGoogleFaceBookController::class, 'handleGoogleCallback']);

//gio hang
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::get('/show-cart', [CartController::class, 'show_cart'])->name('home.showcart');
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);
Route::get('/update-cart-quantity', [CartController::class, 'update_cart_quantity']);

//thanh toan
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::post('/order-place', [CheckoutController::class, 'order_place']);
Route::post('/login-customer', [CheckoutController::class, 'login_customer']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer']);

//xu ly don hang
Route::get('/manage-order', [CheckoutController::class, 'manage_order']);
Route::get('/view-order/{orderId}', [CheckoutController::class, 'view_order']);
Route::get('/delete-order/{orderId}', [CheckoutController::class, 'delete_order']);
Route::get('/print-order/{orderId}', [CheckoutController::class, 'print_order']);
Route::post('/update-order-status/{id}', [CheckoutController::class, 'updateOrderStatus']);
Route::get('/ordered-info/{order_id}', [CheckoutController::class, 'ordered_info'])->name('ordered.info');

//quan ly tai khoan nguoi dung
Route::get('/customer-account', [CustomerAccountController::class, 'customer_account'])->name('customer_account');
Route::get('/orders/cancel/{order_id}', [CustomerAccountController::class, 'cancelOrder'])->name('orders.cancel');

//gui mail
Route::get('send-mail/{orderId}', [CheckoutController::class, 'send_mail']);
Route::get('/send-sms/{order_id}', [CheckoutController::class, 'send_sms']);

//cong thanh toan
Route::post('/vnpay_payment', [CheckoutController::class, 'vnpay_payment']);
Route::get('/vnpay_return', [CheckoutController::class, 'vnpay_return']);
Route::post('/momo_payment', [CheckoutController::class, 'momo_payment']);



//xu ly admin
Route::prefix('admin')->group(function () {
    //Home
    Route::prefix('home')->group(function () {
        Route::get('/', [
            'as' => 'home.index',
            'uses' => 'App\Http\Controllers\AdminController@index',
        ]);
    });
    //categories
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'App\Http\Controllers\CategoryController@index',
            'middleware' => 'can:category-list'
        ]);
        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'App\Http\Controllers\CategoryController@create',
            'middleware' => 'can:category-add'
        ]);
        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'App\Http\Controllers\CategoryController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'App\Http\Controllers\CategoryController@edit',
            'middleware' => 'can:category-edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'App\Http\Controllers\CategoryController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'App\Http\Controllers\CategoryController@delete',
            'middleware' => 'can:category-delete'
        ]);
    });
    //menus
    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as' => 'menus.index',
            'uses' => 'App\Http\Controllers\MenusController@index',
            'middleware' => 'can:menu-list'
        ]);
        Route::get('/create', [
            'as' => 'menus.create',
            'uses' => 'App\Http\Controllers\MenusController@create',
            'middleware' => 'can:menu-add'
        ]);
        Route::post('/store', [
            'as' => 'menus.store',
            'uses' => 'App\Http\Controllers\MenusController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses' => 'App\Http\Controllers\MenusController@edit',
            'middleware' => 'can:menu-edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses' => 'App\Http\Controllers\MenusController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses' => 'App\Http\Controllers\MenusController@delete',
            'middleware' => 'can:menu-delete'
        ]);
    });
    //product
    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'App\Http\Controllers\AdminProductController@index',
            'middleware' => 'can:product-list'
        ]);
        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'App\Http\Controllers\AdminProductController@create',
            'middleware' => 'can:product-add'
        ]);
        Route::post('/store', [
            'as' => 'product.store',
            'uses' => 'App\Http\Controllers\AdminProductController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'App\Http\Controllers\AdminProductController@edit',
            'middleware' => 'can:product-edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'product.update',
            'uses' => 'App\Http\Controllers\AdminProductController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'App\Http\Controllers\AdminProductController@delete',
            'middleware' => 'can:product-delete'
        ]);
    });
    //slider
    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'App\Http\Controllers\SliderAdminController@index',
            'middleware' => 'can:slider-list'
        ]);
        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'App\Http\Controllers\SliderAdminController@create',
            'middleware' => 'can:slider-add'
        ]);
        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'App\Http\Controllers\SliderAdminController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'App\Http\Controllers\SliderAdminController@edit',
            'middleware' => 'can:slider-edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'App\Http\Controllers\SliderAdminController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'App\Http\Controllers\SliderAdminController@delete',
            'middleware' => 'can:slider-delete'
        ]);
    });
    //setting
    Route::prefix('settings')->group(function () {
        Route::get('/', [
            'as' => 'settings.index',
            'uses' => 'App\Http\Controllers\AdminSettingController@index',
            'middleware' => 'can:setting-list'
        ]);
        Route::get('/create', [
            'as' => 'settings.create',
            'uses' => 'App\Http\Controllers\AdminSettingController@create',
            'middleware' => 'can:slider-add'
        ]);
        Route::post('/store', [
            'as' => 'settings.store',
            'uses' => 'App\Http\Controllers\AdminSettingController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'settings.edit',
            'uses' => 'App\Http\Controllers\AdminSettingController@edit',
            'middleware' => 'can:slider-edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'settings.update',
            'uses' => 'App\Http\Controllers\AdminSettingController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'settings.delete',
            'uses' => 'App\Http\Controllers\AdminSettingController@delete',
            'middleware' => 'can:slider-delete'
        ]);
    });
    //user
    Route::prefix('users')->group(function () {
        Route::get('/', [
            'as' => 'users.index',
            'uses' => 'App\Http\Controllers\AdminUserController@index',
            'middleware' => 'can:role-list'
        ]);
        Route::get('/create', [
            'as' => 'users.create',
            'uses' => 'App\Http\Controllers\AdminUserController@create',
            'middleware' => 'can:user-add'
        ]);
        Route::post('/store', [
            'as' => 'users.store',
            'uses' => 'App\Http\Controllers\AdminUserController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'users.edit',
            'uses' => 'App\Http\Controllers\AdminUserController@edit',
            'middleware' => 'can:user-edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'users.update',
            'uses' => 'App\Http\Controllers\AdminUserController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'users.delete',
            'uses' => 'App\Http\Controllers\AdminUserController@delete',
            'middleware' => 'can:user-delete'
        ]);
    });
    //customer
    Route::prefix('customers')->group(function () {
        Route::get('/', [
            'as' => 'customers.index',
            'uses' => 'App\Http\Controllers\CustomerController@index'
        ]);
        Route::get('/view/{id}', [ // Sửa URI cho route customers.view
            'as' => 'customers.view',
            'uses' => 'App\Http\Controllers\CustomerController@view',
        ]);
    });
    //role
    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as' => 'roles.index',
            'uses' => 'App\Http\Controllers\AdminRoleController@index',
            'middleware' => 'can:role-list'
        ]);
        Route::get('/create', [
            'as' => 'roles.create',
            'uses' => 'App\Http\Controllers\AdminRoleController@create',
            'middleware' => 'can:role-add'
        ]);
        Route::post('/store', [
            'as' => 'roles.store',
            'uses' => 'App\Http\Controllers\AdminRoleController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'roles.edit',
            'uses' => 'App\Http\Controllers\AdminRoleController@edit',
            'middleware' => 'can:role-edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'roles.update',
            'uses' => 'App\Http\Controllers\AdminRoleController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'roles.delete',
            'uses' => 'App\Http\Controllers\AdminRoleController@delete',
            'middleware' => 'can:role-delete'
        ]);
    });
    //permissions
    Route::prefix('permissions')->group(function () {
        Route::get('/create', [
            'as' => 'permissions.create',
            'uses' => 'App\Http\Controllers\AdminPermissionController@createPermissions'
        ]);
        Route::post('/store', [
            'as' => 'permissions.store',
            'uses' => 'App\Http\Controllers\AdminPermissionController@store'
        ]);
    });
});
