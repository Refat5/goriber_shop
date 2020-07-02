 @extends('admin.layouts.app') 
 @section('content')
            
                <div class="card col-md-8">
                  <div class="card-body">
                    <h2 class="card-title">Update Product</h2>
                    <form action="{{route('admin.product.update',$sproduct->id)}}" method="post" enctype="multipart/form-data" >
                      @csrf
                      @include("admin.pages.message.validate ")
                   
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control form-control-lg" placeholder="Enter Title" aria-label="Username" name="p_title" value="{{$sproduct->p_title}}">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                     <textarea name="p_description" rows="5" cols="38">{{$sproduct->p_description}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>Price</label>
                      <input type="number" class="form-control form-control-sm" placeholder="Enter Price" aria-label="Username"name="p_price" value="{{$sproduct->p_price}}">
                    </div>

                      <div class="form-group">
                      <label>Quantity</label>
                      <input type="number" class="form-control form-control-sm" placeholder="Enter Quantity" aria-label="Username"name="p_quantity"value="{{$sproduct->p_quantity}}">
                    </div>


                      <div class="form-group">
                      <label>Category</label>
                     <select class="form-control" name="category_id">
                      <option >Please Select a category for the product</option>
                       @foreach (App\Category::orderBy('c_name','asc')->where('c_parent_id',NULL)->get() as $category)
                       <option value="{{ $category->id}}" {{$category->id == $sproduct->category->id ? 'selected': ''}}>{{$category->c_name}} </option>

                        @foreach(App\Category::orderBy('c_name','asc')->where('c_parent_id',$category->id)->get() as $child)
                         <option value="{{ $child->id}}" {{$child->id == $sproduct->category->id ? 'selected': ''}}>------->{{ $child->c_name}}</option>
                         @endforeach
                         @endforeach
                     </select>
                    </div>
                    <div class="form-group">
                      <label>Brand</label>
                     <select class="form-control" name="brand_id">
                     
                      
                        @foreach(App\Brand::orderBy('b_name','asc')->get() as $br)
    

                          <option value="{{$br->id}}" {{ $br->id == $sproduct->brand->id ? 'selected' : ''}}>{{$br->b_name}}</option>
                         
                         @endforeach
                     </select>
                    </div>
                       <div class="form-group">

                          <div class="form-group">
                      <label>Old Image</label><br>
                      @foreach ($sproduct->Images as $img)
                         
                          <img width="20%" src="{{asset('images/products/'. $img->image)}}" alt="Card image" >
                        

                          @endforeach
                      <br><br>
                      <label>New Image(Optional)</label>

                      <input type="file" class="form-control "aria-label="Username"name="product_image[]" id="product_image">
                    </div>
                      
                      <div class="form-group">
                      <label>Image</label>
                      <input type="file" class="form-control "aria-label="Username"name="product_image[]" id="product_image">
                    </div>  <div class="form-group">
                      <label>Image</label>
                      <input type="file" class="form-control "aria-label="Username"name="product_image[]" id="product_image">
                    </div>  <div class="form-group">
                      <label>Image</label>
                      <input type="file" class="form-control "aria-label="Username"name="product_image[]" id="product_image">
                    </div>

                    <button type="submit" class="btn btn-info"> Update</button>

                    </form>
                  </div>
                
                </div>
 @endsection              

 @section('script')
<script type="text/javascript">
$(document).ready(function(){
  
})
</script>
 @endsection     