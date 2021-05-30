<title>Driver Profile</title>

@extends('layouts.pageapp')

@section('content')

<section class="ftco-section bg-light">
<div class="container">
    		<div class="row justify-content-center">
	        <div class="col-md-8 ftco-animate">
              <h6 class="text-center" style="font-weight: bold;">Driver Profile!</h6>
	          <div class="block-7">
	          	<div class="img" style="max-height: 330px; max-width: 1080px; background-image: url('{{$drivers->vehicleimage}}');"></div>
                <div class="text-center" style="position: relative; top: -50px; margin-bottom: -90px;">
                    <img style="height: 180px; width: 180px; border-radius: 50%; border: 5px solid rgba(255,255,255,0.5); position: relative; top: -38px;" src="{{$drivers->profileimage}}" class="img-fluid" alt="Responsive image">
                </div>
	            <div class="text-center p-4">
                    <span class="excerpt d-block">{{$v_category->vehicle_categories}} Driver</span>
	            	<span class="excerpt d-block">{{$users->name}}</span>
                    

		            <ul class="pricing-text mb-5">
		              <li><span ></span>Email: {{$drivers->email}}</li>
		              <li><span class="fa fa-check mr-2"></span>Gender: {{$drivers->gender}}</li>
		              <li><span class="fa fa-check mr-2"></span>Age: {{$drivers->age}}</li>
                  <li><span class="fa fa-check mr-2"></span>Address: {{$drivers->address}}</li>
                  <li><span class="fa fa-check mr-2"></span>Phone: {{$drivers->phone}}</li>
		            </ul>
                <button type="button" class="btn btn-primary d-block px-2 py-3" data-toggle="modal" data-target="#targetp" >Book Now</button>
	            </div>
	          </div>
            </div>

                    <!--Book popup-->
                    <div class="panel-body">

                          <div style="top: 50px;" class="modal fade" id="targetp" role="dialog">
                          <div class="modal-dialog">
                          <div class="modal-content">
                          <div class="modal-header">
                              <h6 style="color: black;" class=modal-title>Book Driver Now!</h6>
                              <button type="button" class="close" data-dismiss="modal" >&times</button>

                          </div>
                                <div class="modal-body">

                                    <form class="text-left border border-light p-5" method="POST" action="{{route('customer.bookDriverPost')}}" enctype="multipart/form-data">
                                    @csrf
                                        <div class="row">
                                        <input type="text" name="v_category" class="form-control" value="{{$v_category->vehicle_categories}}" hidden required>
                                        <input type="text" name="driver_email" class="form-control" value="{{$drivers->email}}" hidden required>
                                        <input type="text" name="driver_phone" class="form-control" value="{{$drivers->phone}}" hidden required>
                                                <div class="col-md-12 pl-md-1">
                                                <div class="form-group">
                                                    <label>Trip time</label>
                                                    <div class="input-group date" id="datetimepicker">
                                                        <input type="text"  name="trip_time" class="form-control" placeholder="MM/DD/YY 8:14 AM" required>
                                                        <div class="input-group-addon input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>

                                                <div class="col-md-12 pl-md-1">
                                                <div class="form-group">
                                                    <label>Where To</label>
                                                    <input type="text" name="where_to" class="form-control" placeholder="EX: Dhaka"  required>
                                                </div>
                                                </div>

                                                <div class="col-md-12 pl-md-1">
                                                <div class="form-group">
                                                    <label>Destination</label>
                                                    <input type="text" name="destination" class="form-control" placeholder="EX: Cumilla"  required>
                                                </div>
                                                </div>

                                                <div class="col-md-12 pl-md-1">
                                                <div class="form-group">
                                                    <label>Your Material in short!</label>
                                                    <textarea class="form-control" rows="5" name="t_material" required></textarea>
                                                </div>
                                                </div>

                                        </div>
                                        

                                       <center> <input type="submit"  class="btn btn-success " value="Submit"/> </center>
                                    </form>

                                </div>
                          <div class="modal-footer">
                          </div>
                          </div>
                          </div>
                          </div>


                    </div>
                    <!--Book popup end-->            

	      </div>
    </section>

@endsection