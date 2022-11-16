@extends('layouts.master')
@section('title','View Employee')
@push('Header')
     View Employee Detail
@endpush
@push('sub_Header')
     view
@endpush
@section('content')
     
    <div class="container">
          <div class="card">
               <div class="card-header">

                         <div class="row">
                              <div class="col-md-8">
                                   <h3>Hello {{ $emp->first_name }} {{ $emp->last_name }}</h3>
                              </div>
                              <div class="col-md-4 d-flex justify-content-end" >
                                   <p class="text-muted">Created {{ $emp->created_at->format('d-M-Y') }} Updated {{ $emp->updated_at->format('d-M-Y') }}</p>
                              </div>
                         </div>
               
               </div>
               <div class="card-body">
                    <div class="row">
                         <div class="col-4">
                              <div class="profile-img">
                                   <img class="rounded-circle" src="/storage/employees/profile/{{ $emp->image_path }}" alt="">
                              </div>
                              <div>
                                   {{-- <table class="table table-striped">
                                        <tr>
                                             <th>ID</th>
                                             <td>{{ $emp->id }}</td>
                                        </tr>
                                   </table> --}}
                              </div>
               
                         </div>
                         <div class="col-8">
                              <div class="table-responsive">
                                   <table class="table table-striped table-hover">
                                        <tbody>
                                             <tr>
                                                  <th>ID</th>
                                                  <td class="code">{{ $emp->id }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Fullname</th>
                                                  <td class="code">{{ $emp->first_name }} {{ $emp->last_name }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Position</th>
                                                  <td>{{ $emp->Positions->position_name }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Date of Birth</th>
                                                  <td>{{ $emp->dob }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Gender</th>
                                                  <td>{{ $emp->gender }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Address</th>
                                                  <td>{{ $emp->address }}, {{ $emp->city }}, {{ $emp->province }}</td>
                                             </tr>
                                             {{-- <tr>
                                                  <th>Province</th>
                                                  <td>{{ $emp->province }}</td>
                                             </tr> --}}
                                             <tr>
                                                  <th>Phone</th>
                                                  <td>{{ $emp->phone }}</td>
                                             </tr>
                                             <tr>
                                                  <th>Email</th>
                                                  <td>{{ $emp->email }}</td>
                                             </tr>

                                        </tbody>
                                        
                                   </table>
                              </div>
                         </div>
                       </div>
               </div>
               <div class="card-footer">
                    <div class="d-flex justify-content-end">
                         <a href="/employees" class="btn btn-info mr-4">Back</a>
                         <a href="/employees/{{ $emp->id }}/edit" class="btn btn-primary">Go To Update</a>
                    </div>
               </div>
          </div>
        
    </div>
@endsection