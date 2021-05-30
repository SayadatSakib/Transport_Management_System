

@extends('admin/layouts.adminapp')

<script type="text/javascript">
      window.onload = function Gender(){
            var gender = $( "#dbgender" ).val();
            if(gender === "Female"){
                document.getElementById("female").checked = true;
            }
            if(gender === "Male"){
                document.getElementById("male").checked = true;
            }
      }
</script>

<style type="text/css">

        .xyz {
            background-size: auto;
            text-align: center;
            padding-top: 100px;
        }
        .btn-circle.btn-sm {
            width: 30px;
            height: 30px;
            padding: 6px 0px;
            border-radius: 15px;
            font-size: 8px;
            text-align: center;
        }
        .btn-circle.btn-md {
            width: 50px;
            height: 50px;
            padding: 7px 10px;
            border-radius: 25px;
            font-size: 10px;
            text-align: center;
        }
        .btn-circle.btn-xl {
            width: 42px;
            height: 38px;
            padding: 10px 16px;
            border-radius: 35px;
            font-size: 12px;
            text-align: center;
        }
    </style>

@section('content')
<title>Update Driver</title>

<!--View Vehicle-->
<div class="panel-body">

        <div style="top: 50px;" class="modal fade" id="vv" role="dialog">
        <div class="modal-dialog">
             <div class="modal-content">
             <div class="modal-header">
                    <h5 style="color: black;" class=modal-title>Vehicle</h5>
                    <button type="button" class="close" data-dismiss="modal" >&times</button>

                    </div>
                        <div class="modal-body">


                            <div class="card">
                              <img style="max-width: 450px; max-height: 280px;" alt="Image placeholder" src="{{$drivers->vehicleimage}}">
                            </div>

                       </div>
                           <div class="modal-footer">
                           </div>
                           </div>
                           </div>
                           </div>


</div>
<!--View Vehicle end -->

<!--View Driveing License-->
<div class="panel-body">

        <div style="top: 50px;" class="modal fade" id="dlv" role="dialog">
        <div class="modal-dialog">
             <div class="modal-content">
             <div class="modal-header">
                    <h5 style="color: black;" class=modal-title>Driving License</h5>
                    <button type="button" class="close" data-dismiss="modal" >&times</button>

                    </div>
                        <div class="modal-body">


                            <div class="card">
                              <img style="max-width: 450px; max-height: 280px;" alt="Image placeholder" src="{{$drivers->driving_license}}">
                            </div>

                       </div>
                           <div class="modal-footer">
                           </div>
                           </div>
                           </div>
                           </div>


</div>
<!--View Driveing License end -->

<!--View Vehicle License-->
<div class="panel-body">

        <div style="top: 50px;" class="modal fade" id="vlv" role="dialog">
        <div class="modal-dialog">
             <div class="modal-content">
             <div class="modal-header">
                    <h5 style="color: black;" class=modal-title>Vehilce License</h5>
                    <button type="button" class="close" data-dismiss="modal" >&times</button>

                    </div>
                        <div class="modal-body">


                            <div class="card">
                              <img style="max-width: 450px; max-height: 280px;" alt="Image placeholder" src="{{$drivers->vehicle_license}}">
                            </div>

                       </div>
                           <div class="modal-footer">
                           </div>
                           </div>
                           </div>
                           </div>


</div>
<!--View Vehicle License end -->

<div class="content">
        <div class="row">

          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Driver Profile</h5>
              </div>
              <div class="card-body">




                <form method="POST" action="{{ route('admin.updateDriverPost') }}" enctype="multipart/form-data">
                @csrf 
                <input type="text" name="d_id" value="{{$drivers->id}}" hidden/>   
                  
                <div class="row">

                <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" readonly name="name" class="form-control" placeholder="Name" value="{{$user->name}}">
                      </div>
                    </div>

                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" readonly name="email" class="form-control" Email="Last Name" value="{{$drivers->email}}">
                      </div>
                    </div>

                </div>

                <div class="row">

                <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Age</label>
                        <input type="text" readonly name="age" class="form-control" placeholder="Age" value="{{$drivers->age}}" required>
                      </div>
                    </div>

                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" readonly name="address" class="form-control" placeholder="Address" value="{{$drivers->address}}" required>
                      </div>
                    </div>

                </div>

                <div class="row">

                <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" readonly name="phone" class="form-control" placeholder="Phone" value="{{$drivers->phone}}" required>
                      </div>
                    </div>
                    
                  <div class="col-md-6 pr-md-1">
                    <div class="form-group">
                          <label for="gender">Gender</label><br>
                          <input type="radio" id="male" name="gender" value="Male" required />Male &nbsp;
                          <input type="radio" id="female" name="gender" value="Female" required />Female
                          
                          <input type="text" readonly id="dbgender" value="{{$drivers->gender}}" hidden>
                    </div>
                  </div> 
                </div>

                  <div class="row">
                  <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                          <label style="color: white;" for="city">City</label>
                          
                                                    
                          @foreach($cities as $value_c)
                          @if($value_c->id == $user->city)
                          <input type="text" readonly name="phone" class="form-control" placeholder="Phone" value="{{ $value_c->city }}" required>
                          @endif
                          @endforeach
                      </div>
                    </div> 

                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                      <label style="color: white;" for="Vehicle Category">Vehicle Category</label>
                              
                                                
                              @foreach($vehicle_category as $value)
                              @if($value->id == $drivers->v_category)
                              <input type="text" readonly name="phone" class="form-control" placeholder="Phone" value="{{ $value->vehicle_categories }}" required>
                              @endif
                              @endforeach
                      </div>
                    </div>

                    <div class="col-md-4 pr-md-1">
                    <label style="color: white;" for="Vehicle">Vehicle</label><br>
                        
                                                
                        @foreach($vehicles as $value_v)
                        @if($value_v->id == $drivers->vehicle)
                        <input type="text" readonly name="phone" class="form-control" placeholder="Phone" value="{{ $value_v->vehicle }}" required>
                        @endif
                        @endforeach
                      </div>
                    </div> 
                  </div>

                <div class="row">

                  <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                        <label style="color: white; margin-left: 15px;" for="Vehicle">Vehicle</label><br>
                          <a  data-toggle="modal" data-target="#vv"  >
                          <img style=" width: 80px; height: 60px; margin-left: 15px;" id="preview_vehicleimage"  src="{{$drivers->vehicleimage}}" style="max-width:68px; margin-top:10px;"/>
                          </a>
                        </div>
                      </div>

                      <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                        <label style="color: white;" for="Vehicle">Driving License</label><br>
                          <a  data-toggle="modal" data-target="#dlv"   >
                          <img style=" width: 80px; height: 60px;" id="preview_drivinglicense"  src="{{$drivers->driving_license}}" style="max-width:68px; margin-top:10px;"/>
                          </a>
                        </div>
                      </div>

                      <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                        <label style="color: white;" for="Vehicle">Vehicle License</label><br>
                          <a  data-toggle="modal" data-target="#vlv"  >
                          <img style=" width: 80px; height: 60px;" id="preview_vehiclelicense"  src="{{$drivers->vehicle_license}}" style="max-width:68px; margin-top:10px;"/>
                          </a>
                        </div>
                      </div>

                  </div>

                  <div class="row">

                      <div class="col-md-3 pr-md-1">
                      <div class="form-group">
                         <select style="margin-left: 10px; background: #b23c88 !important;" class="form-control" name="d_status" required id="product_category">

                           <option  value="Pending" {{$drivers->driver_profile == "Pending"  ? 'selected' : ''}} >Pending</option>
                           <option  value="Approved" {{$drivers->driver_profile == "Approved"  ? 'selected' : ''}} >Approve</option>
                           <option  value="Reject" {{$drivers->driver_profile == "Reject"  ? 'selected' : ''}} >Reject</option>

                         </select>

                         <br> <button style="margin-left: 10px;" class="btn btn-success" type="submit">Update</button>

                        </div>
                      </div>

                  </div>

                </form>

                
              </div>

            </div>

            <div class="col-md-4">
            <div class="card card-user">
              <div class="card-body">
                <p class="card-text">
                  <div class="author">
                    <div class="block block-one"></div>
                    <div class="block block-two"></div>
                    <div class="block block-three"></div>
                    <div class="block block-four"></div>
                    <a href="javascript:void(0)">
                      <img class="avatar" src="{{$drivers->profileimage}}" alt="..."><br>
                      
                      
                      <h5 class="title">{{$user->name}}</h5>
                      
                    </a>
                  </div>
                </p><br>
           
              </div>
              <div class="card-footer">
                <div class="button-container">
                 
                </div>
              </div>
            </div>


          </div>


          </div>
        </div>
      </div>


@endsection