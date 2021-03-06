@extends('admin/layouts.adminapp')

@section('content')
<title>Cities</title>

<div class="row justify-content-center">
       
        <div class="col-sm-5">

                    <!--Add popup-->
                    <div class="panel-body">
                                           
                          <div style="top: 50px;" class="modal fade " id="targetp" role="dialog">
                          <div class="modal-dialog">
                          <div class="modal-content">

                                <div class="modal-header">
                                    <h6 style="color: black;" class=modal-title>Add new City!</h6>
                                    <button type="button" class="close" data-dismiss="modal" >&times</button>

                                </div>
                                <div class="modal-body">                          

                                    <form class="border border-light p-5" method="POST" action="{{route('admin.addCities')}}" enctype="multipart/form-data">
                                    @csrf

                                      <div class="input-group mb-4 justify-content-center">
                                      <input type="text" name="city" style="width: 60%;" aria-describedby="basic-addon1" required>
                                        <div class="input-group-prepend">
                                        <input type="submit"  class="btn btn-success float-right" value="Add"/>
                                        </div>
                                        
                                      </div>

                                    </form>

                                </div>
                                <div class="modal-footer">
                                </div>

                          </div>
                          </div>
                          </div>
                         
                    </div>
                    <!--Add popup end-->

        <h6 class="text-center" style="font-weight: bold;">All Cities!</h6>

        <a class="text-center" data-toggle="modal" data-target="#targetp" href="">Add new City <i class="fa fa-plus-square" aria-hidden="true"></i></a>
        <br><br>
        <form class="text-center border border-dark">         
                    <div class="table-responsive">
                        <table class="table table-borderless">                              
                        <thead style="background: linear-gradient(45deg, #62828d 0%, #5b594c 100%); color: white;">
                          <tr>
                            <th>ID</th>
                            <th>City</th>
                            <th>Action</th>                     
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($cities->reverse() as $value)
                                          <tr>

                                            <td>{{$value->id}}</td>
                                            <td>{{$value->city}}</td>
                                            <td><a href="{{ route('admin.updateCityGet',$value->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                
                                            <a href="{{ route('admin.delateCity',$value->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>                                                                       
                                          </tr>
                            @endforeach              
                            </tbody>
                        </table>
                  </div>
                  </form>  
          </div>  
</div> 

@endsection