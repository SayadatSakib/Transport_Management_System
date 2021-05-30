<title>Customer Profile</title>

@extends('layouts.pageapp')

   <script type="text/javascript">
      window.onload = function Gender(){
            var gender = $( "#dbgender" ).val();
            if(gender === "Female"){
                document.getElementById("female").checked = true;
            }
            if(gender === "Male"){
                document.getElementById("male").checked = true;
            }

            var covid = $( "#dbcovid" ).val();
            if(covid === "1"){
                $("#c_status").text("Positive");
            }
            else{
                $("#c_status").text("Negative");
            }
      }

    </script>

@section('content')



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
                 
                                            <form class="text-left border border-light p-5" method="POST" action="{{ route('customer.storeprofile') }}" enctype="multipart/form-data">
                                                 @csrf
                                                      <div class="form-group">
                                                        <input type="text" name="id" value="{{$customers->id}}" hidden/> 
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




<div class="container">
    <div class="row justify-content-center">
          <div class="col-sm-8">  

                    <div  class="text-center" style="position: relative; top: 20px; margin-bottom: -90px;">
                        <img style="height: 130px; width: 130px; border-radius: 50%; border: 5px solid rgba(255,255,255,0.5); position: relative; top: -38px;" src="{{$customers->profileimage}}" class="img-fluid" alt="Responsive image">
                    </div><br>
                    <div class="title text-center" style="position: relative; top: 27px;">                         
                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#targetp" >Profile Photo</button>
                    </div><br>
                    
            <form class="text-left border border-dark p-5" method="POST" action="{{ route('customer.profilePost') }}" enctype="multipart/form-data">
                  @csrf
                    <input type="text" name="id" value="{{$customers->id}}" hidden/>
                    <a class = "label label-left">Name</a>
                    <input type="text" name="name" class="form-control mb-4" placeholder="Age" value="{{$user->name}}">

                    <a class = "label label-left">Email</a><br>
                    <input type="email" name="email" class="form-control mb-4" readonly value="{{ Auth::user()->email }}" >

                    <a class = "label label-left">Age</a>
                    <input type="number" name="age" class="form-control mb-4" placeholder="Age" value="{{$customers->age}}" min="15"max="70">

                    <a class = "label label-left">Address</a>
                    <input type="text" name="address" class="form-control mb-4" placeholder="Address" value="{{$customers->address}}">

                    <label style="color: black;" for="city">City</label><br>
                              <select  style="color: black;" name="city" required id="vehicle_category">
                                              
                                              @foreach($cities as $value_c)
                                              <option style="background: light !important;" value="{{ $value_c->id }}" {{$value_c->id == $user->city  ? 'selected' : ''}} >{{ $value_c->city }}</option>
                                              @endforeach

                              </select><br><br>

                    <div class="form-group">
                          <label for="gender">Gender</label><br>
                          <input type="radio" id="male" name="gender" value="Male" required />Male &nbsp;
                          <input type="radio" id="female" name="gender" value="Female" required />Female                           
                    </div>

                    <input type="text" id="dbgender" value="{{$customers->gender}}" hidden>
        
                    <a class = "label label-left">Phone</a>
                    <input type="text" name="phone" class="form-control mb-4" placeholder="Phone" value="{{$customers->phone}}"> 
                    <!-- Send button -->
                    <button class="btn btn-success" type="submit">Update</button><br><br>
                    <a href="{{route('customer.changePassGet')}}">
                        Change Password
                    </a><br>                    
            </form>
          </div>
    </div>
</div>
@endsection


<script>
      function n_id_view(input){
          var file = $("input[type=file]").get(1).files[0];
          if(file){
              var reader = new FileReader();
              reader.onload = function(){
                  $("#preview_n_id").attr("src",reader.result);
              }
              reader.readAsDataURL(file);
          }
      }

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