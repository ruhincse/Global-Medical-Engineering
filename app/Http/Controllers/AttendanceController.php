<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workingplace;
use App\Models\Designation;
use App\UserLeaveAllocate;
use App\Models\Department;
use App\Models\Employment;
use App\Models\Division;
use App\Models\Leave;
use App\UserProfile;
use App\SalarySettings;
use App\User;
use Storage;
use DB;

class AttendanceController extends Controller
{
    public function index()
    {
        $users           = User::all(); //get user data
       return view('attendance.attendance',compact('users'));
    }
}
