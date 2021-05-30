@extends('driver/layouts.driverapp')
<style>
.avatar {
  vertical-align: middle;
  width: 50px !important;
  height: 50px !important;
  border-radius: 50%;
}
</style>
@section('content')
<title>Update Books</title>
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                
              </div>
              <div class="card-body">
                <div class="row">


                                                <div class="col-md-4 ftco-animate" >

                                                <div class="card text-center">
                                                <div class="card-header">
                                                  Book: #{{$book_request->id}}
                                                </div>
                                                
                                                <div class="card-body">
                                                  <img id="previewProfile" src="{{$customer->profileimage}}" class="avatar" style="max-width:50px;"/>
                                                  <h5 class="card-title"> Book for {{$book_request->vehicle_category}} <br> {{$user->name}}</h5>
                                                  <h5 class="card-title">Phone: {{$book_request->customer_phone}}</h5>
                                                  <h5 class="card-title"> Trip Time: {{$book_request->trip_time}}</h5>
                                                  <h5 class="card-title">Where To: {{$book_request->where_to}}</h5>
                                                  <h5 class="card-title">Destination: {{$book_request->destinetion}}</h5>
                                                  <p class="card-text">Status: {{$book_request->trip_status}}</p>
                                                  <p class="card-text">Material in short!</p>
                                                  <div class="col-md-12 pl-md-1">
                                                   <div class="form-group">
                                                    <textarea class="form-control" rows="5" style="color: white;" name="t_material" readonly required>{{$book_request->transport_material}}</textarea>
                                                  </div>
                                                  </div>
                                                  
                                                      @if(!$book_response)
                                                          <a data-toggle="modal" data-target="#targetResponse" class="btn btn-primary">Response</a>
                                                      @endif
                                                  
                                                </div>
                                                <div class="card-footer text-muted">
                                                  Booking Palce at: {{$book_request->created_at}}
                                                </div>
                                                </div>
                                                </div>
                                                        

                </div>
              </div>
            </div>
          </div>
        </div>

                    <!--Book popup-->
                    <div class="panel-body">

                          <div style="top: 50px;" class="modal fade" id="targetResponse" role="dialog">
                          <div class="modal-dialog">
                          <div class="modal-content">
                          <div class="modal-header">
                              <h6 style="color: black;" class=modal-title>Response Customer Now!</h6>
                              <button type="button" class="close" data-dismiss="modal" >&times</button>

                          </div>
                                <div class="modal-body">

                                    <form class="text-left border border-light p-5" method="POST" action="{{route('driver.updateBookPost')}}" enctype="multipart/form-data">
                                    @csrf
                                        <div class="row">
                                        <input type="number" name="book_id" class="form-control" value="{{$book_request->id}}" hidden >
                                        <input type="text" name="customer_email" class="form-control" value="{{$book_request->customer_email}}" hidden >
                                        <input type="text" name="driver_email" class="form-control" value="{{$book_request->driver_email}}" hidden >


                                                <div class="col-md-12 pl-md-1">
                                                <div class="form-group">
                                                    <label>Response Amount</label>
                                                    <input type="number" name="response_amount" style="color: black;" class="form-control"  required>
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

@endsection