<?php

use App\Http\Livewire\BootstrapTables;
use App\Http\Livewire\Components\Buttons;
use App\Http\Livewire\Components\Forms;
use App\Http\Livewire\Components\Modals;
use App\Http\Livewire\Components\Notifications;
use App\Http\Livewire\Components\Typography;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Err404;
use App\Http\Livewire\Err500;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\ForgotPassword;
use App\Http\Livewire\Lock;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\ForgotPasswordExample;
use App\Http\Livewire\Index;
use App\Http\Livewire\LoginExample;
use App\Http\Livewire\ProfileExample;
use App\Http\Livewire\RegisterExample;
use App\Http\Livewire\Reports;
use App\Http\Livewire\AccidentReports;
use App\Http\Livewire\CrimeReports;
use App\Http\Livewire\Barangay;
use App\Http\Livewire\BarangayProfile;
use App\Http\Livewire\DataAnalysis;
use App\Http\Livewire\Map;
use App\Http\Livewire\SMS;
use App\Http\Livewire\Type;
use App\Http\Livewire\LocationTracker;
use App\Http\Livewire\Search;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ResetPasswordExample;
use App\Http\Livewire\UpgradeToPro;
use App\Http\Livewire\Users;

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

Route::get('/storage', function () {
    Artisan::call('storage:link');
});

Route::get('/cache', function () {
    Artisan::call('config:clear');
});

Route::redirect('/', '/login');

Route::get('/register', Register::class)->name('register');

Route::get('/login', Login::class)->name('login');

Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::get('/404', Err404::class)->name('404');
Route::get('/500', Err500::class)->name('500');
Route::get('/upgrade-to-pro', UpgradeToPro::class)->name('upgrade-to-pro');

Route::middleware('auth')->group(function () {

    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/profile-example', ProfileExample::class)->name('profile-example');
    Route::get('/users', Users::class)->name('users');
    Route::get('/login-example', LoginExample::class)->name('login-example');
    Route::get('/register-example', RegisterExample::class)->name('register-example');
    Route::get('/forgot-password-example', ForgotPasswordExample::class)->name('forgot-password-example');
    Route::get('/reset-password-example', ResetPasswordExample::class)->name('reset-password-example');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/reports', Reports::class)->name('reports');
    Route::get('/accident-reports', AccidentReports::class)->name('accident-reports');
    Route::get('/crime-reports', CrimeReports::class)->name('crime-reports');
    Route::get('/bootstrap-tables', BootstrapTables::class)->name('bootstrap-tables');
    Route::get('/barangay', Barangay::class)->name('barangay');
    Route::get('/barangay-profile/{id}', BarangayProfile::class)->name('barangay');
    Route::get('/data-analysis', DataAnalysis::class)->name('data-analysis');
    Route::get('/gis-map', Map::class)->name('gis-map');
    Route::get('/location-tracker', LocationTracker::class)->name('location-tracker');
    Route::get('/sms-configuration', SMS::class)->name('sms-configuration');
    Route::get('/type', Type::class)->name('type');
    Route::get('/lock', Lock::class)->name('lock');
    Route::get('/buttons', Buttons::class)->name('buttons');
    Route::get('/notifications', Notifications::class)->name('notifications');
    Route::get('/forms', Forms::class)->name('forms');
    Route::get('/modals', Modals::class)->name('modals');
    Route::get('/typography', Typography::class)->name('typography');

    Route::group(['prefix' => 'create'], function () {
        Route::post('barangay-account', [Users::class, 'createBarangay']);
        Route::post('report', [Reports::class, 'createReport']);
        Route::post('type', [Type::class, 'createType']);
	  });

    Route::group(['prefix' => 'update'], function () {
        Route::post('barangay-account', [Users::class, 'updateBarangay']);
        Route::post('user-account', [Users::class, 'updateUser']);
        Route::post('verify-account', [Users::class, 'verifyUser']);
        Route::post('report', [Reports::class, 'updateReport']);
        Route::post('accident-report-respond', [AccidentReports::class, 'respondReport']);
        Route::post('accident-report-police', [AccidentReports::class, 'policeReport']);
        Route::post('crime-report-respond', [CrimeReports::class, 'respondReport']);
        Route::post('crime-report-police', [CrimeReports::class, 'policeReport']);
        Route::post('profile', [Profile::class, 'updateProfile']);
        Route::post('profile-photo', [Profile::class, 'updateProfilePhoto']);
        Route::post('notify', [Notifications::class, 'notifyRead']);
        Route::post('sms-configuration', [SMS::class, 'sms']);
        Route::post('type', [Type::class, 'updateType']);
    });

    Route::group(['prefix' => 'delete'], function () {
        Route::post('barangay-account', [Users::class, 'deleteBarangay']);
        Route::post('user-account', [Users::class, 'deleteUser']);
        Route::post('report', [Reports::class, 'deleteReport']);
        Route::post('type', [Type::class, 'deleteType']);
    });

    Route::group(['prefix' => 'read'], function () {
        Route::post('user-list', [Users::class, 'changeType']);
    });

    Route::group(['prefix' => 'search'], function () {
        Route::post('year', [Search::class, 'changeYear']);
        Route::post('account', [Search::class, 'searchAccount']);
        Route::post('barangay-users', [Search::class, 'searchBarangayUser']);
        Route::post('barangay-report', [Search::class, 'barangayReport']);
    });

});
