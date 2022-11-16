@extends('layouts.master')
@push('Header')
     <h5>Update Position</h5>
@endpush
@push('sub_Header')
     position
@endpush
@section('title','Update Position')
@section('content')
     <div>
          <div class="modal-body">
               <form action="/positions/{{ $pos->id }}" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    @method('put')
               <div class="row">
                    <div class="col-12">
                         <!-- h -->
                         <div class="">
                              <label for="position_name" class="form-label">Position Name</label>
                              <input type="text" name="position_name" class="form-control flex-col" id="position_name" value="{{ $pos->position_name }}" required placeholder="Position name...">
                              @error('position_name')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                         <div class="mt-2">
                              <label for="roll" class="form-label" class="form-label">Roll</label>
                              <select name="roll" id="roll" class="form-select">
                                   <option value="{{ $pos->roll }}" style="display: none;">{{ $pos->roll }}</option>
                                   <option value="Admin">Admin</option>
                                   <option value="Employee">Employee</option>
                                   <option value="Manager">Manager</option>
                              </select>
                              @error('roll')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                         <div class="mt-2">
                              <label for="department_id" class="form-label">Department</label>
                              <select name="department_id" id="" class="form-control">
                                   <option value="{{ $pos->department_id }}" style="display: none;">{{ $pos->Department->department_name }}</option>
                                   @foreach($dep as $deps)
                                        <option value="{{$deps->id}}">{{$deps->department_name}}</option>
                                   @endforeach
                                   @error('department_id')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror

                              </select>
                         
                         
                         </div>
                    </div>

               </div>
               <div class="modal-footer d-flex justify-content-end mt-2">
                    <a href="/positions" class="btn btn-info mr-3">Cancel</a>
                    <button type="submit" style="float: right" class="btn btn-primary ">Update Now</button>
               </div>
                    
                    
               </form>
          </div>
     </div>
@endsection