@extends('admin.layouts.app')
@section('content')
                <div class="card mt-3">
                    
                  <h2 class="card-header" style="text-align: center;">Order List</h2>
                     @include("admin.pages.message.validate ")
                    
                    <table class="table table-bordered striped" id="dataTable">
                      <thead>
                        <tr>
                          <th> {{ __('customLanguage.Sl_No')}}  </th>
                          <th> Order ID </th>
                          <th> Orderer Name </th>
                          <th> Orderer Mobile No </th>
                          <th> Order Status </th>
                          <th> {{ __('customLanguage.Action')}} </th>

                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1;@endphp
                        @foreach ($orders as $order)
                        <tr>
                          <td> {{$i++}}</td>
                          <td>#GD {{$order->user_id}} </td>
                          <td> {{$order->name}} </td>
                          <td>
                       {{$order->mobile_no}}
                          </td>
                          <td > 
                            <p>
                              @if($order->is_seen_by_admin)
                              <button class="btn btn-success btn-xsm">Senn</button>
                              @else
                              <button class="btn btn-warning btn-xsm">Unseen</button>
                              @endif
                            </p>

                            <p>
                              @if($order->is_completed)
                              <button class="btn btn-primary btn-xsm">Completed</button>
                              @else
                              <button class="btn btn-warning btn-xsm">Not Completed</button>
                              @endif
                            </p>

                            <p>
                              @if($order->is_paid)
                              <button class="btn btn-success btn-xsm">Paid</button>
                              @else
                              <button class="btn btn-danger btn-xsm">UnPaid</button>
                              @endif
                            </p>
                          </td>
                           <td>
                          
                           <a href="{{route('admin.order.view', $order->id)}}"> <button class="btn btn-success">view</button></a>

                            <a href="#deleteModal{{$order->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                           <!-- Delete Modal -->

                           <div class="modal fade" id="deleteModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to delete?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="{!!route('admin.order.delete',$order->id)!!}" method="post">
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
                      <div class="paginate">
                      
                    </div>


                  </div>

 @endsection

                  