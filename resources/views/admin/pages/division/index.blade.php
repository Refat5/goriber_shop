@extends('admin.layouts.app')
@section('content')
                    <h2 class="card-header" style="text-align: center;">Division List</h2>
                     @include("admin.pages.message.validate ")

                      <a href="{{route('admin.division.create')}}" style="margin-left: 80%;"> <button class="btn btn-success mt-2 mb-2 ">Add New</button></a>
                    
                    <table class="table table-bordered striped" id="dataTable">
                      <thead>
                        <tr>
                          <th>{{ __('customLanguage.Sl_No')}}   </th>
                          <th>Division Name </th>
                          <th>Priority</th>
                      
                          <th> {{ __('customLanguage.Action')}}  </th>

                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1;@endphp
                        @foreach ($divisions as $division)
                        <tr>
                          <td> {{$i++}}</td>
                          <td> {{$division->d_name}} </td>
                          <td> {{$division->d_priority}} </td>

                         
                      
                        
                       
                          <td>
                          
                           <a href="{{route('admin.division.edit', $division->id)}}"> <button class="btn btn-success">Edit</button></a>

                            <a href="#deleteModal{{$division->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                           <!-- Delete Modal -->

                           <div class="modal fade" id="deleteModal{{$division->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to delete?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="{!!route('admin.division.delete',$division->id)!!}" method="post">
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
                    @endsection

                  