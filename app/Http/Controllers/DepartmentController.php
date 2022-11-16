<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Positions;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $re)
    {
        $data=Department::paginate(8);
        $count=Department::count();
        if($re->query('search')){
            $data=Department::where('department_name','LIKE','%'.$re->query('search').'%')->paginate(8);
        }
            return View('departments.index',compact('data','count'));
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
        $val=Validator($request->all(),[
            'department_name'=>'required|max:3',
            'description'=>'required|max:200',

        ]);
        if($val->failed()) return back()->withErrors($val);
        $data=$request->except(['_token']);
        Department::create($data);
        if($data){
            return redirect('departments')->with('message', 'Departments was created successfully');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$id) return abort(404);
        $dep=Department::where('id',$id)->first();
        // $task=DB::table('tasks')->find($id);
        if($dep)
            return view("departments.update")->with('dep',$dep);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $val=Validator($request->all(),[
            'department_name'=>'required|max:100',
            'description'=>'required|max:100',
        ]);
        if($val->failed()) return back()->withErrors($val);
        $data=$request->except(['_token','_method','id']);
        $r=Department::where('id',$id)->update($data);
        if($r){
            return redirect("departments")
            ->with('message','Done! the record has been updated.!!!');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Department::where('id',$id)->delete());
        return redirect('departments')
            ->with('message','One record has been delete!');
    }
}
