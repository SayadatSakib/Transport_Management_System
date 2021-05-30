@extends('driver/layouts.driverapp')

@section('content')
<title>My Books</title>
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                
              </div>
              <div class="card-body all-icons">
                <div class="row">

               

                @foreach($book_request->reverse() as $value)

                           @foreach($users->reverse() as $u_value)

                    
                                @if ($u_value->email == $value->customer_email)
                         
                                               @if ($value->driver_email == $driver->email)
                                                  
                                                <div class="col-md-4 ftco-animate" style="height: 475px;">
                            
                                                  <div class="card text-center">
                                                  <div class="card-header">
                                                    Book: #{{$value->id}}
                                                  </div>
                                                  <div class="card-body">

                                                    
                                                    <h5 class="card-title">{{$value->where_to}} To {{$value->destinetion}}</h5>
                                                    <p class="card-text">Booking Status: {{$value->trip_status}}</p>

                                                       @foreach($book_response->reverse() as $book_response_value)
                                                          @if ($book_response_value->book_id == $value->id)

                                                                  @if ($book_response_value->response_status == "Cancel")
                                                                    <p class="card-text" style="color: red;">Customer Response: {{$book_response_value->response_status}}</p>
                                                                    <p class="card-text" style="color: red;">Response Amount: {{$book_response_value->response_amount}} BDT</p>
                                                                  @endif

                                                                  @if ($book_response_value->response_status == "Accept" && $value->trip_status != "Reached")
                                                                    <p class="card-text" style="color: green;">Customer Response: {{$book_response_value->response_status}}</p>
                                                                    <p class="card-text" style="color: green;">Response Amount: {{$book_response_value->response_amount}} BDT</p>
                                                                    <p class="card-text" style="color: #ffc107;">Please Update the Booking </p>
                                                                    <div class="col-md-12 pl-md-1">
                                                                    <div class="form-group">

                                                                    <form  action="{{ route('driver.updateBooking') }}" method="POST" enctype="multipart/form-data" >
                                                                        @csrf
                                                                        <input type="number" name="book_id" class="form-control" value="{{$value->id}}" hidden >
                                                                        <label>Status</label>
                                                                        <select style=" background: #27293d !important;" class="form-control" name="book_status" required id="product_category">
                                                                              <option  value="Pending" {{$value->trip_status == "Pending"  ? 'selected' : ''}} >Pending</option>
                                                                              <option  value="Approved" {{$value->trip_status == "Approved"  ? 'selected' : ''}} >Approved</option>
                                                                              <option  value="Picked" {{$value->trip_status == "Picked"  ? 'selected' : ''}} >Picked</option>
                                                                              <option  value="Reached" {{$value->trip_status == "Reached"  ? 'selected' : ''}} >Reached</option>
                                                                        </select>
                                                                        <center> <input type="submit"  class="btn btn-primary " value="Save Booking"/> </center>  
                                                                    </form>
                                                                    </div>
                                                                    </div>
                                                                  @endif

                                                                  @if ($book_response_value->response_status == "Pending")
                                                                  <p class="card-text" style="color: #bf53f0;">Customer Response: {{$book_response_value->response_status}}</p>
                                                                  <p class="card-text" style="color: #bf53f0;">Response Amount: {{$book_response_value->response_amount}} BDT</p>
                                                                  @endif

                                                                  @if ($value->trip_status == "Reached")
                                                                     <p class="card-text" style="color: #bf53f0;">You Earn: {{$book_response_value->response_amount}} BDT</p>
                                                                  @endif

                                                          @endif
                                                       @endforeach
                                                       <div class="col-md-12 pl-md-1">
                                                            <div class="form-group">
                                                                <a href="{{route('driver.updateBookGet',$value->id)}}" class="btn btn-primary">View Booking</a>
                                                            </div>
                                                       </div>

                                                  </div>
                                        
                                                </div>
                                                </div>
                                                        
                                                @endif   

                                @endif  

                           @endforeach

                @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection