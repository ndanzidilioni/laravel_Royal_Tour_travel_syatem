<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Expense;
use App\Models\Accounts\Expense\SalaryExpense;
use App\Models\Accounts\Income;
use App\Models\Accounts\Income\ReservationIncome;
use App\Models\Accounts\Income\TourIncome;
use App\Models\Accounts\QuickBook;
use App\Models\Employee\SalarySlip;
use App\Models\Rental\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = Income::all();

        $expenses = Expense::all();

        return view('admin.accounts.index', compact('incomes', 'expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $income = Income::whereMonth($id)->first();

        return view('admin.accounts.show', compact('income'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $income = Income::whereMonth($id)->first();

        return view('admin.accounts.edit', compact('income'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getMoreExpense($expense)
    {
        $salaryExpenses = SalaryExpense::whereExpenseId($expense)->get();

        // advertisement expenses tobe calculated

        return view('admin.accounts.viewExpenses', compact('salaryExpenses'));
    }

    public function getMoreIncome($income)
    {
        $reservationIncomes = ReservationIncome::whereIncomeId($income)->get();

        $tourIncomes = TourIncome::whereIncomeId($income)->get();

        // Air ticket incomes to be calculated

        return view('admin.accounts.viewIncomes', compact('reservationIncomes', 'tourIncomes'));
    }

    public function testCalcs()
    {
        $this->calculateExpensePerDay();
    }

    public function calculateExpensePerDay()
    {
        $carbon = Carbon::now();

        $today = $carbon->toDateString();

        $expenseOfDay = 0;

        $expense = Expense::create([
            'day' => $today,
            'expense' => 0
        ]);

        $employeesPayments = SalarySlip::whereDate('month', '=', $today)->get();

        $quickBookExpenses = QuickBook::whereDate('created_at', '=', $today)->where('type', 0)->get();

        foreach ($employeesPayments as $employeesPayment) {

            SalaryExpense::create([
                'user_id' => $employeesPayment->user_id,
                'expense_id' => $expense->id,
                'amount' => $employeesPayment->pay,
                'day' => $today
            ]);

            $expenseOfDay = $expenseOfDay + $employeesPayment->pay;
        }

        foreach ($quickBookExpenses as $quickBookExpense) {
            $expenseOfDay = $expenseOfDay + $quickBookExpense->amount;
        }

        $expense->expense = $expenseOfDay;

        $expense->save();

    }


    public function getGraphsView()
    {
//        $finances = Lava::DataTable();
//
//        $finances->addDateColumn('Year')
//            ->addNumberColumn('Income')
//            ->addNumberColumn('Expenses')
//            ->setDateTimeFormat('Y');

        $carbon = Carbon::now();

        $today = $carbon->toDateString();

        $expenses = Expense::whereDate('day', '=', $today)->get();

        $income = Income::whereDate('month', '=', $today)->get();

//        for ($i = 0; $i < $expenses->count(); $i++) {
//            $finances->addRow([date('Y'), (int)$expenses[$i]->expense, $income[$i]->income]);
//        }


//        $columnchart = Lava::ColumnChart('Finances', $finances, [
//            'title' => 'Company Performance',
//            'titleTextStyle' => [
//                'color' => '#eb6b2c',
//                'fontSize' => 14
//            ]
//        ]);

        $sendArray = array();

        $sendArray2 = array();

        for ($i = 0; $i < $expenses->count(); $i++) {
            $sendArray[] = [$i, (int)$expenses[$i]->expense];
            $sendArray2[] = [$i, (int)$income[$i]->income];
        }

        return view('admin.accounts.graphs', compact('sendArray', 'sendArray2'));
    }

    /**
     * Calculate the income of the day
     */
    public function calculateIncomePerDay()
    {

        $carbon = Carbon::now();

        $today = $carbon->toDateString();

        $inComeOfTheDay = 0;

        // create a income model instance
        // just like creating a row in the income table
        $income = Income::create([
            'month' => $today,
            'income' => 0,
        ]);

        $quickBooks = QuickBook::whereDate('created_at', '=', $today)->where('type', 1)->get();

        // go through reservations and get all reservation created at today (from $today variable)
        $reservations = Reservation::whereDate('created_at', '=', $today)->get();

        // we recieved an collection (means an array of table rows) .. so it is required to loop the
        // go get the values of each one of them ... so we are using a foreach loop
        foreach ($reservations as $reservation) {

            // while looping here we create an new row in the reservations_income table with the details of the
            // $reservation(looped variable)
            // ::create method is a static method in the Parent Model Class, it just creates a row
            // in the relavent table .... in our case its reservation_income
            ReservationIncome::create([
                'income_id' => $income->id,
                'reservation_id' => $reservation->id,
                'amount' => $reservation->payment,
                'date' => $today
            ]);

            // and we add what ever the income to main income variable
            $inComeOfTheDay = $inComeOfTheDay + $reservation->payment;
        }

        foreach ($quickBooks as $quickBook)
        {
            $inComeOfTheDay = $inComeOfTheDay + $quickBook->amount;
        }

        // get All tours
        /*    $tours = Tour::whereDate('created_at', '=', $today)->get();


            foreach ($tours as $tour) {
                // same thing as the previous foreach
                TourIncome::create([
                    'tour_id' => $tour->id,
                    'income_id' => $income->id,
                    // here we are just calling the package[method] (relationship in the Tour model) to get the package
                    // associated with tour.... then gets its ID
                    'amount' => $tour->package->price,
                    'date' => $today
                ]);
            }
        */

        // since we have calucated the income for the day
        // we are saving it to the database
        // like updating the rows$
        $income->income = $inComeOfTheDay;

        $income->save();

    }

}
