<div class="list-group mar-top-20">
	@foreach (App\Category::orderBy('c_name','asc')->where('c_parent_id',NULL)->get() as $category)
				<a href="#main-{{$category->id}}" class="list-group-item list-group-item-action" data-toggle="collapse">
					<img src="{{asset('images/categoris/'.$category->c_image)}}" width="50">
                   {{$category->c_name}}
				</a>
				<div class="collapse 
				
				@if(Route::is('categoris.show'))
				@if(App\Category::ParentNotCategory($category->id, $category->id))

				show

				@endif
				@endif
				" id="main-{{ $category->id}}">
					<div class="child-row">
						@foreach(App\Category::orderBy('c_name','asc')->where('c_parent_id',$category->id)->get() as $child)
						<a href="{{route('categoris.show',$child->id)}}" class="list-group-item list-group-item-action active
							@if(Route::is('categoris.show'))
							@if($child->id == $category->id)
                              
							@endif
							@endif
						">
					<img src="{{asset('images/categoris/'.$child->c_image)}}" width="30">
                   {{$child->c_name}}
				</a>
						@endforeach
						
					</div>
					
				</div>
	@endforeach
				
			</div>