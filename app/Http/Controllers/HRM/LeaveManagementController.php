<?php

namespace App\Http\Controllers\HRM;

use App\User;
use App\Models\Leave;
use App\Models\LeaveUsed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LeaveManagementController extends Controller
{
    public function __construct()
    {

    }

    /**
     * LeaveManagement Initial View
     * @return view
     */
    public function index()
    {
        $leaveList=DB::table('leave_useds')
                    ->join('users','leave_useds.user_id','=','users.id')
                    ->join('leaves','leave_useds.leave_id','=','leaves.id')
                    ->select('leave_useds.*','users.name','leaves.title')
                    ->paginate(10);
        return view('leavemanage.index',compact('leaveList'));
    }

    public function createview()
    {
        return view('leavemanage.create');
    }

    public function userSearch(Request $request)
    {
        $query=$request->get('query');
        $data = User::where('name','LIKE',"%{$query}%")->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative;">';
        foreach($data as $row)
        {
         $output .= '
         <li class="list-group-item list-group-item-action"><a href="#" style="color:black">'.$row->name.'</a><input type="hidden" id="name_id" name="name_id" value="'.$row->id.'"/></li>
         ';
        }
        $output .= '</ul>';
        return response()->json($output,201);
    }

    public function leaveSearch(Request $request)
    {
        $leave_array=[];
        $userid= $request->get('userId');
        $data = User::with('leaves')->where('id',$userid)->get();
        foreach($data as $leave)
        {
            
                $leave_array= $leave;
           
        }
        return $leave_array;
    }

    public function leaveCalculate(Request $request)
    {
        $days=$request->days;
        $leave_type=$request->leave_type;
        $user_id=$request->user_id;
       
        $data=DB::table('leave_useds')
                    ->where('user_id',$user_id)
                    ->where('leave_id',$leave_type)
                    ->sum('days_no');
        $leave_data = Leave::where('id',$leave_type)->get();
        $leave_amount=$leave_data[0]->number_of_days;
        return response()->json(['used_total_days'=>$data,'total_days'=>$leave_amount]);

    }


    public function store(Request $request)
    {
       $request->validate([
            'name_id'=>'required',
            'userSearch'=>'required',
            'paid'=>'required',
            'fromdate'=>'required',
            'todate'=>'required'
       ],[
           'userSearch.required'=>'Search and Select an User',
           'paid.required'=>'Select a mode',
           'fromdate.required'=>'Search From Date',
           'todate.required'=>'Select To Date',

       ]);
        //return $request->all();
       $leaveused=new LeaveUsed;
       $leaveused->user_id=$request->name_id;
       if($request->paid=='paid')
       {
        $request->validate([ 
            'leave_type'=>'required',   
       ],[       
           'leave_type.required'=>'Select a Leave Type',
       ]);

       $leaveused->leave_id=$request->leave_type;
       }
       $leaveused->from_date= date('Y-m-d',strtotime($request->fromdate));
       $leaveused->to_date=date('Y-m-d',strtotime($request->todate));
       $leaveused->remarks=$request->remarks;
       $leaveused->days_no=$request->days_no;

       $leaveused->save();
       return redirect()->route('leavem.index');
    }
}
