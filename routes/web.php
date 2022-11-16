<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\DepartmentController;
use App\Models\Department;
use App\Models\Positions;
use App\Models\Employee;
use PhpParser\Node\Expr\PostInc;

Route::get('/',function(){
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::resource('employees',EmployeeController::class);
    Route::resource('positions',Positionscontroller::class);
    Route::get('/home',function(){
        $count=Positions::all()
        ->count();
        $countdep=Department::all()
        ->count();
        $countemp=Employee::all()
        ->count();
        // $dep=Department::with('Employee')->get();
        return view('home',['count'=>$count,
            'countdep'=>$countdep,'countemp'=>$countemp]);
    });
    Route::resource('departments', DepartmentController::class);
});
