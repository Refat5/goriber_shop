@extends('admin.layouts.app')
@section('content')
                    <h2 class="card-header" style="text-align: center;">Slider List</h2>
                     @include("admin.pages.message.validate ")

                      <a href="#addModal" class="mt-2" style="margin-left: 80%;"> <button class="btn btn-info "  data-toggle="modal" data-target="#addModal">Add New</button></a>

                       <!-- Add Modal -->

                           <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Add New Slider</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                               <form action="{{route('admin.slider.store')}}" method="post" enctype="multipart/form-data">
                                   @csrf


                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right" >{{ __('Slider title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title')}}" name="title"  required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Priorety" class="col-md-4 col-form-label text-md-right">{{ __('Priorety') }}</label>

                            <div class="col-md-6">
                                <input id="Priorety" type="number" class="form-control @error('Priorety') is-invalid @enderror" name="priorety"  value="{{ old('priorety') }}" required autofocus>

                                @error('Priorety')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">Image</label>
                       <div class="col-md-6">
                      <input type="file" class="form-control "aria-label="Username"name="image" id="image"  >
                    </div>
                    </div>

                     <div class="form-group row">
                            <label for="button_text" class="col-md-4 col-form-label text-md-right">{{ __('button_text') }}</label>

                            <div class="col-md-6">
                                <input id="button_text" type="text" class="form-control @error('button_text') is-invalid @enderror"  value="{{ old('button_text') }}" name="button_text"  autofocus>

                                @error('button_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="button_url" class="col-md-4 col-form-label text-md-right">{{ __('button_url') }}</label>

                            <div class="col-md-6">
                                <input id="button_url" type="text" class="form-control @error('button_url') is-invalid @enderror"  value="{{ old('button_url') }}" name="button_url"  autofocus>

                                @error('button_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                                      <button type="submit" class="btn btn-info">Save</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                     
                                    </div>

                    
                    
                                  
                                                             
                                </form>
                                </div>

                                 
                            </div>
                           </div>
                          </div>
                    
                    <table class="table table-bordered striped" id="dataTable">
                      <thead>
                        <tr>
                          <th> {{ __('customLanguage.Sl_No')}} </th>
                          <th>Slider Tit;e </th>
                          <th> Slider Image</th>
                          
                          <th>{{ __('customLanguage.Action')}}  </th>

                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1;@endphp
                        @foreach ($sliders as $slider)
                        <tr>
                          <td> {{$i++}}</td>
                          <td> {{$slider->title}} </td>
                          <td>
                            <img src="{{asset('images/sliders/'.$slider->image)}}">
                          </td>
                          
                       
                          <td>
                          
                          
                         
                            <a href="#editModal{{$slider->id}}" data-toggle="modal" class="btn btn-success">edit</a>

                           <!-- edit Modal -->

                           <div class="modal fade" id="editModal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle">Update  Slider</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="{!!route('admin.slider.update',$slider->id)!!}" method="post" enctype="multipart/form-data" enctype="multipart/form-data">
                                          {{csrf_field()}}
                                           <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right" >{{ __('Slider title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control"  value="{{$slider->title}}" name="title" >

                             
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Priorety" class="col-md-4 col-form-label text-md-right">{{ __('Priorety') }}</label>

                            <div class="col-md-6">
                                <input id="Priorety" type="number" class="form-control @error('Priorety') is-invalid @enderror" name="priorety"  value="{{$slider->priorety}}"  >

                               
                            </div>
                        </div>
                           <!-- for Old Image -->

                       <div class="form-group">
                      <label>Old Image</label><br>
                      <img src="{{asset('images/sliders/'.$slider->image)}}" width="100"><br><br>
                      
                    </div>
                    <div class="form-group row">
                      <label  class="col-md-4 col-form-label text-md-right">New Image(Optional)
                      </label>
                      <div class="col-md-6">
                        <input type="file" class="form-control"name="image" id="image">
                        
                      </div>

                      
                    </div>

                    <div class="form-group row">
                            <label for="button_text" class="col-md-4 col-form-label text-md-right">{{ __('button_text') }}</label>

                            <div class="col-md-6">
                                <input id="button_url" type="text" class="form-control @error('button_url') is-invalid @enderror"  value="{{ $slider->button_text }}" name="button_url"  autofocus>

                                @error('button_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    


        
                         <div class="form-group row">
                            <label for="button_url" class="col-md-4 col-form-label text-md-right">{{ __('button_url') }}</label>

                            <div class="col-md-6">
                                <input id="button_url" type="text" class="form-control @error('button_url') is-invalid @enderror"  value="{{ $slider->button_url }}" name="button_url"  autofocus>

                                @error('button_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                                      <button type="submit" class="btn btn-info">update</button>
                                      </form>
                                  
                                  </div>
                                  <div class="modal-footer">
                                    

                                    
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  </div>
                                </div>
                              </div>
                            </div>
   




                          
                            <a href="#deleteModal{{$slider->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                           <!-- Delete Modal -->

                           <div class="modal fade" id="deleteModal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to delete?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="{!!route('admin.slider.delete',$slider->id)!!}" method="post">
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

                  