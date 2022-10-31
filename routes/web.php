<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\ClientMessageController;
use App\Http\Controllers\ClientOrdersController;
use App\Http\Controllers\ClientWalletController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\ForgetController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\WithdrawalController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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
    return view('site/about');
  });


Route::prefix('')->group(function () {
    Route::get('', [SiteController::class, 'showHome'])->name('home');
    Route::get('plan', [SiteController::class, 'showPlan'])->name('plan');
    Route::get('blog', [SiteController::class, 'showBlog'])->name('blog');
    Route::get('blog-details/{blog}', [SiteController::class, 'showBlogDetails'])->name('blog-details');
    Route::get('contact-us', [SiteController::class, 'showContactUs'])->name('contact-us');
    Route::get('about-us', [SiteController::class, 'showAboutUs'])->name('about-us');
    Route::get('fag', [SiteController::class, 'showFaq'])->name('faq');
    Route::get('terms-conditions', [SiteController::class, 'showTerm'])->name('terms-conditions');
    Route::get('privacy-policy', [SiteController::class, 'showPrivacy'])->name('privacy-policy');
    Route::post('contact',[ContactUsController::class,'storee']);
});

Route::prefix('')->group(function () {
    Route::get('sign-in', [SignController::class, 'showSignIn'])->name('sign-in');
    Route::post('sign-in', [SignController::class, 'signIn']);
    Route::get('sign-out', [SignController::class, 'signOut'])->name('sign-out');
    Route::get('sign-up', [SignController::class, 'showSignUp'])->name('sign-up');
    Route::post('sign-up', [SignController::class, 'signUp']);
    Route::get('forget-password', [SignController::class, 'showForgetPassword'])->name('forget-password');
    Route::post('forget-password', [SignController::class, 'forgetPassword']);
});

Route::prefix('cms/admin')->middleware('auth:admin')->group(function () {
    Route::get('home', [AdminDashboardController::class, 'showHome'])->name('admin-home');
    Route::resource('admin', AdminController::class);
    Route::post('admin/delete/{id}', [AdminController::class,'destroy']); 
    Route::resource('client', ClientController::class);
    Route::post('client/delete/{id}', [ClientController::class,'destroy']); 
    Route::resource('blog', BlogController::class);
    Route::post('blog/delete/{id}',[ BlogController::class,'destroy']);
    Route::post('blog/edit',[ BlogController::class,'update']);
    Route::resource('plan', PlanController::class);
    Route::post('plan/delete/{id}', [PlanController::class,'destroy']); 

    Route::resource('payment', PaymentController::class);
    Route::post('payment/delete/{id}', [PaymentController::class,'destroy']);
    Route::post('payment/edit', [PaymentController::class,'update']);
    Route::resource('contact', ContactUsController::class);
    Route::resource('order', OrderController::class);
    Route::resource('message', MessageController::class);
    Route::resource('deposit', DepositController::class);
    Route::post('deposit/update/{id}', [DepositController::class,'update']);
    Route::post('deposit/delete/{id}', [DepositController::class,'destroy']);
    Route::resource('withdrawal', WithdrawalController::class);
    Route::post('withdrawal/update/{id}', [WithdrawalController::class,'update']);
    Route::post('withdrawal/delete/{id}', [WithdrawalController::class,'destroy']);
    Route::resource('forget', ForgetController::class);
    Route::post('forget/approve/{id}', [ForgetController::class,'update']);
});

Route::prefix('cms/client')->middleware('auth:client')->group(function () {
    Route::get('home', [ClientDashboardController::class, 'showHome'])->name('client-home');
    Route::get('profile', [ClientDashboardController::class, 'showProfile'])->name('client-profile');
    Route::get('referral', [ClientDashboardController::class, 'showReferral'])->name('client-referral');
    Route::get('chat', [ClientDashboardController::class, 'showChat'])->name('client-chat');
    Route::get('wallet', [ClientWalletController::class, 'showWallet'])->name('client-wallet');
    Route::get('withdrawal', [ClientWalletController::class, 'showWithdrawalRequest'])->name('client-withdrawal');
    Route::post('withdrawal', [ClientWalletController::class, 'storeWithdrawalRequest']);
    Route::get('deposit', [ClientWalletController::class, 'showDepositRequest'])->name('client-deposit');
    Route::post('deposit', [ClientWalletController::class, 'storeDepositRequest']);
    Route::post('message', [ClientMessageController::class, 'storeMessage']);
    Route::resource('order-client', ClientOrdersController::class);
});
Route::get('/clear-cache', function() {
   // echo 'eff';
    $exitCode = Artisan::call('optimize');
    // $exitCode = Artisan::call('cache:clear');
    // $exitCode1 = Artisan::call('route:cache');
    // $exitCode2 = Artisan::call('config:cache');
    // return what you want
});
