<?php

namespace App\Http\Controllers\Tour;

use App\Models\Tour\Tour;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::orderBy('id', 'DESC')->get();

        return view('admin.tour.index', compact('tours'));
    }
}
