<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\DepartmentController;
use App\Models\Department;
use App\Models\Positions;
use App\Models\Employee;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostInc;

Route::get('/',function(){
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::resource('employees',EmployeeController::class);
    Route::resource('positions',Positionscontroller::class);
    Route::get('/home',function(Request $re){

        $emp=Employee::with('Positions')->paginate(4);
        if($re->query('search')){
            $emp=Employee::with('Positions')->where('first_name','LIKE','%'.$re->query('search').'%')
            ->orWhere('last_name','LIKE','%'.$re->query('search').'%')
            ->orWhere('email','LIKE','%'.$re->query('search').'%')->paginate(4);
        }

        $count=Positions::all()
        ->count();
        $countdep=Department::all()
        ->count();
        $countemp=Employee::all()
        ->count();
        // $dep=Department::with('Employee')->get();
        return view('home',['count'=>$count,
            'countdep'=>$countdep,'countemp'=>$countemp,
            'emp'=>$emp]);
    });
    Route::resource('departments', DepartmentController::class);
});
