<?php

namespace App\Http\Controllers;

use App\User;

class AjaxController extends Controller
{
    public function getEmployeeByNames($name)
    {
        return User::whereName($name)->get()->toJson();
    }
}
