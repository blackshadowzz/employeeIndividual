<div class="modal fade" id="exampleModal" tabindex="-1"  aria-hidden="true">
     <div class="modal-dialog modal-xl" style="width: 70%">
          <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form action="/employees" method="post" class="" enctype="multipart/form-data">
                         @csrf
                    <div class="row">
                         <div class="col-8">
                              <!-- h -->
                              <div class="">
                                   <label for="" class="form-label">First Name</label>
                                   <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control flex-col" id="first_name" required placeholder="First name...">
                                   @error('first_name')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                                   
                              </div>
                              <div class="mt-2">
                                   <label for="last_name" class="form-label">Last Name</label>
                                   <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control flex-col" id="last_name" required placeholder="Last name...">
                                   @error('last_name')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                                   
                              </div>
                              <div class="row">
                                   <div class="col mt-2">
                                        <label for="dob" class="form-label">Date of birth</label>
                                        <input type="date" name="dob" id="dob" class="form-control" required>
                                        @error('dob')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                   </div>
                         
                                   <div class="col mt-2">
                                        <label for="" class="form-label">Gender</label>
                                        <select name="gender" id="gender" class="form-select" required>
                                             <option value="" style="display: none;">Choose gender</option>
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
                         <div class="col-4">
                              <label for="" class="form-label">Photo</label>
                              <div class="row">
                                   <div class="col-12 d-flex justify-content-center ">
                                        <img src="" alt="profile" id="profile">
                                   </div>
                                   
                                   <input type="file" name="photo" accept="image/*" class="mt-2 form-control">
                              </div>
                         </div>  
                         <div class="row g-3">
                              <div class="col mt-2">
                                   <label for="" class="form-label">Phone</label>
                                   <input type="text" name="phone" value="{{ old('phone') }}" class="form-control flex-col" id="phone" required placeholder="Phone...">
                                   @error('phone')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                                   
                              </div>
                         
                              <div class="col mt-2">
                                   <label for="" class="form-label">Email</label>
                                   <input type="email" name="email" value="{{ old('email') }}" class="form-control flex-col" id="email" required placeholder="Email...">
                                   @error('email')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                              </div>
                              <div class="col mt-2">
                                   <label for="" class="form-label">Position</label>
                                   <select name="position_id" id="position_id"  class="form-control">
                                        <option value="" style="display:none">Choose position</option>
                                        @foreach ($pos as $posi )
                                             <option value="{{ $posi->id }}">{{ $posi->position_name }}</option>
                                        @endforeach
                                   </select>
                                   @error('position_id')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                              </div>
                         
                         </div>
                         <div class="col-12 mt-2">
                              <label for="address" class="form-label">Address</label>
                              <input type="text" name="address" id="address" value="{{ old('address') }}" class="form-control" placeholder="Address">
                              @error('address')
                              <span class="text-danger">{{ $message }}</span>
                                   
                              @enderror
                         </div>   
                         <div class="row mt-2">
                              <div class="col">
                                   <label for="city" class="form-label">City</label>
                                   <input type="text" name="city" id="city" value="{{ old('city') }}" placeholder="City..." required class="form-control">
                                   @error('city')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                              </div>
                              <div class="col">
                                   <label for="province" class="form-label">Province</label>
                                   <input type="text" name="province" id="province" value="{{ old('province') }}" placeholder="Province..." required class="form-control">
                                   @error('province')
                                   <span class="text-danger">{{ $message }}</span>
                                   @enderror
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer mt-2">
                         <button type="submit" style="float: right" class="btn btn-info ">Add New</button>
                    </div>
                         
                         
                    </form>
               </div>
          </div>
          <script>
               let profile= document.querySelector('input[type=file]');
               profile.addEventListener("change",function(e){
                    var img = document.querySelector('#profile');
                    img.setAttribute("src",window.URL.createObjectURL(e.target.files[0]));
                    img.setAttribute("style", "display.block;width:50%;height:150px;object-fit:fill;");
                    output.onload = function(){
                         URL.revokeObjectURL(output.src)
                    }

               });
          </script>
     </div>

     
</div>