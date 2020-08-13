@extends('admin.layouts.app')
@section('content')
                   <h2 class="card-header" style="text-align: center;">district List</h2>
                     @include("admin.pages.message.validate ")

                      <a href="#addModal" class="mt-2 mb-2" style="margin-left: 80%;"> <button class="btn btn-success "  data-toggle="modal" data-target="#addModal">Add New</button></a>
 
                       <!-- Add Modal -->

                           <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Add New district</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                       <form action="{{route('admin.district.store')}}" method="post"  >
                      @csrf
                    

                       <div class="form-group">

                    <label>Select A Division For this District</label>
                      <select class="form-control" name="division_id" required autocomplete="division_id" autofocus>
                        <option value=""> Please select a District</option>
                        @foreach ($divisions as $division)
                          
                      
                        <option value="{{$division->id}}">{{$division->d_name}}</option>

                         @endforeach 
                      </select>
                    </div>
                   
                    <div class="form-group">
                      <label>District Name</label>
                      <input type="text" class="form-control form-control-lg" placeholder="Enter District Name" aria-label="Username" name="name"required autocomplete="name" autofocus>
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
                          <th>district Name </th>
                          <th>division Name</th>
                      
                          <th> {{ __('customLanguage.Action')}}  </th>

                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1;@endphp
                        @foreach ($districts as $district)
                        <tr>
                          <td> {{$i++}}</td>
                          
                          <td> {{$district->ds_name}} </td>
                          <td> 
                          
                          {{$district->division_id}} 
                      

                         </td>                          
                       
                          <td>
                      

                          
                            <a href="#editModal{{$district->id}}" data-toggle="modal" class="btn btn-success">edit</a>

                           <!-- edit Modal -->

                           <div class="modal fade" id="editModal{{$district->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle">Update  district</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                     <form action="{{route('admin.district.update',$district->id)}}" method="post"  >
                   @csrf

                          <div class="form-group">
                      <label class="col-md-4">District Name</label>
                      <input type="text" class="form-control col-md-6" aria-label="Username" name="name" value="{{$district->ds_name}}" required autofocus="name">
                    </div>
                   
        
                    <div class="form-group">

                    <label class="col-md-4">Select A Division For this District</label>
                      <select class="form-control col-md-6" name="division_id" required="" autofocus="division_id">
                        <option value=""> Please select a District</option>
                        @foreach ($divisions as $division)
                          
                      
                        <option value="{{$division->id}}"{{$district->division->id == $division->id ? 'selected' :''}}>{{$division->d_name}}</option>

                         @endforeach 
                      </select>
                    </div>

     
                     
                    <button type="submit" class="btn btn-info"> Update</button>

                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
   




                          
                            <a href="#deleteModal{{$district->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                           <!-- Delete Modal -->

                           <div class="modal fade" id="deleteModal{{$district->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to delete?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="{!!route('admin.district.delete',$district->id)!!}" method="post">
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

                  