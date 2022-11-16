<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Models\Positions;
use App\Models\Department;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $re)
    {
        $data=Positions::with('Department')->paginate(8);
        $count=Positions::count();
        if($re->query('search')){
            $data=Positions::where('position_name','LIKE','%'.$re->query('search').'%')
            ->with('Department')->paginate(8);
        }
        
        $dep=Department::get(['id','department_name']);
        return view('positions.index',compact('data','dep','count'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePositionRequest $request)
    {
        $pos=new Positions();
        $pos->position_name=$request->position_name;
        $pos->roll=$request->roll;
        $pos->department_id=$request->department_id;
        if($pos->save()){
            return redirect('positions')
            ->with('message', 'Position new record added successfully.');
        }
        return back()->withInput(['message' => 'Cannot create a new record']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Positions  $positions
     * @return \Illuminate\Http\Response
     */
    public function show(Positions $positions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Positions  $positions
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$id) return abort(404);
        $pos=Positions::where('id',$id)->first();
        if(!$pos){
            return redirect('positions')
            ->with('message','Position not found');
        }
        $dep=Department::get(['id','department_name']);
        return view('positions.update',compact('pos','dep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Positions  $positions
     * @return \Illuminate\Http\Response
     */
    public function update(StorePositionRequest $request, $id)
    {
        $posit=Positions::find($id);
        $posit->position_name=$request->position_name;
        $posit->roll=$request->roll;
        $posit->department_id=$request->department_id;
        if($posit->save()){
            return redirect('positions')
            ->with('message','Position updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Positions  $positions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Positions::where('id',$id)->delete());
        return redirect('positions')
            ->with('message','One record has been delete!');
    }
}
