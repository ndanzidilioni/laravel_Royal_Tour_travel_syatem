<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequestValidator;
use App\Models\Employee\AdminTypes;
use App\Models\Employee\EmployeeTravel;
use App\Models\Employee\EmployeeType;
use App\Models\Employee\EPF;
use App\Models\Employee\Leave;
use App\Models\Employee\OverTime;
use App\Models\Employee\SalarySlip;
use App\Models\Employee\TimeSheet;
use App\User;
use Auth;
use Carbon\Carbon;
use File;
use Flash;
use Illuminate\Http\Request;
use Redirect;

class EmployeeController extends Controller
{
    /**
     * EmployeeController constructor.
     */
    public function __construct()
    {
        // enables updates
        $this->middleware('auth');

        $this->middleware('adminOrManager', ['except' => 'show']);

        // stops self updates
        $this->middleware('selfUpdate' ,['only' => 'update']);

        // stop peeking at others details
        $this->middleware('peekDetails', ['only' => ['show', 'getLoans']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // get all the employees in the database
        $employees = User::all();

        // return the view with all compacted data
        return view('admin.employee.index', compact('employees'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get all type names of the admin types
        $type_lists = AdminTypes::pluck('type', 'id');

        // get all the employee types
        $employee_type = EmployeeType::pluck('name', 'id');

        // return with compacted data
        return view('admin.employee.create', compact('type_lists', 'employee_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequestValidator|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequestValidator $request)
    {

        $birthDay = Carbon::parse($request->dob);

        $currentTime = Carbon::now();

        $carbon = new Carbon();

        $age = $carbon->diffInYears($birthDay);

        // create the employee
        $employee = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'hour_rate' => $request->hour_rate,
            'age' => $age,
            'address' => $request->address,
            'password' => bcrypt($request->password),
            'nic' => $request->nic,
            'basic' => $request->basic,
            'gender' => ($request->has('gender')) ? 1 : 0,
            'terminated' => 0,
            'hired_date' => $currentTime->toDateString(),
            'terminated_date' => null
        ]);

        // create the directory for a employee
        if(!File::isDirectory(public_path().'/employees/'.$employee->id)) {
            File::makeDirectory(public_path().'/employees/'.$employee->id, true, true);
        }

        // sync the access types
        $employee->admin()->sync($request->type_lists);

        // sync the access employee types
        $employee->employee_type()->sync($request->employee_types);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the employee model
        $employee = User::findOrFail($id);

        // get all admin types
        $type_lists = AdminTypes::pluck('type');

        // get all employee types
        $employee_types = EmployeeType::pluck('name');

        // return the view
        return view('admin.employee.show', compact('employee', 'type_lists', 'employee_types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = User::find($id);

        $type_lists = AdminTypes::pluck('type', 'id');

        $employee_type = EmployeeType::pluck('name', 'id');

        return view('admin.employee.edit', compact('employee', 'type_lists', 'employee_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequestValidator|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequestValidator $request, $id)
    {
        $this->middleware('selfUpdate');
        // get the employee model
        $employee = User::findOrFail($id);

        // set the normal employee columns
        $employee->name = $request->name;
        $employee->lastname = $request->lastname;
        $employee->basic = $request->basic;
        $employee->hour_rate = $request->hour_rate;
        $employee->address = $request->address;

        // since we have only checkbox it's only available in the dom if
        // its ticked, so we have to check for the existence
        if ($request->gender == '0') {
            $employee->gender = 0;
        } else {
            $employee->gender = 1;
        }

        // if terminated date is checked set the date
        if ($request->has('terminated')) {
            $employee->terminated = 1;
            $employee->terminated_date = Carbon::now();
        } else {
            $employee->terminated = 0;
            $employee->terminated_date = null;
        }

        // sync the user types
        $employee->admin()->sync($request->type_lists);

        // sync the employee types
        $employee->employee_type()->sync($request->employee_types);

        // save and exit
        if ($employee->save()) {
            Flash::success("Changes Saved !");
        }

        // return to the original page
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get employee model
        $employee = User::findOrFail($id);

        // delete the content of the employee if required
        File::deleteDirectory(public_path().'/employees/'.$employee->id);

        // make the notification
        if($employee->delete()) {
            Flash::success('Employee removed successfully');
        } else {
            Flash::error('Employee removal failed');
        }

        // return to the all employees page
        return Redirect::to('employee');
    }


    /*
     * Employee Extra Details
     */

    public function getSalarySlip()
    {
        $salaryslips = User::findOrFail(Auth::id())->salaryslip;

        return view('admin.employee.stats.salaryslip', compact('salaryslips'));
    }

    public function getOverTime()
    {
        $overtimes = User::find(Auth::id())->overtimes;

        return view('admin.employee.stats.overtime', compact('overtimes'));

    }

    public function getLoans()
    {
        $loans = User::find(Auth::id())->loans;

        return view('admin.employee.stats.loans', compact('loans'));
    }

    public function getLeaves()
    {

        $leaves = User::find(Auth::id())->leaves;

        return view('admin.employee.stats.leaves', compact('leaves'));

    }

    public function getAttendance()
    {
        $attendances = User::find(Auth::id())->timesheet;

        return view('admin.employee.stats.attendance', compact('attendances'));
    }

    public function getTravel()
    {
        $travels = User::find(Auth::id())->travels;

        return view('admin.employee.stats.travel', compact('travels'));
    }

    public function getAllAttendance()
    {
        $thisMonth = Carbon::today();

        $timeSheets = TimeSheet::with('employee')->whereDate('day', '=', $thisMonth->toDateString())->get();

        return view('admin.employee.overview.getAttendace', compact('timeSheets'));
    }

    public function getSalarySlipInfo($employee, $id)
    {

        $salarySlip = SalarySlip::where('id', $id)->first();

        $current = Carbon::today();

        $startOfMonth = Carbon::now()->startOfMonth();

        $timeSheets = TimeSheet::whereBetween('day', [$startOfMonth->toDateString(), $current->toDateString()])
            ->where('user_id', $salarySlip->user_id)
            ->get();

        $timeSheetsArray = array();

        foreach ($timeSheets as $timeSheet) {
            $timeSheetsArray[] = $timeSheet->id;
        }

        $overTimes = OverTime::whereIn('timesheet_id', $timeSheetsArray)->get();

        $leaves = Leave::whereBetween('created_at', [$startOfMonth, $current])
            ->where('user_id', $salarySlip->user_id)
            ->get();

        $travels = EmployeeTravel::whereBetween('date', [$startOfMonth->toDateString(), $current->toDateString()])
            ->where('user_id', $salarySlip->user_id)
            ->get();

        $epf = EPF::where('user_id', $salarySlip->user_id)
            ->whereBetween('created_at', [$startOfMonth, $current])
            ->first();


        return view('admin.employee.overview.getPayslipOverview', compact('salarySlip', 'overTimes', 'leaves', 'travels', 'epf'));

    }

}
