<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return Redirect::to('/system/');
});

// employee login route ( do not remove )
Route::auth();

// main home page controller ( do not remove )
Route::get('/home', 'HomeController@index');
/**
 * DIRECT TEST PURPOSES
 */
Route::get('/test/{test}', 'Employee\CalculateSalary@calculateSalaray');

Route::get('/test/', 'HomeController@index');

// Main App Controller
Route::get('/system', 'HomeController@getDashBoard');

// Rashinda's routes
Route::get('/system/tour/', 'Tour\TourController@index');
Route::get('/system/tour/hotels/{id}/show','Tour\hotels\HotelController@show');
Route::resource('system/tour/hotels', 'Tour\hotels\HotelController'); // <- this already calls the @create method
Route::resource('system/tour/guide', 'Tour\guide\GuideController'); // <- this already calls the @create method
Route::get('/system/tour/guide/{id}/show','Tour\guide\GuideController@show');
Route::resource('system/tour/manage','Tour\manage\TourManageController');
//Route::get('/system/tour/tourmanage/{id}/show','Tour\tourmanage\TourManageController@show');


// Udana's routes
Route::resource('system/advertisements/feedback','Advertisements\FeedbackController');
Route::resource('system/advertisements/types', 'Advertisements\AdvertisementTypesController');
Route::resource('system/advertisements', 'Advertisements\AdvertisingController');


// Sithira's routes
Route::resource('system/extras/holidays', 'Employee\HolidayController');
Route::resource('system/extras/ottypes', 'Employee\OverTimeTypeController');
Route::resource('system/extras/leavetype', 'Employee\LeaveType');
Route::get('system/employee/attendance', 'Employee\EmployeeController@getAllAttendance');
Route::resource('system/employee', 'Employee\EmployeeController');

// stats on employee
Route::get('/system/employee/{employee}/stats/salary-slip/{id}', 'Employee\EmployeeController@getSalarySlipInfo');
Route::get('/system/employee/{employee}/stats/salary-slips', 'Employee\EmployeeController@getSalarySlip');
Route::get('/system/employee/{employee}/stats/overtimes', 'Employee\EmployeeController@getOverTime');
Route::get('/system/employee/{employee}/stats/loans', 'Employee\EmployeeController@getLoans');
Route::get('/system/employee/{employee}/stats/leaves', 'Employee\EmployeeController@getLeaves');
Route::get('/system/employee/{employee}/stats/attendance', 'Employee\EmployeeController@getAttendance');
Route::get('/system/employee/{employee}/stats/travel', 'Employee\EmployeeController@getTravel');


// Nimansa's routes
Route::resource('system/accounts/', 'Accounts\AccountController');
Route::resource('/system/accounts/quickbook', 'Accounts\QuickBookController');
Route::get('system/accounts/stats/{expense}/expense', 'Accounts\AccountController@getMoreExpense');
Route::get('system/accounts/stats/{income}/income', 'Accounts\AccountController@getMoreIncome');
Route::get('system/accounts/graphs/', 'Accounts\AccountController@getGraphsView');

Route::get('/system/accounts/calculate/income', 'Accounts\AccountController@calculateIncomePerDay');
Route::get('/system/accounts/calculate/expense', 'Accounts\AccountController@calculateExpensePerDaya');

Route::resource('system/accounts/bill/type', 'Accounts\BillTypeController');
Route::resource('system/accounts/bill', 'Accounts\BillController');

/*
 * Nimansa's AJAX Routes
 * */
Route::get('/api/secured/accounts/bills/type/{id}', function ($id) {
    return \App\Models\Accounts\BillsType::findOrFail($id)->bills->toJson();
});
Route::get('/api/secured/accounts/bills/month/{from}/{to}', function ($from, $to) {
    return \App\Models\Accounts\Bills::whereBetween('date', [$from, $to])->get();
});

/********************************************
 * Employee additional links (advance, loans)
 *******************************************/

// loans routes
Route::group(['middleware' => 'adminOrManager'], function () {

    Route::get('admin/employee/loan/create', 'Employee\General\Additional@getAddLoan');
    Route::post('/system/admin/employee/loan/create', 'Employee\General\Additional@postAddLoan');

// leaves routes
    Route::get('/system/admin/employee/leave/create', 'Employee\General\Additional@getLeaveView');
    Route::post('/system/admin/employee/leave/create', 'Employee\General\Additional@postAddLeave');

// advance payments routes
    Route::get('/system/admin/employee/advance/create', 'Employee\General\Additional@getAdvancePayView');
    Route::post('/system/admin/employee/advance/create', 'Employee\General\Additional@postAdvancePayView');

    Route::get('/api/secured/employee/loans/{employee}', function ($employee) {
        return \App\User::findOrFail($employee)->loans->toJson();
    });

    Route::get('/api/secured/employee/leaves/{employee}', function ($employee) {
        return \App\User::findOrFail($employee)->leaves->toJson();
    });

    Route::get('/api/secured/employee/advance/{employee}', function ($employee) {
        return \App\User::findOrFail($employee)->advance->toJson();
    });

    Route::get('/api/secured/employee/name/{employee}', function ($employee) {
       return \App\User::where('name', 'like', '%'.$employee.'%')->get()->toJson();
    });


    //SK 's Search

    Route::get('/api/secured/rental/driver/name/{driver}', function ($driver) {
        return \App\User::where('name','like','%'.$driver.'%')->get()->toJson();
    });

    Route::get('/api/secured/rental/vehicle/name/{vehicle}', function ($vehicle) {
        return \App\Models\Rental\Vehicle::where('vehicle_name','like','%'.$vehicle.'%')->get()->toJson();
    });
/*
    Route::get('/api/secured/rental/reservation/name/{reservation}', function ($reservation) {
        return \App\Models\Rental\Reservation::where('','like','%'.$reservation.'%')->get()->toJson();
    });

*/










});


// todo : surround them in middleWare of entry operator

// Achala's routes
//Agent's get routes

Route::get('/system/agent/view','Agent\AgentController@viewAgents');
Route::get('/system/agent/{id}/terminate','Agent\AgentController@terminate');
Route::get('/system/agent/{id}/undo','Agent\AgentController@undo');

Route::get('/system/customer/{id}/terminate', 'Customer\CustomerController@terminate');
Route::get('/system/customer/{id}/view/', 'Customer\CustomerController@view');
Route::get('/system/customer/view/', 'Customer\CustomerController@viewAll');

Route::get('/system/customer/new/tour/{id}/create','Customer\CustomerController@newTourCreate');
Route::post('/system/customer/new/tour/{id}/create','Customer\CustomerController@postNewTour');


Route::resource('/system/customer', 'Customer\CustomerController');
Route::get('/system/ticket/{id}/create','Ticket\TicketController@allocate');
Route::get('/system/ticket/view','Ticket\TicketController@all');
Route::resource('/system/ticket','Ticket\TicketController');

//agent's routes
Route::resource('/system/agent','Agent\AgentController');
//for rental registered customer
Route::get('rental/reservation/{id}/create','Rental\ReservationController@reservation');


//Achala's ajaxs
Route::get('/api/secured/customer/tours/{package_id}', function ($package_id) {
    $carbon = \Carbon\Carbon::now()->addDays(-2)->toDateString();
    return \App\Models\Tour\Tour::where('package_id', $package_id)->where('departure', '<=', $carbon)->get();
});


//get agent search
Route::get('/api/secured/agent/name/{name}',function ($name){
    return \App\Models\Agent\Agent::where('name', 'like',$name.'%')
                ->orwhere('name', 'like',$name.'%')->
                orWhere('registered','like',$name.'%')->get()->toJson();
});

//agent Refill
Route::get('/api/secured/agent/refill',function (){
    return \App\Models\Agent\Agent::all()->where('terminated',0)->toJson();
});

//customer search
Route::get('/api/secured/customer/refill',function(){
    return App\Models\Customer\Customer::all()->toJson();
});

//customer Search
Route::get('/api/secured/customer/name/{name}',function($name){
    return App\Models\Customer\Customer::where('fname', 'like',$name.'%')
        ->orWhere('nic', 'like',$name.'%')->
        orWhere('sname', 'like',$name.'%')->
        orWhere('lname', 'like',$name.'%')->get()->toJson();
});

//get package price

Route::get('/api/secured/package/{id}',function($id){
    return \App\Models\Package\Package::where('id',$id)->first()->price;
});




//Nuwan's Routes
Route::get('system/rental/income', 'Rental\RentalController@getRentalIncome');
Route::get('system/rental/expense', 'Rental\RentalController@getRentalExpenses');
Route::get('system/rental/profit', 'Rental\RentalController@getRentalProfit');
Route::resource('system/rental/vehicle', 'Rental\RentalController');
Route::resource('system/rental/driver', 'Rental\DriverController');
Route::resource('system/rental/reservation', 'Rental\ReservationController');
Route::get('system/rental/', 'HomeController@getRentalDashBoard');


// Danajalee's routes
Route::get('/system/package/{id}/terminate', 'Package\PackageController@terminate');
Route::resource('/system/package', 'Package\PackageController');
Route::resource('/system/package/days/{package}/', 'Package\PackageDayController');

// System test routes ( timesheet )
Route::get('/attendance/{employee}/check-out', 'Employee\TimeSheetController@checkOut');
Route::get('/attendance/{employee}/check-in', 'Employee\TimeSheetController@checkIn');
