<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserEmploymentHistory;
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

class SalaryController extends Controller
{
    public function index()
    {
        $salarydata      = DB::table('users')
                        ->leftJoin('salary_settings','salary_settings.user_id','=','users.id')
                        ->select('users.name','users.id','users.email','users.password',
                        'salary_settings.total_salary','salary_settings.basic_salary','salary_settings.house_rent','salary_settings.provident_fund','salary_settings.dinning_allowances','salary_settings.medical_allowances','salary_settings.transport_allowances','salary_settings.mobile_allowances')
                        ->get();
        $users           = User::all(); //get user data
       return view('salary.salarysettings',compact('salarydata','users'));
    }
    public function store(Request $request)
    {
        // dd($request);
        $salarysettings = new SalarySettings;
        $salarysettings->user_id     = $request->user_id;
        $salarysettings->total_salary     = $request->total_salary;
        $salarysettings->basic_salary     = $request->basic_salary;
        $salarysettings->house_rent     = $request->house_rent;
        $salarysettings->provident_fund     = $request->provident_fund;
        $salarysettings->dinning_allowances     = $request->dinning_allowances;
        $salarysettings->medical_allowances     = $request->medical_allowances;
        $salarysettings->transport_allowances     = $request->transport_allowances;
        $salarysettings->mobile_allowances     = $request->mobile_allowances;
        // dd($salarysettings);
        $salarysettings->save();
        return redirect()->route('salary.index')
        ->with('success','Salary set successfully.');  //redirect user index page with success meg
    }
}
