@extends('admin.layouts.app')
@section('content')
                    <h2 class="card-header" style="text-align: center;">Catgory List</h2>
                     @include("admin.pages.message.validate ")

                     <a href="{{route('admin.category.create')}}" class="mt-2 mb-2" style="margin-left: 80%;"> <button class="btn btn-success " >Add New</button></a>
                    
                    <table class="table table-bordered striped" id="dataTable">
                      <thead>
                         <tr>
                          <th>  {{ __('customLanguage.Sl_No')}}  </th>
                          <th>Category Name </th>
                          <th>Category Image</th>
                          <th>Parent Category</th>
                          <th> {{ __('customLanguage.Action')}}  </th>

                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1;@endphp
                        @foreach ($categoris as $cate)
                        <tr>
                          <td> {{$i++}}</td>
                          <td> {{$cate->c_name}} </td>
                          <td>
                            <img src="{{asset('images/categoris/'.$cate->c_image)}}">
                          </td>
                          <td> 
                            @if($cate->c_parent_id == NULL)
                            Primary Category

                            @else 
                            {{$cate->parent->c_name}}
                            @endif



                            <td>
                          
                           <a href="{{route('admin.category.edit', $cate->id)}}"> <button class="btn btn-success">Edit</button></a>

                            <a href="#deleteModal{{$cate->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                           <!-- Delete Modal -->

                           <div class="modal fade" id="deleteModal{{$cate->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to delete?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="{!!route('admin.category.delete',$cate->id)!!}" method="post">
                                          {{csrf_field()}}
                                          <button type="subnit" class="btn btn-danger">Permanent Delete</button>
                                      
                                      </form>
                                  
                                  </div>
                                  <div class="modal-footer">
                                    
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>

                           
                             </td>
                        
                       
                          
                        </tr>
                        @endforeach
                       
                     
                     
                      </tbody>
                    </table>
                    @endsection

                  