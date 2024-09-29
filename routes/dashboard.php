<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\RouteHelper;
use App\Http\Controllers\Admin\IntroductionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\WorksheetController;
use App\Http\Controllers\Admin\TeamController;


/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Route ini telah didaftarkan dalam **RouteServiceProvider** dengan konfigurasi khusus sebagai berikut:
| - **Prefix**: `dashboard`
| - **As**: `dashboard.`
| - **Namespace**: `Admin`
|
| Route ini mengarahkan langsung ke Controller yang berada di dalam folder **Admin**.
| Dengan menggunakan pengaturan ini, semua route yang didefinisikan akan otomatis memiliki prefix `dashboard` dan dapat diakses dengan nama alias yang dimulai dengan `dashboard.`
| Contohnya, `dashboard.index` akan merujuk pada method `index` dalam Controller yang sesuai di namespace **Admin**.
| Pengaturan ini memudahkan pengelolaan dan akses route secara terstruktur dalam aplikasi Anda.
|
*/


Route::get('/', "DashboardController@index")->name('dashboard.index');

RouteHelper::make('user', 'user', UserController::class);
RouteHelper::make('material', 'material', MaterialController::class);
Route::group(["prefix"=>"material", "as"=>"material."], function(){
    Route::post('/upload', [MaterialController::class, 'upload'])->name('upload');
});
RouteHelper::make('introduction', 'introduction', IntroductionController::class);
Route::post('/upload', [IntroductionController::class, 'upload'])->name('introduction.upload');

RouteHelper::make('video', 'video', VideoController::class);
RouteHelper::make('worksheet', 'worksheet', WorksheetController::class);
RouteHelper::make('team', 'team', TeamController::class);


