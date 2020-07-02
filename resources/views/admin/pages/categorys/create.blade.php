 @extends('admin.layouts.app') 
 @section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header"><h3>{{ __('Add Categoris') }}</h3></div>
                  <div class="card-body">
                   
                    <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data" >
                      @csrf
                      @include("admin.pages.message.validate ")
                   
                    <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">Category Name</label>
                      <div class="col-md-6">
                      <input type="text" class="form-control form-control-lg" placeholder="Enter Category Name" aria-label="Username" name="name">
                    </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">Description</label>
                      <div class="col-md-6">
                     <textarea name="description" rows="5" cols="28"></textarea>
                   </div>
                    </div>

                       <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">Parent Category</label>
                      <div class="col-md-6">
                      <select class="form-control" name="parent_id">
                        <option value=""> Please select a Primary Category</option>
                        @foreach ($main_categories as $category)
                          
                      
                        <option value="{{$category->id}}">{{$category->c_name}}</option>

                         @endforeach 
                      </select>
                    </div>
                    </div>
                 
                       <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">Image</label>
                       <div class="col-md-6">
                      <input type="file" class="form-control "aria-label="Username"name="image" id="image">
                    </div>
                    </div>

                    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                     
                    <button type="submit" class="btn btn-primary"> Save</button>
                  </div>
                </div>

                    </form>
                  </div>
                
                </div>
              </div>
             </div>
             </div> 
 @endsection               
              