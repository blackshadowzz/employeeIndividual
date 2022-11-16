@extends('layouts.master')
@section('title','Update Employee')
@push('Header')
     update employee
@endpush
@push('sub_Header')
     employee
@endpush
@section('content')
     <div>
          <div class="modal-body">
               <form action="/employees/{{ $emp->id }}" method="post" class="" enctype="multipart/form-data">
                    @csrf
                    @method('put')
               <div class="row">
                    <div class="col-9">
                         <!-- h -->
                         <div class="">
                              <label for="" class="form-label">First Name</label>
                              <input type="text" name="first_name" value="{{ $emp->first_name }}" class="form-control flex-col" id="first_name" required placeholder="First name...">
                              @error('first_name')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                         <div class="mt-2">
                              <label for="last_name" class="form-label">Last Name</label>
                              <input type="text" name="last_name" value="{{ $emp->last_name }}" class="form-control flex-col" id="last_name" required placeholder="Last name...">
                              @error('last_name')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                         <div class="row">
                              <div class="col mt-2">
                                   <label for="dob" class="form-label">Date of birth</label>
                                   <input type="date" name="dob" id="dob" value="{{ $emp->dob }}" class="form-control" required>
                                   @error('dob')
                                   <span class="text-danger">{{ $message }}</span>
                                   @enderror
                              </div>
                    
                              <div class="col mt-2">
                                   <label for="" class="form-label">Gender</label>
                                   <select name="gender" id="gender" class="form-select" required>
                                        <option value="{{ $emp->gender }}" style="display: none;">{{ $emp->gender }}</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                   </select>
                                   @error('gender')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                                   
                              </div>
                         </div>
                    </div>
                    <div class="col-3">
                         <label for="" class="form-label">Photo</label>
                         <div class="row">
                              <div class="col-12 d-flex justify-content-center ">
                                   <img class=" justify-content-center" src="/storage/employees/profile/{{ $emp->image_path }}" width="45%" height="150px" alt="profile" id="profile">
                              </div>
                              
                              <input type="file" name="photo" accept="image/*" class="mt-2 form-control">
                         </div>
                    </div> 
               </div> 
                    <div class="row g-3 mt-3 d-flex justify-content-between">
                         <div class="col-4 mt-2">
                              <label for="" class="form-label">Phone</label>
                              <input type="text" name="phone" value="{{ $emp->phone }}" class="form-control flex-col" id="phone" required placeholder="Phone...">
                              @error('phone')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                              
                         </div>
                    
                         <div class="col-4 mt-2">
                              <label for="" class="form-label">Email</label>
                              <input type="email" name="email" value="{{ $emp->email }}" class="form-control flex-col" id="email" required placeholder="Email...">
                              @error('email')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                         </div>
                         <div class="col-4 mt-2">
                              <label for="" class="form-label">Position</label>
                              <select name="position_id" id="position_id"  class="form-control">
                                   <option value="{{ $emp->position_id }}" style="display:none">{{ $emp->Positions->position_name }}</option>
                                   @foreach ($pos as $posi )
                                        <option value="{{ $posi->id }}">{{ $posi->position_name }}</option>
                                   @endforeach
                              </select>
                              @error('position_id')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                         </div>
                    
                    </div>
               
                    <div class=" mt-2">
                         <label for="address" class="form-label">Address</label>
                         <input type="text" name="address" id="address" value="{{ $emp->address }}" class="form-control" placeholder="Address">
                         @error('address')
                         <span class="text-danger">{{ $message }}</span>
                              
                         @enderror
                    </div>   
                    <div class="row mt-2">
                         <div class="col-md-6">
                              <label for="city" class="form-label">City</label>
                              <input type="text" name="city" id="city" value="{{ $emp->city }}" placeholder="City..." required class="form-control">
                              @error('city')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                         </div>
                         <div class="col-md-6">
                              <label for="province" class="form-label">Province</label>
                              <input type="text" name="province" id="province" value="{{ $emp->province }}" placeholder="Province..." required class="form-control">
                              @error('province')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                         </div>
                    </div>
               
               <div class="mt-2 d-flex justify-content-end">
                    <a href="/employees" class="btn btn-info mr-3">Cancel</a>
                    <button type="submit" style="float: right" class="btn btn-primary ">Update Now</button>
               </div>
                    
                    
               </form>
          </div>
          <script>
               let profile= document.querySelector('input[type=file]');
               profile.addEventListener("change",function(e){
                    var img = document.querySelector('#profile');
                    img.setAttribute("src",window.URL.createObjectURL(e.target.files[0]));
                    img.setAttribute("style", "display.block;width:45%;height:150px;object-fit:fill;");
                    output.onload = function(){
                         URL.revokeObjectURL(output.src)
                    }

               });
          </script>
     </div>

@endsection