

@extends('driver/layouts.driverapp')

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
<title>Driver Profile</title>


                <!--profile popup-->
                <div class="panel-body">

                        <div style="top: 50px;" class="modal fade" id="targetp" role="dialog">
                        <div class="modal-dialog">
                             <div class="modal-content">
                             <div class="modal-header">
                                    <h6 style="color: black;" class=modal-title>Update Profile Photo!</h6>
                                    <button type="button" class="close" data-dismiss="modal" >&times</button>

                                    </div>
                                        <div class="modal-body">

                                            <form class="text-left border border-light p-5" method="POST" action="{{ route('driver.storeprofile') }}" enctype="multipart/form-data">
                                                 @csrf
                                                      <div class="form-group">
                                                        <input type="text" name="id" value="{{$drivers->id}}" hidden/>
                                                        <img id="previewProfile" src="images/blankimg.png" style="max-width:130px; margin-top:20px;"/><br><br>
                                                        <input required type="file" name="p_file" placeholder="Choose Image" onchange="profilePreview(this)"/>
                                                      </div>

                                                      <input type="submit"  class="btn btn-success float-right" value="Update"/>
                                                      
                                            </form>

                                           

                                                 </div>
                                           <div class="modal-footer">
                                           </div>
                                           </div>
                                           </div>
                                           </div>

                                          

                </div>
                <!--profile popup end -->


<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Profile</h5>
              </div>
              <div class="card-body">




                <form method="POST" action="{{ route('driver.profilePost') }}" enctype="multipart/form-data">
                @csrf 
                <input type="text" name="id" value="{{$drivers->id}}" hidden/>   
                  
                <div class="row">

                <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{$user->name}}">
                      </div>
                    </div>

                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" readonly name="email" class="form-control" Email="Last Name" value="{{ Auth::user()->email }}">
                      </div>
                    </div>

                </div>

                <div class="row">

                <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age" class="form-control" placeholder="Age" value="{{$drivers->age}}" required>
                      </div>
                    </div>

                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address" value="{{$drivers->address}}" required>
                      </div>
                    </div>

                </div>

                <div class="row">

                <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{$drivers->phone}}" required>
                      </div>
                    </div>
                    
                  <div class="col-md-6 pr-md-1">
                    <div class="form-group">
                          <label for="gender">Gender</label><br>
                          <input type="radio" id="male" name="gender" value="Male" required />Male &nbsp;
                          <input type="radio" id="female" name="gender" value="Female" required />Female
                          
                          <input type="text" id="dbgender" value="{{$drivers->gender}}" hidden>
                    </div>
                  </div>  

                  <div class="col-md-6 pr-md-1">
                    <div class="form-group">

                              <label style="color: white;" for="city">City</label><br>
                              <select  style="color: black;" name="city" required id="vehicle_category">
                                              
                                              @foreach($cities as $value_c)
                                              <option style="background: light !important;" value="{{ $value_c->id }}" {{$value_c->id == $user->city  ? 'selected' : ''}} >{{ $value_c->city }}</option>
                                              @endforeach

                              </select><br><br>

                              <label style="color: white;" for="Vehicle Category">Vehicle Category</label><br>
                              <select  style="color: black;" name="vehicle_category" required id="vehicle_category">
                                              
                                              @foreach($vehicle_category as $value)
                                              <option style="background: light !important;" value="{{ $value->id }}" {{$value->id == $drivers->v_category  ? 'selected' : ''}} >{{ $value->vehicle_categories }}</option>
                                              @endforeach

                              </select><br><br>
                              <label style="color: white;" for="Vehicle">Vehicle</label><br>
                              <select  style="color: black;" name="vehicle" required id="vehicle_category">
                                              
                                              @foreach($vehicles as $value_v)
                                              <option style="background: light !important;" value="{{ $value_v->id }}" {{$value_v->id == $drivers->vehicle  ? 'selected' : ''}} >{{ $value_v->vehicle }}</option>
                                              @endforeach

                              </select><br>
                    </div>
                  </div> 


                </div>
                

                
                <div class="row">

                  <div class="col-md-4 pr-md-1">
                  
                            <img id="preview_vehicleimage" src="{{$drivers->vehicleimage}}" style="max-width:68px; margin-top:10px;"/><br><br>
                            <label for="exampleInputPassword1">Vehicle Photo</label><br>
                            <input  type="file" name="vehicleimage"  class="form-control" style="color: red !important;" onchange="vehicleimage_view(this)"/>
                  </div>
                  @if( $drivers->driver_profile != "Approved" )
                  <div class="col-md-4 pr-md-1">
                  
                            <img id="preview_drivinglicense" src="{{$drivers->driving_license}}" style="max-width:68px; margin-top:10px;"/><br><br>
                            <label for="exampleInputPassword1">Driving License</label><br>
                            <input  type="file" name="driving_license"  class="form-control" style="color: red !important;" onchange="drivinglicense_view(this)"/>
                  </div>

                  <div class="col-md-4 pr-md-1">
                  
                            <img id="preview_vehiclelicense" src="{{$drivers->vehicle_license}}" style="max-width:68px; margin-top:10px;"/><br><br>
                            <label for="exampleInputPassword1">Vehicle license</label><br>
                            <input  type="file" name="vehicle_license"  class="form-control" style="color: red !important;" onchange="vehiclelicense_view(this)"/>
                  </div>
                  @endif
                </div>
                
                <br>
                
                <!-- Send button -->
                <button class="btn btn-success" type="submit">Update</button><br><br>
                    



               

                </form>

                
              </div>

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
                      <button type="button" style="top: -45px; background-color: dark !important; " class="btn btn-dark btn-circle btn-xl" data-toggle="modal" data-target="#targetp" ><i class="fas fa-camera"></i></button><br>
                      
                      <h5 class="title">{{$user->name}}</h5>
                      <h5 class="title">{{$drivers->driver_profile}}</h5>
                      
                    </a>
                  </div>
                </p><br>
                <div class="text text-center">
                                           <a href="{{route('driver.changePassGet')}}">
                        Change Password
                    </a><br>
                    </div>
              </div>
              <div class="card-footer">
                <div class="button-container">
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<script>

      function profilePreview(input){
          var file = $("input[type=file]").get(0).files[0];
          if(file){
              var reader = new FileReader();
              reader.onload = function(){
                  $("#previewProfile").attr("src",reader.result);
              }
              reader.readAsDataURL(file);
          }
      }   

      function vehicleimage_view(input){
          var file = $("input[type=file]").get(1).files[0];
          if(file){
              var reader = new FileReader();
              reader.onload = function(){
                  $("#preview_vehicleimage").attr("src",reader.result);
              }
              reader.readAsDataURL(file);
          }
      }

      function drivinglicense_view(input){
          var file = $("input[type=file]").get(2).files[0];
          if(file){
              var reader = new FileReader();
              reader.onload = function(){
                  $("#preview_drivinglicense").attr("src",reader.result);
              }
              reader.readAsDataURL(file);
          }
      }

      function vehiclelicense_view(input){
          var file = $("input[type=file]").get(3).files[0];
          if(file){
              var reader = new FileReader();
              reader.onload = function(){
                  $("#preview_vehiclelicense").attr("src",reader.result);
              }
              reader.readAsDataURL(file);
          }
      }
 
</script>

@endsection