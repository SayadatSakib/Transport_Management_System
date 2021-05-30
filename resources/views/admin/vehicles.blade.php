@extends('admin/layouts.adminapp')

@section('content')
<title>Vehicles</title>

<div class="row justify-content-center">
       
        <div class="col-sm-5">

                    <!--Add popup-->
                    <div class="panel-body">
                                           
                          <div style="top: 50px; background-color: dark;" class="modal fade " id="targetp" role="dialog">
                          <div class="modal-dialog">
                          <div class="modal-content">

                                <div class="modal-header">
                                    <h6 style="color: black;" class=modal-title>Add new Vehicle!</h6>
                                    <button type="button" class="close" data-dismiss="modal" >&times</button>

                                </div>
                                <div class="modal-body">                          

                                    <form class="border border-dark p-5" method="POST" action="{{route('admin.addVehicles')}}" enctype="multipart/form-data">
                                    @csrf

                                      <div class="input-group mb-12 justify-content-center">


                                        <div class="form-group">
                                          <label style="color: black;" for="Shop Category">Vehicle Category</label><br>
                                          <select  style="color: black;" name="vehicle_category" required id="vehicle_category">
                                              
                                              @foreach($vehicle_category as $value)
                                                  <option  value="{{ $value->id }}" >{{ $value->vehicle_categories }}</option>
                                              @endforeach

                                          </select><br>
                                          <label style="color: black;" for="Shop Category">Vehicle Name</label><br>
                                          <input type="text" name="vehicle"  aria-describedby="basic-addon1" required><br>
                          
                                            <input type="submit"  class="btn btn-success float-left" value="Add"/>
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

        <h6 class="text-center" style="font-weight: bold;">All Vehicles!</h6>

        <a class="text-center" data-toggle="modal" data-target="#targetp" href="">Add new Vehicle <i class="fa fa-plus-square" aria-hidden="true"></i></a>
        <br><br>
        <form class="text-center border border-dark">         
                    <div class="table-responsive">
                        <table class="table table-borderless">                              
                        <thead style="background: linear-gradient(45deg, #62828d 0%, #5b594c 100%); color: white;">
                          <tr>
                            <th>ID</th>
                            <th>Vehicle</th>
                            <th>Category</th>
                            <th>Action</th>                      
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($vehicles->reverse() as $value)

                            
                                           @foreach($vehicle_category->reverse() as $value_c)

                                                @if($value->category == $value_c->id)
                                              
                                                  <tr>

                                                      <td>{{$value->id}}</td>
                                                      <td>{{$value->vehicle}}</td>
                                                      <td>{{$value_c->vehicle_categories}}</td>
                                                      <td><a href="{{ route('admin.updatVehicleGet',$value->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                
                                                      <a href="{{ route('admin.delateVehicle',$value->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>                                                                       
                                                  </tr>     

                                                
                                                @endif

                                          @endforeach

                            @endforeach              
                            </tbody>
                        </table>
                  </div>
                  </form>  
          </div>  
</div> 

@endsection