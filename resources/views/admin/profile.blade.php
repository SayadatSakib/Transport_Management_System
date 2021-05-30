

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
<title>Admin Profile</title>


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

                                            <form class="text-left border border-light p-5" method="POST" action="{{ route('admin.storeprofile') }}" enctype="multipart/form-data">
                                                 @csrf
                                                      <div class="form-group">
                                                        <input type="text" name="id" value="{{$admins->id}}" hidden/>
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




                <form method="POST" action="{{ route('admin.profilePost') }}" enctype="multipart/form-data">
                @csrf 
                <input type="text" name="id" value="{{$admins->id}}" hidden/>   
                  
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
                        <input type="text" name="age" class="form-control" placeholder="Age" value="{{$admins->age}}" required>
                      </div>
                    </div>

                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address" value="{{$admins->address}}" required>
                      </div>
                    </div>

                </div>

                <div class="row">

                <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{$admins->phone}}" required>
                      </div>
                    </div>
                    
                  <div class="col-md-6 pr-md-1">
                    <div class="form-group">
                          <label for="gender">Gender</label><br>
                          <input type="radio" id="male" name="gender" value="Male" required />Male &nbsp;
                          <input type="radio" id="female" name="gender" value="Female" required />Female
                          
                          <input type="text" id="dbgender" value="{{$admins->gender}}" hidden>
                    </div>
                  </div>  

                </div>


                
                
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
                      <img class="avatar" src="{{$admins->profileimage}}" alt="..."><br>
                      <button type="button" style="top: -45px; background-color: dark !important; " class="btn btn-dark btn-circle btn-xl" data-toggle="modal" data-target="#targetp" ><i class="fas fa-camera"></i></button><br>
                      
                      <h5 class="title">{{$user->name}}</h5>
                      
                    </a>
                  </div>
                </p><br>
                <div class="text text-center">
                                           <a href="{{route('admin.changePassGet')}}">
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

      
 
</script>

@endsection