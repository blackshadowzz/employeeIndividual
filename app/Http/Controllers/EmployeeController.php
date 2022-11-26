<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmpRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Positions;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $re)
    {
        $emp=Employee::with('Positions')->paginate(5);
        $count= Employee::count();
        if($re->query('search')){
            $emp = Employee::where('first_name','LIKE','%'.$re->query('search').'%')
            ->orWhere('last_name','LIKE','%'.$re->query('search').'%')
            ->orWhere('email','LIKE','%'.$re->query('search').'%')
            ->orWhere('phone','LIKE','%'.$re->query('search').'%')->with('Positions')->paginate(5);
        }
        $pos=Positions::get(['id','position_name']);
            return view('employees.index',compact('emp','pos','count'));
            
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
    public function store(Request $re)
    {
        $emp=$re->except(['_token','photo']);
        $emp['image_path']='';
        if($re->hasFile('photo') && $re->file('photo')->isValid()){
            $image=time().'.'.$re->file('photo')->getClientOriginalExtension();
            $re->file('photo')->storeAs('employees/profile',$image,'public');
            $emp['image_path']=$image;
        }
        if(Employee::create($emp)){
            return redirect('employees')->with('message','Employee one record was created successfully.');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp=Employee::with('Positions')->where('id',$id)->first();
        $pos=Positions::get(['id','position_name']);
        if($emp){
            return view('employees.view')->with(['emp'=>$emp,'pos'=>$pos]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model/s\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$id) return abort(404);
        $emp=Employee::where('id',$id)->first();
        // $task=DB::tabjle('tasks')->find($id);
       $pos=Positions::get(['id','position_name']);
        if($emp)
            return view("employees.update")->with(["emp"=>$emp,'pos'=>$pos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $val=Validator($req->all(),[
            'fname'=>'required|max:100',
            'lname'=>'required|max:100',
            'position_id'=>'required|integer',
        ]);
        if($val->failed()) return back()->withErrors($val);
        $data=$req->except(['_token','_method','id','photo']);
        if($req->hasFile('photo') && $req->file('photo')->isValid()){
            $image=time().'.'.$req->file('photo')->getClientOriginalExtension();
            $req->file('photo')->storeAs('employees/profile',$image,'public');
            $data['image_path']=$image;
        }

        $r=Employee::where('id',$id)->update($data);
        if($r){
            return redirect("employees")
            ->with('message','Done! the record has been updated.!!!');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Employee::where('id',$id)->delete());
        return redirect('employees')
            ->with('message','One record has been delete!');
    }
}
