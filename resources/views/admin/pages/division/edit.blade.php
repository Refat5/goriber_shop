 @extends('admin.layouts.app') 
 @section('content')
            
                <div class="card col-md-8">
                  <div class="card-body">
                    <h2 class="card-title">Update Division</h2>
                    <form action="{{route('admin.division.update',$division->id)}}" method="post" >
                      @csrf
                      @include("admin.pages.message.validate ")
                   
                    <div class="form-group">
                      <label>Divison Name</label>
                      <input type="text" class="form-control form-control-lg" aria-label="Username" name="name" value="{{$division->d_name}}">
                    </div>

                     <div class="form-group">
                      <label>Priority</label>
                      <input type="text" class="form-control form-control-lg" aria-label="Username" name="priority" value="{{$division->d_priority}}">
                    </div>
                  

                    
                     
                    <button type="submit" class="btn btn-info"> Update</button>

                    </form>
                  </div>
                
                </div>
 @endsection               
              