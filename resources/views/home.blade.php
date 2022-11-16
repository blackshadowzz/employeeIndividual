@extends('layouts.master')
@section('title', 'Dashboard')
@push('Header')
     <h4>Dashboard</h4>
@endpush
@push('sub_Header')
     dashboard
@endpush
@section('content')
     <div class="row">
          <div class="col-md-4">
               <div class="box-1 shadow bg-primary ">
                    <div class="box-title row align-items-start text-white ">
                         <div class="col-sm-6">Employee</div>
                         <div class="title-icon col-sm-6 text-right">
                              <i class="bi bi-people-fill"></i>
                         </div>

                    </div>
                    <div class="box-body row align-items-end text-white">
                         <div class="box-body-total col-md-6">TOTAL</div>
                         <div class="col-sm-6 text-right">{{ $countemp }}</div>
                    </div>
               </div>
          </div>
          <div class="col-md-4">
               <div class="box-1 shadow bg-success ">
                    <div class="box-title row align-items-start text-white ">
                         <div class="col-sm-6">Position</div>
                         <div class="title-icon col-sm-6 text-right">
                              <i class="bi bi-credit-card-fill"></i>
                         </div>

                    </div>
                    <div class="box-body row align-items-end text-white">
                         <div class="box-body-total col-md-6">TOTAL</div>
                         <div class="col-sm-6 text-right">{{ $count }}</div>
                    </div>
               </div>
          </div>
          <div class="col-md-4">
               <div class="box-1 shadow bg-info ">
                    <div class="box-title row align-items-start text-white ">
                         <div class="col-sm-6">Department</div>
                         <div class="title-icon col-sm-6 text-right">
                              <i class="bi bi-diagram-3-fill"></i>
                         </div>

                    </div>
                    <div class="box-body row align-items-end text-white">
                         <div class="box-body-total col-md-6">TOTAL</div>
                         <div class="col-sm-6 text-right">{{ $countdep }}</div>
                    </div>
               </div>
          </div>
    
     </div>
     
     <div>
          <table class="table table-bordered mt-4">
               <tr>
                    <th>Dep ID</th>
                    <th>Name</th>
                    <th>Pos ID</th>
                    <th>Name</th>
                    <th>Emp ID</th>
                    <th>Name</th>
               </tr>
               {{-- @foreach($dep as $d)
                    <tr>
                         <td>{{ $d->id }}</td>
                         <td>{{ $d->department_name }}</td>
                         <td>{{ $d->Positions->department_id }}</td>
                         <td>{{ $d->Positions->position_name }}</td>
                         <td>{{ $d->id }}</td>
                         <td>{{ $d->id }}</td>
                    </tr>
               @endforeach --}}
          </table>
     </div>
@endsection
