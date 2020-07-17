@extends('admin.layouts.app')
@section('content')
                <div class="card mt-3">
                    
                  <h2 class="card-header" style="text-align: center;">Product List</h2>
                     @include("admin.pages.message.validate ")
                                          <a href="{{route('admin.product.create')}}" style="margin-left: 80%;"> <button class="btn btn-success mt-2 mb-2 ">Add New</button></a>

                    
                    <table class="table table-bordered striped" id="dataTable">
                      <thead>
                        <tr>
                          <th> {{ __('customLanguage.Sl_No')}}  </th>
                          <th> Product Code </th>
                          <th> Product Title </th>
                          <th> Price </th>
                          <th> Image </th>
                          <th> Quantity </th>
                          <th>{{ __('customLanguage.Action')}}  </th>

                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1;@endphp
                        @foreach ($product as $pro)
                        <tr>
                          <td> {{$i++}}</td>
                          <td> PO{{$pro->id}}</td>

                          <td> {{$pro->p_title}} </td>
                          <td> {{$pro->p_price}} </td>
                          <td>
                         @foreach ($pro->Images as $img)
                         
                          <img class="card-img-top img-style" src="{{asset('images/products/'. $img->image)}}" alt="Card image">
                        

                          @endforeach 
                          </td>
                          <td> {{$pro->p_quantity}} </td>
                          <td>
                           <a href="{{route('admin.product.edit', $pro->id)}}"> <button class="btn btn-success">Edit</button></a>

                            <a href="#deleteModal{{$pro->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                           <!-- Delete Modal -->

                           <div class="modal fade" id="deleteModal{{$pro->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to delete?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="{!!route('admin.product.delete',$pro->id)!!}" method="post">
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
                          
                        </tr>
                        @endforeach
                       
                     
                     
                      </tbody>

                    </table>
               


                  </div>

 @endsection

                  