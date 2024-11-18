<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Admin\BoardController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DomainController;
use App\Http\Controllers\Admin\HostingController;
use App\Http\Controllers\Admin\BoardListController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\CompanyDocumentsController;
use App\Http\Controllers\Admin\CompanyInformationController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Client\LoginController;
use App\Http\Controllers\Client\DashBoardController;
use App\Http\Controllers\Client\TicketController;
use App\Http\Controllers\Admin\Ticket\SupportController;
use App\Http\Controllers\Admin\Ticket\CategoryController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/clients/register',[LoginController::class,'registerPage'])->name('clientregister.page');
Route::get('/clients',[LoginController::class,'loginPage'])->name('clientlogin.page');
Route::post('/client/registerdata',[LoginController::class,'clientRegister'])->name('client.register_save');
Route::post('/client/login/data',[LoginController::class,'LoginClient'])->name('client.login');
Route::middleware('auth:clinetuser')->group(function () {
    Route::get('/client/dashboard/', [DashBoardController::class, 'clientDashboard'])->name('client.dashboard');
    Route::get('/client/logout', [LoginController::class,'ClientLogout'])->name('client.logout');
    Route::get('/client/open/support/ticket', [TicketController::class, 'create'])->name('open.support_ticket');
    Route::get('/client/open/support_ticket/all', [TicketController::class, 'index'])->name('support_ticket.all');
    Route::post('/client/open/support/ticket', [TicketController::class, 'store'])->name('support_ticket_high');
    Route::get('/client/show/support/ticket/{id}', [TicketController::class, 'show'])->name('support_ticket_high.show');
    Route::post('/client/ticket/comment', [TicketController::class,'replyFile'])->name('ticket.comment.store');
    Route::get('/client/ticket/{id}/{status}', [TicketController::class, 'UpdateStatus'])->name('status.update');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('/dashboard/client', ClientController::class);
    Route::resource('/dashboard/domain', DomainController::class);
    Route::resource('/dashboard/hosting', HostingController::class);
    Route::resource('/dashboard/company-information',CompanyInformationController::class);
    Route::resource('/dashboard/company-documents',CompanyDocumentsController::class);
    Route::resource('/dashboard/boards',BoardController::class);
    Route::resource('/dashboard/ticket/category', CategoryController::class);
    Route::resource('board_lists', BoardListController::class);
    Route::patch('/dashboard/boards/{board}/toggle-status', [BoardController::class, 'toggleStatus'])->name('boards.toggleStatus');
    Route::post('/delete_board_lists',[BoardListController::class,'deleteBoardLists'])->name('delete.board_lists');
    Route::post('/update_board_lists_name', [BoardListController::class, 'updateBoardListName'])->name('update.board_list_name');

    Route::post('/add_cards', [CardController::class, 'addCard'])->name('add.card');
    Route::put('/update_cards/{id}', [CardController::class, 'updateCard']);

    Route::controller(CompanyController::class)->group(function(){
        Route::get('/company-lists', 'index')->name('companies.index');
        Route::get('/company-create', 'create')->name('companies.create');
        Route::get('/company-edit/{id}', 'edit')->name('companies.edit');
        Route::post('/company-edit/{id}', 'update')->name('companies.update');
        Route::post('/company-save', 'store')->name('companies.save');
        Route::delete('/company-delete/{id}', 'destroy')->name('companies.delete');
    });

    Route::controller(DepartmentController::class)->group(function(){
        Route::get('department-lists', 'index')->name('department.index');
        Route::get('department-lists/edit/{id}', 'edit')->name('department.edit');
        Route::post('department-lists/update_department/{id}', 'update')->name('department.update');
        Route::post('/department-create', 'store')->name('departments.store');
        Route::delete('/department-delete/{id}', 'destroy')->name('departments.delete');
    });

    Route::controller(DesignationController::class)->group(function(){
        Route::get('/designation-lists', 'index')->name('designation.index');
        Route::post('/designation-store', 'store')->name('designation.store');
        Route::get('designation-lists/edit/{id}', 'edit')->name('designation.edit');
        Route::post('designation-lists/update_designation/{id}', 'update')->name('designation.update');
        Route::delete('/designation-delete/{id}', 'destroy')->name('designation.delete');
    });

    Route::controller(EmployeeController::class)->group(function(){
        // fetching data route
        Route::get('/report/departments/{companyId}', 'getDepartmentsByCompany');
        Route::get('/report/employees/{departmentId}', 'getEmployeesByDepartment');
        Route::get('/employee-lists', 'index')->name('employees.index');
        Route::get('/employee-create', 'create')->name('employees.create');
        Route::post('/employee-save', 'store')->name('employees.save');
        Route::get('/employee-edit/{id}', 'edit')->name('employees.edit');
        Route::post('/employee-edit/{id}', 'update')->name('employees.update');
        Route::delete('/employee-delete/{id}', 'destroy')->name('employee.delete');
    });

    Route::controller(TeamController::class)->group(function () {
        Route::get('/teams-list', 'index')->name('teams.index');
        Route::post('/teams', 'store')->name('teams.store');
        Route::delete('/teams/{id}', 'destroy')->name('teams.destroy');
        Route::put('/teams/{id}', 'update')->name('teams.update');
        Route::post('/teams/{team}/assign-member', 'assignMember')->name('teams.assignMember');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard/ticket/support/', [SupportController::class,'index'])->name('ticket.support.index');
    Route::get('/dashboard/ticket/support/show/{id}', [SupportController::class,'show'])->name('ticket.support.show');
    Route::post('/dashboard/ticket/comment', [SupportController::class,'replyComments'])->name('ticket_comment.reply');
});

require __DIR__.'/auth.php';
