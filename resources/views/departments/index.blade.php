@extends('layouts.master')
@section('title','Department')
@push('Header')
    <h5>Department : {{ $count }}</h5>
@endpush
@push('sub_Header')
     department
@endpush
@section('content')
<div>
     <div>
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
   
        <div class="modal fade" id="exampleModal" tabindex="-1"  aria-hidden="true">
             <div class="modal-dialog modal-xl" style="width: 40%">
                  <div class="modal-content">
                       <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       </div>
                       @include('departments.create')
                  </div>
             </div>
        </div>
     </div>
     <div class="part-search">
        <form action="/departments" method="get">
             <div class="input-group">
                  <span class="input-group-text" id="search-box">Search</span>
                  <input type="search" name="search" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1">
                  <button type="submit" class="btn btn-info">Search</button>
             </div>
        </form>
     </div>
     <div class="part-filter">
        <div class="" style="float: right;">
            
            <a href="/departments/pdf" class="btn btn-success">PRINT</a>
            {{-- <div class="dropdown">
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
            </div> --}}
        </div>
     </div>
    </div>
     <div class="table">
        <table class="table table-bordered table-striped table-hover shadow mt-3 ">
             <thead class="table-dark">
                  <tr>
                       <th>ID</th>
                       <th>Department</th>
                       <th>Description</th>
                       <th>Created Date</th>
                       <th>Updated Date</th>
                       <th>Actions</th>

                  </tr>
             </thead>
             <tbody>
                    @foreach ($data as $dep )
                         <tr>
                              <td>{{ $dep->id }}</td>
                              <td>{{ $dep->department_name }}</td>
                              <td>{{ $dep->description }}</td>
                              <td>{{ $dep->created_at }}</td>
                              <td>{{ $dep->updated_at }}</td>
                              <td>
                                   <form action="/departments/{{$dep->id}}" method="post" class="d-flex justify-content-between">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> |
                                        <a href="/departments/{{$dep->id}}/edit"  class="bi bi-folder-plus"></a> |
                                        {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="" --}}
                                        <a href="/department/{{$dep->id}}" class="bi bi-text-paragraph"></a>
                                   </form>

                              </td>
                         </tr>
                    @endforeach
             </tbody>
        </table>
     </div>
     <div>
          {{ $data->links('pagination::bootstrap-4') }}
     </div>
   </div>
@endsection