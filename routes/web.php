<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\Front\FrontLoginController;

use App\Http\Controllers\Front\FrontLandingController;
use App\Http\Controllers\Front\FrontNewsController;
use App\Http\Controllers\Front\FrontNewsCategoryController;
use App\Http\Controllers\Front\FrontProductController;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;

use App\Http\Controllers\Coupon\CouponController;

use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Member\MemberOrderController;
use App\Http\Controllers\Member\MemberPointController;

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\ProductCategoryController;
use App\Http\Controllers\Product\ProductKindController;
use App\Http\Controllers\Product\ProductVariantController;
use App\Http\Controllers\Product\ProductCollectionController;


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WebsetupController;
use App\Http\Controllers\Member\MemberBoardController;

use App\Http\Controllers\Member\MemberAddressBoardController;


use App\Http\Controllers\Order\OrderController;

use App\Http\Controllers\Discount\DiscountClusterController;
use App\Http\Controllers\Discount\DiscountController;
use App\Http\Controllers\Discount\DiscountProductController;

use App\Http\Controllers\Merchandise\MerchandiseProductController;
use App\Http\Controllers\Freegift\FreegiftController;
use App\Http\Controllers\Flashsale\FlashsaleController;

use App\Http\Controllers\Product\ProductImageController;
use App\Http\Controllers\FileController;

use App\Http\Controllers\Product\ProductTypeController;
use App\Http\Controllers\Product\ProductFormController;
use App\Http\Controllers\Product\ProductPackageController;

// use App\Http\Controllers\Admin\DiscountController;

use App\Http\Controllers\Blog\BlogArticleCategoryController;
use App\Http\Controllers\Blog\BlogArticleController;

use App\Http\Controllers\News\NewsCategoryController;
use App\Http\Controllers\News\NewsController;

use App\Http\Controllers\FpdfController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\SyncProductController;
use App\Http\Controllers\CommonLoaderController;

use App\Http\Controllers\CrudBuilderController;


use App\Http\Controllers\StripeController;
use App\Http\Controllers\Vend\VendController;



// General
use App\Http\Controllers\GeneralController;




Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/crudbuilder', [CrudBuilderController::class, 'index']);

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


Auth::routes();



Route::get('file', [FileController::class, 'create']);
Route::post('file', [FileController::class, 'store']);

//Route::get('/', [App\Http\Controllers\HomeController::class, 'root']);
Route::get('/index', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/admin_nambak', [FrontLandingController::class, 'admin_nambak'])->name('admin_nambak');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('admin/dashboard', DashboardController::class);
    Route::resource('admin/websetup', WebsetupController::class);
    Route::resource('member/board', MemberBoardController::class);
    Route::resource('fpdf', FpdfController::class);
    Route::resource('sync-product', SyncProductController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);


    Route::resource('permissions', PermissionController::class);
    Route::resource('admin/products', ProductController::class);
    Route::resource('admin/product-kinds', ProductKindController::class);
    Route::resource('admin/product-variants', ProductVariantController::class);
    Route::resource('admin/product-categorys', ProductCategoryController::class);

    Route::resource('admin/product-images', ProductImageController::class);

    Route::resource('admin/product-collections', ProductCollectionController::class);
    Route::resource('admin/product-types', ProductTypeController::class);
    Route::resource('admin/product-forms', ProductFormController::class);
    Route::resource('admin/product-packages', ProductPackageController::class);

    // route general
    Route::resource('admin/generals', GeneralController::class);
    Route::get('admin/generals/destroy/{id}', 'App\Http\Controllers\GeneralController@destroy');
    Route::get('general/atribut', [App\Http\Controllers\GeneralController::class, 'atribut'])->name('general.atribut');
        // Route::get('/atribut', ['uses'=>'Sidar\Dashboard\MonthController@Ontime', 'as'=>'dar.dashboard.ontimepermonth']);


    ## STORE PANEL
    Route::resource('admin/orders', OrderController::class);
    Route::post('admin/orders', [App\Http\Controllers\Order\OrderController::class, 'index'])->name('orderslist');

    Route::post('admin/orders-tracking-number', [App\Http\Controllers\Order\OrderController::class, 'updatetrackingnumber'])->name('orders-tracking-number');
    Route::get('admin/ordersdetail', [App\Http\Controllers\Order\OrderDetailController::class, 'index'])->name('ordersdetail');

    Route::resource('admin/discount-cluster', DiscountClusterController::class);
    Route::resource('admin/discount', DiscountController::class);
    Route::get('discount-addall', [App\Http\Controllers\Discount\DiscountController::class, 'addall'])->name('discount-addall');
    Route::post('discount-storeall', [App\Http\Controllers\Discount\DiscountController::class, 'storeall'])->name('discount-storeall');
    Route::resource('admin/discount-product', DiscountProductController::class);

    Route::resource('admin/merchandise-product', MerchandiseProductController::class);
    Route::resource('admin/freegift', FreegiftController::class);
    Route::resource('admin/flashsale', FlashsaleController::class);


});

Route::get('/landing', function () {
    return view('ui/landing', [
        "title" => "Home",
        "pages" => "landing"
    ]);
});

// Route::get('/', [FrontLandingController::class, 'index'])->name('landing');
Route::get('/', [FrontLandingController::class, 'index'])->name('landing');
Route::get('/profil_desa', [FrontLandingController::class, 'profil_desa'])->name('profil_desa');
Route::get('/jumlah_remaja_preventif_jenis_kelamin_dan_usia', [FrontLandingController::class, 'jumlah_remaja_preventif_jenis_kelamin_dan_usia'])->name('jumlah_remaja_preventif_jenis_kelamin_dan_usia');
Route::get('/contact', [FrontLandingController::class, 'contact'])->name('contact');
// USER INTERFACE
// home pages
// Route::get('/ui/', function () {
//     return view('ui/landing', [
//         "title" => "Home",
//         "pages" => "landing"
//     ]);
// });


// master
Route::get('/master', function () {
	return view('ui/master', [
		"title" => "master",
		"pages" => "master"
	]);
});


