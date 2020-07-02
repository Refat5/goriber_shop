 @extends('admin.layouts.app') 
 @section('content')
            
                <div class="card col-md-8">
                  <div class="card-body">
                    <h2 class="card-title">Add Brand</h2>
                    <form action="{{route('admin.brands.store')}}" method="post" enctype="multipart/form-data" >
                      @csrf
                      @include("admin.pages.message.validate ")
                   
                    <div class="form-group">
                      <label>Brand Name</label>
                      <input type="text" class="form-control form-control-lg" placeholder="Enter Brand Name" aria-label="Username" name="name">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                     <textarea name="description" rows="5" cols="38"></textarea>
                    </div>

                      
                 
                       <div class="form-group">
                      <label>Image</label>
                      <input type="file" class="form-control "aria-label="Username"name="image" id="image">
                    </div>
                     
                    <button type="submit" class="btn btn-info"> Save</button>

                    </form>
                  </div>
                
                </div>
 @endsection               
              