<div class="modal-body">
     <form action="/departments" method="post" class="" enctype="multipart/form-data">
          @csrf
     <div class="">
          <div class="">
               <!-- h -->
               <div class="">
                    <label for="name" class="form-label">Department Name</label>
                    <input type="text" name="department_name" class="form-control flex-col" id="name" required placeholder="Department name...">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                         
                    @enderror
                    
               </div>
               <div class="mt-2">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control flex-col" id="description" required placeholder="Department...">
                    @error('lname')
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