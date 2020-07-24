 @extends('admin.layouts.app') 
 @section('content')
            <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card">
                  <div class="card-body">
                    <h2 class="card-title">Add District</h2>
                    <form action="{{route('admin.district.store')}}" method="post"  >
                      @csrf
                      @include("admin.pages.message.validate ")

                       <div class="form-group">

                    <label>Select A Division For this District</label>
                      <select class="form-control" name="division_id">
                        <option value=""> Please select a District</option>
                        @foreach ($divisions as $division)
                          
                      
                        <option value="{{$division->id}}">{{$division->d_name}}</option>

                         @endforeach 
                      </select>
                    </div>
                   
                    <div class="form-group">
                      <label>District Name</label>
                      <input type="text" class="form-control form-control-lg" placeholder="Enter District Name" aria-label="Username" name="name">
                    </div>
                   

     
                     
                    <button type="submit" class="btn btn-info"> Save</button>

                    </form>
                  </div>
                
                </div>
              </div>
            </div>
          </div>
          
 @endsection               
              