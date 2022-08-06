<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\TaxonController;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\PackingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DayOfferController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TaxonomyController;
use App\Http\Controllers\PromocodeController;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TaxonChildController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\ProductSpecController;
use App\Http\Controllers\UpdateEmailController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\UpdateAvatarController;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\PropertyValueController;
use App\Http\Controllers\VariationSpecController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\VariationImageController;
use App\Http\Controllers\AutenticationLogController;
use App\Http\Controllers\UpdateGeneralInfoController;

Route::get('test', [TestsController::class, 'index']);
Route::post('test', [TestsController::class, 'store']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('dashboard.index');

    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::get('show-profile', [EditProfileController::class, 'index'])->name('profile.show');

    /** Profile update routes */
    Route::put('avatar', [UpdateAvatarController::class, 'update'])->name('avatar.update');

    // Route::put('password', [UpdatePasswordController::class, 'update'])->name('password.update');

    Route::put('email', [UpdateEmailController::class, 'update'])->name('email.update');

    Route::put('general-info', [UpdateGeneralInfoController::class, 'update'])->name('general_info.update');
    /** Profile update routes */

    /** Logs*/
    Route::resource('activity', ActivityController::class)->only(['index', 'show']);

    Route::resource('authentication-log', AutenticationLogController::class)->only(['index']);

    Route::resource('user-activity', UserActivityController::class)->only(['show']);

    /** user management */
    Route::resource('permission', PermissionController::class)->except(['deleted', 'restore']);

    Route::resource('role', RoleController::class)->except(['deleted', 'restore']);

    /** user management */
    Route::resource('employee', EmployeeController::class)->except(['deleted', 'restore']);

    /** product configuration */
    Route::resource('property', PropertyController::class)->except(['deleted', 'restore']);
    Route::resource('property-value', PropertyValueController::class)->except(['deleted', 'restore']);
    Route::resource('state', StateController::class)->except(['deleted', 'restore']);
    Route::resource('taxon-child', TaxonChildController::class)->except(['deleted', 'restore']);
    Route::resource('taxon', TaxonController::class)->except(['deleted', 'restore']);
    Route::resource('taxonomy', TaxonomyController::class)->except(['deleted', 'restore']);
    Route::resource('product', ProductController::class)->except(['deleted', 'restore']);
    Route::resource('product-image', ProductImageController::class)->only(['index', 'store', 'destroy']);
    Route::resource('product-spec', ProductSpecController::class)->only(['index', 'store', 'destroy']);
    Route::resource('brand', BrandController::class)->except(['deleted', 'restore']);
    Route::resource('work', WorkController::class)->except(['deleted', 'restore']);
    Route::resource('packing', PackingController::class)->except(['deleted', 'restore']);

    /** Variations */
    Route::resource('variation', VariationController::class)->except(['deleted', 'restore']);
    Route::resource('variation-image', VariationImageController::class)->only(['show', 'store', 'destroy']);
    Route::resource('variation-spec', VariationSpecController::class)->only(['index', 'show', 'store', 'destroy']);

    /** Promocodes */
    Route::resource('promocode', PromocodeController::class)->except(['deleted', 'restore']);

    /** Discount */
    Route::resource('discount', DiscountController::class)->except(['deleted', 'restore']);
});

