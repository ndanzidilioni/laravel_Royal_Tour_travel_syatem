<?php

namespace App\Http\Controllers\Employee\General;

use App\Http\Controllers\Controller;
use App\Models\Employee\AdvancePayment;
use App\Models\Employee\Leave;
use App\Models\Employee\LeaveTypes;
use App\Models\Employee\Loan;
use App\Models\Employee\LoanType;
use App\Models\Employee\NoPay;
use App\User;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Redirect;

class Additional extends Controller
{
    public function getAddLoan()
    {
        $loan_name_lists = LoanType::pluck('name', 'id');

        $employee_names = User::pluck('name', 'id');

        return view('admin.employee.various.loans.create', compact('loan_name_lists', 'employee_names'));
    }

    public function postAddLoan(Request $request)
    {
        $this->validate($request, [
            'loan_name_lists' => 'required',
            'amount' => 'required'
        ]);

        $loanType = LoanType::findOrFail($request->loan_name_lists);

        Loan::create([
            'loan_type_id' => $request->loan_name_lists,
            'user_id' => $request->employee_names,
            'amount' => $request->amount,
            'remaining' => $request->amount,
            'decrement' => $request->decrement,
            'paytime' => $loanType->installment
        ]);

        Flash::success('Loan added to user !');

        return Redirect::back();
    }

    public function getLeaveView()
    {
        $leave_type_lists = LeaveTypes::pluck('name', 'id');

        $employee_names = User::pluck('name', 'id');

        return view('admin.employee.various.leaves.create', compact('leave_type_lists', 'employee_names'));
    }

    public function postAddLeave(Request $request)
    {

        $user = User::findOrFail($request->employee_names);

        $this->validate($request, [
            'leave_type_lists' => 'required',
            'employee_names' => 'required',
            'reason' => 'required'
        ]);

        Leave::create([
            'leavetype_id' => $request->leave_type_lists,
            'user_id' => $user->id,
            'reason' => $request->reason,
            'time' => Carbon::now()->toDateTimeString()
        ]);

        if($user->leaves->count() >= 35) {
            NoPay::create([
                'user_id' => $user->id,
                'day' => Carbon::now()->toTimeString()
            ]);

            Flash::warning("Employee is now on NoPay !");
        }

        Flash::success("Leave added to employee");

        return Redirect::back();

    }

    public function getAdvancePayView()
    {
        $employee_names = User::pluck('name', 'id');

        return view('admin.employee.various.advance.create', compact('employee_names'));
    }

    public function postAdvancePayView(Request $request)
    {
        $this->validate($request, [
            'employee_names' => 'required',
            'amount' => 'required'
        ]);

        AdvancePayment::create([
            'user_id' => $request->employee_names,
            'amount' => $request->amount,
            'month' => date('Y-m-d')
        ]);

        Flash::success('Advance payment added to employee');

        return Redirect::back();

    }
}
