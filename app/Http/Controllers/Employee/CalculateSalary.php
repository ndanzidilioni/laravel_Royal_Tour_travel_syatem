<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee\EPF;
use App\Models\Employee\PayeTax;
use App\Models\Employee\SalarySlip;
use App\User;
use Carbon\Carbon;

class CalculateSalary extends Controller
{
    public function calculateSalaray($employeeID)
    {

        $user = User::findOrFail($employeeID);

        $basicSalary = $user->basic;

        $epf = ($basicSalary * 8) / 100;

        $payeTax = 0;
        if ($basicSalary <= 62500) {

            // No payeetax
        } else {
            switch (true) {
                case ($basicSalary > 62500):
                    $payeTax = $basicSalary * 0.25;
                    break;
                case ($basicSalary >= 104167):
                    $payeTax = ($basicSalary * 8) / 100;
                    break;
                case ($basicSalary >= 145833):
                    $payeTax = ($basicSalary * 12) / 100;
                    break;
                case ($basicSalary >= 187500):
                    $payeTax = ($basicSalary * 16) / 100;
                    break;
                default:
                    $payeTax = 0;
            }
        }

        $currentMonth = Carbon::now()->startOfMonth();

        $currentYear = Carbon::now()->year;

        $timesheets = $user->timesheet()->with('overtime')->where('day', '>=', $currentMonth)->get();

        $travels = $user->travels()->where('date', '>=', $currentMonth)->get();

        $leaves = $user->leaves()->where('time', '>=', $currentYear)->get();

        $loans = $user->loans()->where('paytime', '!=', 0)->get();

        $advances = $user->advance()->where('month', '>=', $currentMonth)->get();

        $otPay = 0;
        foreach ($timesheets as $timesheet) {
            foreach ($timesheet->overtime as $overtime) {
                $otPay += $overtime->pay;
            }
        }

        $loanDeductions = 0;
        foreach ($loans as $loan) {
            if ($loan->paytime != 0) {
                if (($loan->remaining - $loan->decrement) <= 0) {
                    //dd(($loan->remaining - $loan->decrement));
                    $loanDeductions += $loan->decrement + (($loan->decrement * $loan->type->rate) / 100);
                    $loan->remaining = ($loan->decrement - $loan->decrement);
                    $loan->paytime = 0;
                    $loan->save();
                } else {
                    $loanDeductions += $loan->decrement + (($loan->decrement * $loan->type->rate) / 100);
                    $loan->remaining = ($loan->amount - $loan->decrement);
                    $loan->paytime = $loan->paytime - 1;
                    $loan->save();
                }
            }
        }

        $noPay = 0;
        if ($leaves->count() >= 35) {

            // if leaves are greater than 35, then check and get the count of no pay days
            $numOfDays = $user->nopay()->get()->count();

            // grab the days count
            $daysinMonth = Carbon::now()->daysInMonth;

            // pay per day
            $typicalPPD = $basicSalary / $daysinMonth;

            // no pay amount
            $noPay = $typicalPPD * $numOfDays;
        }

        $travelPay = 0;
        foreach ($travels as $travel) {
            $travelPay += $travel->amount;
        }

        $advancePay = 0;
        foreach ($advances as $advance) {
            if($advance->done != 0) {
                $advancePay += $advance->amount;
                $advance->done = 1;
                $advance->save();
            }
        }

        $payOfMonth = ($basicSalary + $otPay + $travelPay) - ($loanDeductions + $advancePay + $noPay + $epf + $payeTax);

        //dd($basicSalary, $otPay, $travelPay, $loanDeductions, $advancePay, $noPay, $epf, $payeTax);

        SalarySlip::create([
            'user_id' => $user->id,
            'month' => date('Y-m-d'),
            'pay' => $payOfMonth
        ]);

        EPF::create([
            'user_id' => $user->id,
            'amount' => $epf,
            'month' => $currentMonth->toDateString()
        ]);

        PayeTax::create([
            'user_id' => $user->id,
            'amount' => $payeTax,
            'month' => $currentMonth->toDateString()
        ]);

    }
}
