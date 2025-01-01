<?php


use App\Http\Controllers\ViewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\EmbassyController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\BkashTokenizePaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

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
    return view('welcome');
});

#verification route
Route::any('/signup', [ViewController::class, 'signup'])->name('signup');
Route::any('/login', [ViewController::class, 'login'])->name('login');

//agent routes
Route::get('/agent/edit/{id}', [AgentController::class, 'edit'])->name('agent.edit');
Route::post('/agent/update', [AgentController::class, 'update'])->name('agent.update');
Route::get('/agent/view/{id}', [AgentController::class, 'view'])->name('agent.view');
Route::delete('/agent/delete/{id}', [AgentController::class, 'destroy'])->name('agent.delete');

//reporter routes
Route::get('/agent-candidate', [ReportController::class, 'agentCandidate'])->name('agent_candidate');
Route::post('/agent_candidate_report', [ReportController::class, 'agent_candidate_report'])->name('agent_candidate_report');

// Route::middleware('csrf')->any('/login', [ViewController::class, 'login'])->name('login');
Route::get('/forget-password', [ViewController::class, 'forgetPassword'])->name('forget-password');
Route::post('/getemail', [Mailcontroller::class,  'getemail'])->name('getemail');
Route::any('/send-mail', [Mailcontroller::class, 'index'])->name('send-mail');
Route::get('/check-email', [ViewController::class, 'checkEmail'])->name('checkEmail');
Route::post('/password-reset', [ViewController::class, 'setnewpassword'])->name('password_reset');
#user routes
Route::any('/user/index', [UserController::class, 'index'])->name('user/index');
Route::any('/agent/index', [AgentController::class, 'agent_add'])->name('agent/index');
Route::any('/user/visaadd/{id}', [UserController::class, 'visa_add'])->name('user/visaadd');
Route::any('/user/manpoweradd/{id}', [UserController::class, 'manpower_add'])->name('user/manpoweradd');
Route::any('/user/manpoweredit/{id}', [UserController::class, 'manpower_edit'])->name('user/manpoweredit');

Route::get('/user/visasearch/{id}', [UserController::class, 'visa_search'])->name('user/visasearch');
Route::any('/user/edit/{id}', [UserController::class, 'edit'])->name('user/edit');
Route::any('/user/view/{id}', [UserController::class, 'view'])->name('user/view');
Route::any('/user/personal_edit/{id}', [UserController::class, 'personal_edit'])->name('user/personal_edit');

Route::any('/user/delete/{id}', [UserController::class, 'delete'])->name('user/delete');
Route::any('/user/visa_edit/{id}', [UserController::class, 'visa_edit'])->name('user/visa_edit');
Route::any('/user/embassy_list', [UserController::class, 'embassy_list'])->name('user/embassy_list');
Route::any('/user/update', [UserController::class, 'update'])->name('user/update');
Route::any('/user/print/{id}', [UserController::class, 'printer'])->name('user/print');
Route::any('/user/get', [UserController::class, 'get'])->name('getpassport');
// Route::post('/user/addcandidate', 'CandidateController@addCandidate')->name('user.addcandidate');
Route::any('user/logout', [UserController::class, 'logout'])->name('user/logout');
#admin routes
Route::any('/admin/index', [AdminController::class, 'index'])->name('admin');
Route::any('/ádmin/edit/{id}', [AdminController::class, 'edit'])->name('admin/edit');
Route::any('/ádmin/view/{id}', [AdminController::class, 'view'])->name('admin/view');
Route::any('/ádmin/delete/{id}', [AdminController::class, 'delete'])->name('admin/delete');

#embassy routes
Route::get('/user/embassy/{id}', [EmbassyController::class, 'sendcandidate'])->name('user/embassy');
Route::get('/user/manpower/{id}', [EmbassyController::class, 'sendmanpower'])->name('user/manpower');

#payment routes
Route::any('/payment/index', [PaymentController::class, 'index']);

#bkash route
// Route::prefix('user')->group(function () {
    Route::get('/bkash/payment', [BkashTokenizePaymentController::class, 'index']);
    Route::get('/bkash/create-payment', [BkashTokenizePaymentController::class, 'createPayment'])->name('bkash-create-payment');
    Route::get('/bkash/callback', [BkashTokenizePaymentController::class, 'callBack'])->name('bkash-callBack');
// });

use App\Http\Controllers\FormController;

// Define the routes
Route::get('/note-sheet', [FormController::class, 'noteSheet'])->name('note-sheet');
Route::get('/putup-list', [FormController::class, 'putupList'])->name('putup-list');
Route::get('/contract', [FormController::class, 'contract'])->name('contract');
Route::get('/stemp_paper', [FormController::class, 'stemp_paper'])->name('stemp_paper');
Route::get('/application', [FormController::class, 'application'])->name('application');



//search payment
//Route::get('/bkash/search/{trxID}', [App\Http\Controllers\BkashTokenizePaymentController::class,'searchTnx'])->name('bkash-serach');

//refund payment routes
//Route::get('/bkash/refund', [App\Http\Controllers\BkashTokenizePaymentController::class,'refund'])->name('bkash-refund');
//Route::get('/bkash/refund/status', [App\Http\Controllers\BkashTokenizePaymentController::class,'refundStatus'])->name('bkash-refund-status');