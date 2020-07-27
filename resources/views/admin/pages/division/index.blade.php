@extends('admin.layouts.app')
@section('content')
                   <h2 class="card-header" style="text-align: center;">Division List</h2>
                     @include("admin.pages.message.validate ")

                      <a href="#addModal" class="mt-2 mb-2" style="margin-left: 80%;"> <button class="btn btn-success "  data-toggle="modal" data-target="#addModal">Add New</button></a>

                       <!-- Add Modal -->

                           <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Add New Division</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                              <form action="{{route('admin.division.store')}}" method="post" >
                      @csrf
                      @include("admin.pages.message.validate ")
                   
                    <div class="form-group">
                      <label>Divison Name</label>
                      <input type="text" class="form-control form-control-lg" placeholder="Enter Divison Name" aria-label="Username" name="name">
                    </div>

                     <div class="form-group">
                      <label>Priority</label>
                      <input type="text" class="form-control form-control-lg" placeholder="Enter priority " aria-label="Username" name="priority">
                    </div>
                  

                    
                     
                    <button type="submit" class="btn btn-info"> Save</button>

                    </form>
                                </div>

                                 
                            </div>
                           </div>
                          </div>
                    
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
                      

                          
                            <a href="#editModal{{$division->id}}" data-toggle="modal" class="btn btn-success">edit</a>

                           <!-- edit Modal -->

                           <div class="modal fade" id="editModal{{$division->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle">Update  Division</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                           <form action="{!!route('admin.division.update',$division->id)!!}" method="post" >   
                                              @csrf
                   
                    <div class="form-group">
                      <label class="col-md-4">Divison Name</label>
                      <input type="text" class="form-control col-md-6" aria-label="Username" name="name" value="{{$division->d_name}}">
                    </div>

                     <div class="form-group">
                      <label class="col-md-4">Priority</label>
                      <input type="text" class="form-control col-md-6 " aria-label="Username" name="priority" value="{{$division->d_priority}}">
                    </div>
                  

                    
                     

                    
                                  
                                  </div>
                                  <div class="modal-footer">
                                    

                                                        <button type="submit" class="btn btn-info"> Update</button>

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
   




                          
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
                                          <button type="submit" class="btn btn-danger">Permanent Delete</button>
                                      
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

                  