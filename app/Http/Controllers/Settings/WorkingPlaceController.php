<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Workingplace;
use DB;

class WorkingPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $workingplaces= Workingplace::all();
        $divisions = Division::all();
        // dd($divisions);
        $workingplaces=DB::select("SELECT working_places.id, working_places.name, working_places.code, working_places.divison_id, working_places.description,divisions.name as dname FROM working_places INNER JOIN divisions on working_places.divison_id=divisions.id");
        
        return view('settings.working_places.working_places',compact('workingplaces','divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required|unique:working_places',
            'divison_id'=>'required',
        ]);
            
        Workingplace::create($request->all());

        return redirect()->route('workingplace.index')
        ->with('success','Working Place create successfully.');
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        Workingplace::findOrFail($request->id)->update($request->all());
        return redirect()->route('workingplace.index')
                        ->with('success', 'Workingplace Update  successfully .');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Workingplace::findOrFail($request->id)->Delete($request->all());
        return redirect()->route('workingplace.index')
                        ->with('success', 'Workingplace Delete  successfully .');
    }
}
