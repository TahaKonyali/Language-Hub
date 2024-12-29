<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ContactQueryController;
use App\Http\Controllers\Admin\WordExplorerController;
use App\Http\Controllers\Admin\QuizController as AdminQuizController;
use App\Http\Controllers\Admin\TranslationController as AdminTranslationController;

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

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/contact-us', [WebsiteController::class, 'contact'])->name('contact-us');
Route::post('/contact-query', [WebsiteController::class, 'storeContactQuery'])->name('contact-query');

//authentication
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/translation-history', [TranslationController::class, 'index'])->name('translation');
        Route::get('/word-explorer', [TranslationController::class, 'wordExplorer'])->name('word-explorer');

        //DeepL Translation
        Route::post('/translate', [TranslationController::class, 'translate'])->name('translate');
        Route::post('/store-translation', [TranslationController::class, 'store'])->name('translate.store');
        Route::post('/delete-translation', [TranslationController::class, 'delete'])->name('translate.delete');

        Route::get('/quiz', [QuizController::class, 'index'])->name('quiz');
        Route::post('/quiz-attempt', [QuizController::class, 'attempt'])->name('quiz.attempt');
        Route::get('/quiz-result/{uuid}', [QuizController::class, 'result'])->name('quiz.result');
        Route::post('/mark-quiz-result', [QuizController::class, 'markResult'])->name('quiz.mark.result');

        Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
        Route::post('/update-profile', [DashboardController::class, 'updateProfile'])->name('update.profile');
    });

});

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('/process_login', [AdminAuthController::class, 'loginProcess'])->name('process_login');

    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('main');

        Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::resource('language', LanguageController::class);

        Route::resource('quiz', AdminQuizController::class);

        Route::resource('translation', AdminTranslationController::class);

        Route::resource('word-explorer', WordExplorerController::class);

        Route::resource('category', CategoryController::class);

        Route::resource('contact-query', ContactQueryController::class);

        Route::resource('user', UserController::class);
        Route::get('/user_export', [UserController::class, 'export'])->name('user.export');
        Route::post('/user-status', [UserController::class, 'update_status'])->name('user.update-status');

        Route::get('/settings', [SettingsController::class, 'index'])->name('setting');
        Route::post('/settings/update', [SettingsController::class, 'update'])->name('setting.update');
    });

});
