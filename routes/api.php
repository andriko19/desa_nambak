<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Product\ProductController;

use App\Http\Controllers\Api\Product\GetProductController;
use App\Http\Controllers\Api\Product\GetWeightController;

use App\Http\Controllers\Api\Product\GetFormController;

use App\Http\Controllers\Api\Cart\PostCartController;

use App\Http\Controllers\Api\Member\Member\UpdateMemberController;
use App\Http\Controllers\Api\Member\Member\PostMachinesMemberController;

use App\Http\Controllers\Api\Member\MemberAddress\PostMemberAddressController;
use App\Http\Controllers\Api\Member\MemberAddress\GetMemberAddressController;
use App\Http\Controllers\Api\Member\MemberAddress\GetMemberAddressByIdController;
use App\Http\Controllers\Api\Member\MemberAddress\UpdateMemberAddressController;
use App\Http\Controllers\Api\Member\MemberAddress\DeleteMemberAddressController;

use App\Http\Controllers\Api\Merchandise\GetMerchandiseController;
use App\Http\Controllers\Api\Vouchers\GetVouchersController;
use App\Http\Controllers\Api\Vouchers\GetVouchersMembersController;

use App\Http\Controllers\Api\Vend\GetSalesController;
use App\Http\Controllers\Api\Easyship\GetShippingController;
use App\Http\Controllers\Api\Easyship\PostShippingController;

use App\Http\Controllers\Front\FrontCartController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', [ApiController::class, 'register']);

Route::post('updateMember', [UpdateMemberController::class, 'update']);
Route::post('updateimage', [UpdateMemberController::class, 'updateimage']);
Route::post('postmachines', [PostMachinesMemberController::class, 'store']);

Route::post('postMemberAddress', [PostMemberAddressController::class, 'store']);
Route::post('getMemberAddress', [GetMemberAddressController::class, 'get']);
Route::post('getMemberAddressById', [GetMemberAddressByIdController::class, 'get']);
Route::post('updateMemberAddress', [UpdateMemberAddressController::class, 'update']);
Route::post('deleteMemberAddress', [DeleteMemberAddressController::class, 'delete']);

Route::post('postCart', [PostCartController::class, 'store']);

Route::post('getMerchandiseAll', [GetMerchandiseController::class, 'getAll']);
Route::post('getMerchandiseByFilter', [GetMerchandiseController::class, 'getByFilter']);

Route::get('getVouchersAll', [GetVouchersController::class, 'getAll']);
Route::post('getVouchersByIdMembers', [GetVouchersMembersController::class, 'getAllVouchersByIdMembers']);

Route::post('getProductById', [GetProductController::class, 'GetProductById']);
Route::post('getProductWeightbyVariant', [GetWeightController::class, 'GetWeightByVariant']);
Route::post('getWeightGroupByVariant', [GetWeightController::class, 'GetWeightGroupByVariant']);
Route::post('getWeightByVariant', [GetWeightController::class, 'GetWeightByVariant']);
Route::post('getFormGroupByVariant', [GetFormController::class, 'GetFormGroupByVariant']);

Route::post('getsales', [GetSalesController::class, 'get']);
Route::post('getshipping', [GetShippingController::class, 'get']);
Route::post('postshipping', [PostShippingController::class, 'post']);

Route::post('apichoosegift', [FrontCartController::class, 'chooseGift'])->name('cart.choosegift');

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('get_user', [ApiController::class, 'get_user']);
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{id}', [ProductController::class, 'show']);
    Route::post('create', [ProductController::class, 'store']);
    Route::put('update/{product}',  [ProductController::class, 'update']);
    Route::delete('delete/{product}',  [ProductController::class, 'destroy']);
});