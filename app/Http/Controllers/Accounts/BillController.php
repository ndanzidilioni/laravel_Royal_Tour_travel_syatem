<?php

namespace App\Http\Controllers\Accounts;

use App\Models\Accounts\Bills;
use App\Models\Accounts\BillsType;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billTypes = BillsType::pluck('name', 'id')->all();

        $monthStart = Carbon::now()->startOfMonth();

        $today = Carbon::today();

        $bills = Bills::whereBetween('date', [$monthStart->toDateString(), $today->toDateString()])->with('billType')->get();

        return view('admin.accounts.bills.index', compact('bills', 'billTypes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $today = Carbon::today();

        $types = BillsType::pluck('name', 'id')->all();

        return view('admin.accounts.bills.create', compact('today', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'bill_no' => 'required|min:3',
            'amount' => 'required'
        ]);

        Bills::create([
            'billtype_id' => $request->type,
            'bill_no' => $request->bill_no,
            'amount' => $request->amount,
            'date' => Carbon::today()->toDateTimeString()
        ]);

        Flash::success('Bill has added !');

        return Redirect::to('/system/accounts/bill');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $bill = Bills::findOrFail($id);

        $types = BillsType::pluck('name', 'id');

        return view('admin.accounts.bills.edit', compact('bill', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)

    {
        $this->validate($request, [
            'type' => 'required',
            //'bill_no' => 'required|min:0|max:30',
            //'amount' => 'required|integer|min:0',
            'date' => 'required|date:d/m/Y|before:now'
        ]);

        $bill = Bills::findOrFail($id);

        $bill->billtype_id = $request->type;
        $bill->date = $request->date;

        if($bill->save()) {
            Flash::success('Bill Saved Successfully');
        } else {
            Flash::error('Bill Save Failed :( ');
        }

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
        $bill = Bills::findOrFail($id);

        if($bill->delete()) {
            Flash::success('Bill Removed Successfully !');
        } else {
            Flash::error('Bill could not be removed !!!');
        }

        return Redirect::to('/system/accounts/bill');

    }
}
