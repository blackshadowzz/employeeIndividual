@extends('layouts.master')
@section('title','Update Department')
@push('Header')
     <h4>Update Department</h4>
@endpush
@push('sub_Header')
     department
@endpush
@section('content')
<div class="">
     <form action="/departments/{{ $dep->id }}" method="post" class="" enctype="multipart/form-data">
          @csrf
          @method('put')
     <div class="">
          <div class="">
               <!-- h -->
               <div class="">
                    <label for="name" class="form-label">Department Name</label>
                    <input type="text" value="{{ $dep->department_name }}" name="department_name" class="form-control flex-col" id="name" required placeholder="Department name...">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                         
                    @enderror
                    
               </div>
               <div class="mt-2">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" value="{{ $dep->description }}" name="description" class="form-control flex-col" id="description" required placeholder="Department...">
                    @error('lname')
                    <span class="text-danger">{{ $message }}</span>
                         
                    @enderror
                    
               </div>
          
          </div>
     </div>
     <div class="d-flex justify-content-end mt-3">
          <a href="/departments" class="btn btn-info mr-3">Cancel</a>
          <button type="submit" style="float: right" class="btn btn-primary">Update New</button>
     </div>
          
          
     </form>
</div>
@endsection