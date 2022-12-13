<?php

namespace App\Http\Controllers\Accounts;

use App\Models\Accounts\BillsType;
use Flash;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;

class BillTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billTypes = BillsType::all();

        return view('admin.accounts.bills.billtypes.index', compact('billTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $billTypes = BillsType::all();

        return view('admin.accounts.bills.billtypes.create', compact('billTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:bills_types,name'
        ]);

        BillsType::create([
            'name' => $request->name
        ]);

        Flash::success('New Bill Type has been added to syetem !');

        return Redirect::to('system/accounts/bill/type');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $billtype = BillsType::findOrFail($id);

        return view('admin.accounts.bills.billtypes.edit', compact('billtype'));
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
            'name' => 'required|unique:bills_types,name'
        ]);

        $billtype = BillsType::findOrFail($id);

        $billtype->name = $request->name;

        if($billtype->save()) {
            Flash::success('Changes saved !');
        } else {
            Flash::error('Could make the changes !');
        }

        return Redirect::back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
