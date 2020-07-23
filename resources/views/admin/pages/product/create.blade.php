 @extends('admin.layouts.app') 
 @section('content')
            <div class="container">
    <div class="row justify-content-center">
                <div class="card col-md-8">
                  <div class="card-body">
                    <h2 class="card-title">Add Product</h2>
                    <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data" >
                      @csrf
                      @include("admin.pages.message.validate ")
                  <div class="form-row">
                    <div class="col">
                      <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control form-control-lg" placeholder="Enter Title" aria-label="Username" name="p_title">
                    </div>
                    </div>
                     <div class="col">
                       <div class="form-group">
                      <label>Price</label>
                      <input type="number" class="form-control form-control-sm" placeholder="Enter Price" aria-label="Username"name="p_price">
                    </div>
                    </div>
                  </div> 
                    <div class="form-row">
                    <div class="col">
                    
                      <div class="form-group">
                      <label>Quantity</label>
                      <input type="number" class="form-control form-control-sm" placeholder="Enter Quantity" aria-label="Username"name="p_quantity">
                    </div>
                    </div>
                     <div class="col">
                         <div class="form-group">
                      <label>Category</label>
                     <select class="form-control" name="category_id">
                      <option value="">Please Select a category for the product</option>
                       @foreach (App\Category::orderBy('c_name','asc')->where('c_parent_id',NULL)->get() as $category)
                       <option value="{{ $category->id}}">{{$category->c_name}} </option>

                        @foreach(App\Category::orderBy('c_name','asc')->where('c_parent_id',$category->id)->get() as $child)
                         <option value="{{ $child->id}}">------->{{ $child->c_name}}</option>
                         @endforeach
                         @endforeach
                     </select>
                    </div>
                    </div>
                  </div> 

                    

                    <div class="form-row">
                      <div class="col">
                         <div class="form-group">
                      <label>Brand</label>
                     <select class="form-control" name="brand_id">
                      <option value="">Please Select a Brand for the product</option>
                        @foreach(App\Brand::orderBy('b_name','asc')->get() as $brand)
                         <option value="{{ $brand->id}}">{{ $brand->b_name}}</option>
                         
                         @endforeach
                     </select>
                    </div>
                      
                      </div>
                      <div class="col">
                        <div class="form-group">
                      <label>Description</label>
                     <textarea name="p_description" rows="5" cols="38"></textarea>
                    </div>
                      </div>
                    </div>
                   
                   <div class="form-row">
                     <div class="col">
                       
                       <div class="form-group">
                      <label>Image</label>
                      <input type="file" class="form-control "aria-label="Username"name="product_image[]" id="product_image">
                    </div>
                     </div>

                     <div class="col">
                        <div class="form-group">
                      <label>Image</label>
                      <input type="file" class="form-control "aria-label="Username"name="product_image[]" id="product_image">
                    </div> 
                     </div>
                   </div>
                    <div class="form-row">
                      <div class="col">
                        
                      <div class="form-group">
                      <label>Image</label>
                      <input type="file" class="form-control "aria-label="Username"name="product_image[]" id="product_image">
                    </div> 
                      </div>
                      <div class="col">
                         <div class="form-group">
                      <label>Image</label>
                      <input type="file" class="form-control "aria-label="Username"name="product_image[]" id="product_image">
                    </div>
                      </div>
                    </div>


                    <button type="submit" class="btn btn-info"> Save</button>

                    </form>
                  </div>
                
                </div>
              </div>
            </div>
 @endsection               
              