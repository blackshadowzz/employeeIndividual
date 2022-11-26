@extends('layouts.master')
@section('title', 'Employee')
@push('Header')
     <h5>Employee : {{ $count }}</h5>
@endpush
@push('sub_Header')
     employee
@endpush

@section('content')
<div>
     <div class="">
          @if(Session::has('message'))
          <div class="alert alert-info alert-dismissible fade show" role="alert">
               {{Session::get('message')}}
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
     </div>
 <div class="d-flex justify-content-between">
  <div class="part-create">
     <button type="button" class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="">Add New</button>

     @include('employees.create')
  </div>
  <div class="part-search">
     <form action="/employees" method="get">
          <div class="input-group">
               <span class="input-group-text" id="search-box">Search</span>
               <input type="search" name="search" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1">
               <button type="submit" class="btn btn-info">Search</button>
          </div>
     </form>
  </div>
  <div class="part-filter">
     <div class="" style="float: right;">
          <div class="dropdown">
               <button class="btn btn-md btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                       <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
                   </svg>
                   Filter
               </button>
               <ul class="dropdown-menu">
               <li><a class="dropdown-item" href="">IT</a></li>
               <li><a class="dropdown-item" href="">Marketing</a></li>

               </ul>
           </div>
     </div>
  </div>
 </div>
  <div class="table">
     <table class="table table-sm table-striped table-hover shadow mt-3 ">
          <thead class="table-dark">
               <tr>
                    <th>Fullname</th>
                    <th>Gender</th>
                    <th>DoB</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Province</th>
                    <th>Position</th>
                    <th style="width: 9%">Actions</th>
               </tr>
          </thead>
          <tbody>

               @foreach ($emp as $em )
               <tr>
                    
                    <td>
                         <div class="d-flex align-items-center">
                           <img
                               src="/storage/employees/profile/{{ $em->image_path }}"
                               alt=""
                               style="width: 80px; height: 80px"
                               class="rounded-circle"
                               />
                           <div class="ms-3">
                             <p class="fw-bold mb-1">{{ $em->first_name }} {{ $em->last_name }}</p>
                             <p class="text-muted mb-0">{{ $em->email }}</p>
                           </div>
                         </div>
                       </td>
                    <td>{{ $em->gender }}</td>
                    <td>{{ $em->dob }}</td>
                    <td>{{ $em->phone }}</td>
                    <td>{{ $em->address }}</td>
                    <td>{{ $em->city }}</td>
                    <td>{{ $em->province }}</td>
                    {{-- <td>{{ $em->position_id }}</td> --}}
                    <td>{{ $em->Positions->position_name }}</td>
                    {{-- <td style="width: 50px">
                         <img class="rounded-circle" src="/storage/employees/profile/{{ $em->image_path }}" width="75px" height="75px" alt="image" >
                    </td> --}}
                    <td>
                         <form action="/employees/{{$em->id}}" method="post" class="d-flex justify-content-between">
                              @csrf
                              @method('DELETE')
                              <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> |
                              <a href="/employees/{{$em->id}}/edit"  class="bi bi-folder-plus"></a> |
                              {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="" --}}
                              <a href="/employees/{{$em->id}}" class="bi bi-text-paragraph"></a>
                         </form>
                    </td>
                    
               </tr>
                    
               @endforeach

          </tbody>
     </table>
  </div>
  <div class="d-flex justify-content-end">
     {{ $emp->links('pagination::bootstrap-4') }}
  </div>
</div>
@endsection