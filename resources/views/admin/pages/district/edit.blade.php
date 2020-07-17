 @extends('admin.layouts.app') 
 @section('content')
             <div class="container">
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-8">
                <div class="card">
                  <div class="card-body">
                    <h2 class="card-title">Update District</h2>
                    <form action="{{route('admin.district.update',$district->id)}}" method="post"  >
                      @csrf
                      @include("admin.pages.message.validate ")
                   
                    <div class="form-group">
                      <label>District Name</label>
                      <input type="text" class="form-control form-control-lg" aria-label="Username" name="name" value="{{$district->ds_name}}">
                    </div>
                    <div class="form-group">

                    <label>Select A Division For this District</label>
                      <select class="form-control" name="division_id">
                        <option value=""> Please select a District</option>
                        @foreach ($divisions as $division)
                          
                      
                        <option value="{{$division->id}}"{{$district->division->id == $division->id ? 'selected' :''}}>{{$division->d_name}}</option>

                         @endforeach 
                      </select>
                    </div>

     
                     
                    <button type="submit" class="btn btn-info"> Update</button>

                    </form>
                  </div>
                
                </div>
              </div>
            </div>
          </div>
 @endsection               
              