<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Knp\Snappy\Pdf;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return \PDF::loadView('admin.employee.pdf.test')->inline();

        return view('home');
    }

    public function getDashBoard()
    {
        return view('admin.dashboard');
    }

    public function getRentalDashBoard()
    {
        return view('admin.Rental.RentalDashboard');
    }
}

