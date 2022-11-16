<div class="">
     <div class="row mb-2" >
          <div class="col-1">
               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="">Add New</button>
          </div>
       <div class="col-9">

          <form action="/positions" method="get">
               <div class="input-group ">
                    <span class="input-group-text" id="search-box">Search</span>
                    <input type="search" name="search" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1">
                    <button type="submit" class="btn btn-info">Search</button>
               </div>
          </form>
          
          
       </div>
       <div class="col-2 d-flex justify-content-end ">
          <a href="" class="btn btn-info">Print PDF</a>
       </div>
       {{-- <div class="col-1">
          <div class="d-flex justify-content-end">
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
       </div> --}}
     </div>
</div>
{{-- form create --}}
<div class="modal fade" id="exampleModal" tabindex="-1"  aria-hidden="true">
     <div class="modal-dialog modal-xl" style="width: 50%">
          <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add Position</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form action="/positions" method="post" class="" enctype="multipart/form-data">
                         @csrf
                    <div class="row">
                         <div class="col-12">
                              <!-- h -->
                              <div class="">
                                   <label for="position_name" class="form-label">Position Name</label>
                                   <input type="text" name="position_name" class="form-control flex-col" id="position_name" value="{{ old('position_name') }}" required placeholder="Position name...">
                                   @error('position_name')
                                   <span class="text-danger">{{ $message }}</span>
                                        
                                   @enderror
                                   
                              </div>
                              <div class="mt-2">
                                   <label for="roll" class="form-label" class="form-label">Roll</label>
                                   <select name="roll" id="roll" class="form-select">
                                        <option value="" style="display: none;">Choose roll</option>
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
                                        <option value="" style="display: none;">Choose Department</option>
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
                    <div class="modal-footer mt-2">
                         <button type="submit" style="float: right" class="btn btn-info ">Add New</button>
                    </div>
                         
                         
                    </form>
               </div>
          </div>
     </div>
</div>
