 @extends('admin.layouts.app') 
 @section('content')
            
                <div class="card col-md-8">
                  <div class="card-body">
                    <h2 class="card-title">Add Division</h2>
                    <form action="{{route('admin.division.store')}}" method="post" enctype="multipart/form-data" >
                      @csrf
                      @include("admin.pages.message.validate ")
                   
                    <div class="form-group">
                      <label>Divison Name</label>
                      <input type="text" class="form-control form-control-lg" placeholder="Enter Divison Name" aria-label="Username" name="name">
                    </div>

                     <div class="form-group">
                      <label>Priority</label>
                      <input type="text" class="form-control form-control-lg" placeholder="Enter priority " aria-label="Username" name="priority">
                    </div>
                  

                    
                     
                    <button type="submit" class="btn btn-info"> Save</button>

                    </form>
                  </div>
                
                </div>
 @endsection               
              