<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDiscountController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryMasterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\seller\SellerProductController;
use App\Http\Controllers\seller\SellerStoreController;
use App\Http\Controllers\SellerController;
use App\Http\Middleware\RoleManager;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


//admin panel routes 
Route::prefix('admin')
    ->middleware(['auth', 'verified','rolemanager:admin'])
    ->group(function () {

        Route::controller(AdminController::class)->group(function(){           
            Route::get('/dashboard', 'index')->name('admin');
            Route::get('/settings', 'setting')->name('admin.setting');
            Route::get('/manage/stores', 'manage_stores')->name('admin.manager.stores');
            Route::get('/cart/history', 'cart_history')->name('admin.cart.history');
            Route::get('/order/history', 'order_history')->name('admin.order.history');
            Route::get('/manage/users', 'manage_user')->name('admin.manager.user');
        });

        Route::controller(CategoryController::class)->group(function(){
            Route::get('/category/create', 'index')->name('category.create');
            Route::get('/category/manage', 'manage')->name('category.manage'); 
});

        Route::controller(SubCategoryController::class)->group(function(){
            Route::get('/subcategory/create', 'index')->name('subcategory.create');
            Route::get('/subcategory/manage', 'manage')->name('subcategory.manage'); 
});

        Route::controller(ProductController::class)->group(function(){
            Route::get('/product/manage', 'index')->name('product.manage');
            Route::get('/product/review/manage', 'review_manage')->name('product.review.manage'); 
});

        Route::controller(ProductAttributeController::class)->group(function(){
            Route::get('/productattribute/create', 'index')->name('productattribute.create');
            Route::get('/productattribute/manage', 'manage')->name('productattribute.manage'); 
});

        Route::controller(ProductDiscountController::class)->group(function(){
            Route::get('/discount/create', 'index')->name('discount.create');
            Route::get('/discount/manage', 'manage')->name('discount.manage'); 
});
        
         Route::controller(CategoryMasterController::class)->group(function(){
            Route::post('/store/category', 'storecategory')->name('store.category');
            Route::get('category/{id}', 'editcategory')->name('edit.category');
            Route::put('category/update/{id}', 'updatecategory')->name('update.category');
            Route::delete('category/delete/{id}', 'deletecategory')->name('delete.category');


             
}); 

    });
    

//seller panel routes 
Route::prefix('vendor')
    ->middleware(['auth', 'verified','rolemanager:vendor'])
    ->group(function () {

        Route::controller(SellerController::class)->group(function(){           
            Route::get('/dashboard', 'index')->name('vendor');
            Route::get('/orderhistory', 'orderhistory')->name('vendor.orderhistory');
        });

        Route::controller(SellerStoreController::class)->group(function(){           
            Route::get('/store/create', 'index')->name('vendor.store.create');
            Route::get('/store/manage', 'manage')->name('vendor.store.manage');

        });

        Route::controller(SellerProductController::class)->group(function(){           
            Route::get('/product/create', 'index')->name('vendor.product.create');
            Route::get('/product/manage', 'manage')->name('vendor.product.manage');
        });

    });


//customer panel routes
Route::prefix('customer')
    ->middleware(['auth', 'verified','rolemanager:customer'])
    ->group(function () {

        Route::controller(CustomerController::class)->group(function(){           
            Route::get('/dashboard', 'index')->name('customer');
            Route::get('/history', 'history')->name('customer.history');
            Route::get('/payment', 'payment')->name('customer.payment');
            Route::get('/affilate', 'affilate')->name('customer.affilate');
        });

    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


/*notes 

*/
