 @extends('admin.layouts.app') 
 @section('content')
            
                <div class="card col-md-8">
                  <div class="card-body">
                    <h2 class="card-title">Add Categoris</h2>
                    <form action="{{route('admin.category.update',$scategory->id)}}" method="post" enctype="multipart/form-data" >
                      @csrf
                      @include("admin.pages.message.validate ")
                   
                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" class="form-control form-control-lg" placeholder="Enter Category Name" aria-label="Username" name="name" value="{{$scategory->c_name}}">
                    </div>
                    <div class="form-group">
                      <label>Description(Optional)</label>
                     <textarea name="description" rows="5" cols="38">{{$scategory->c_description}}</textarea>
                    </div>

                       <div class="form-group">
                      <label>Parent Category(Optional)</label>
                      <select class="form-control" name="parent_id">
                   
                        @foreach ($main_categories as $cat)
                         
                        <option value="{{$cat->id}}" {{ $cat->id == $scategory->c_parent_id ? 'selected' : ''}}>{{$cat->c_name}}</option>

                         @endforeach 
                      </select>
                    </div>
                 
                       <div class="form-group">
                      <label>Old Image</label><br>
                      <img src="{{asset('images/categoris/'.$scategory->c_image)}}" width="100"><br><br>
                      <label>New Image(Optional)</label>

                      <input type="file" class="form-control "aria-label="Username"name="image" id="image">
                    </div>
                     
                    <button type="submit" class="btn btn-info"> Update</button>

                    </form>
                  </div>
                
                </div>
 @endsection               
              