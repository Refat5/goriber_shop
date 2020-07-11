@extends('admin.layouts.app')
@section('content')
                    <h2 class="card-header" style="text-align: center;">{{ __('customLanguage.Brand List')}}</h2>
                     @include("admin.pages.message.validate ")

                     <a href="{{route('admin.brands.create')}}" class="mt-2 mb-2" style="margin-left: 80%;"> <button class="btn btn-success " >Add New</button></a>
                    
                    
                    <table class="table table-bordered striped" id="dataTable">
                      <thead>
                        <tr>
                          <th>{{ __('customLanguage.Sl_No')}}  </th>
                          <th>{{ __('customLanguage.Brand Name')}}   </th>
                          <th>{{ __('customLanguage.Brand Image')}}</th>
                      
                          <th>{{ __('customLanguage.Action')}}  </th>

                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1;@endphp
                        @foreach ($brands as $brand)
                        <tr>
                          <td> {{$i++}}</td>
                          <td> {{$brand->b_name}} </td>
                          <td>
                            <img src="{{asset('images/Brands/'.$brand->b_image)}}">
                          </td>
                      
                      

                            <td>
                          
                           <a href="{{route('admin.brands.edit', $brand->id)}}"> <button class="btn btn-success">{{ __('customLanguage.Edit')}} </button></a>

                            <a href="#deleteModal{{$brand->id}}" data-toggle="modal" class="btn btn-danger">{{ __('customLanguage.Delete')}}</a>

                           <!-- Delete Modal -->

                           <div class="modal fade" id="deleteModal{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('customLanguage.Are you sure to delete?')}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="{!!route('admin.brands.delete',$brand->id)!!}" method="post">
                                          {{csrf_field()}}
                                          <button type="subnit" class="btn btn-danger">{{ __('customLanguage.Permanent Delete')}}</button>
                                      
                                      </form>
                                  
                                  </div>
                                  <div class="modal-footer">
                                    
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('customLanguage.Cancel')}}</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>



                          
                        </tr>
                        @endforeach
                       
                     
                     
                      </tbody>
                    </table>
                    @endsection

                  