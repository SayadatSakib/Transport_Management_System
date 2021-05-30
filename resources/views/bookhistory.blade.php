<title>Booking History</title>

@extends('layouts.pageapp')

@section('content')


<section class="ftco-section bg-light">
<div class="container">


<!--Bookings-->
		<div class="row justify-content-center pb-5 mb-3 ">

		<div class="col-md-12 heading-section text-center ftco-animate">
			<h3>Booking History!</h3>
		</div>
		</div>

		<div class="row">	

		@foreach($book_request->reverse() as $value)
                    
					@if ($value->customer_email == $user->email)

					  
						@foreach($drivers->reverse() as $d_value)
						   @foreach($users->reverse() as $u_value)
	   
							  @if ($d_value->email == $value->driver_email )
							       @if ($u_value->email == $value->driver_email )

								   

								        <div class="col-md-4 ftco-animate" >
						
												<div class="card text-center">
												<div class="card-header">
													Book: #{{$value->id}}
												</div>
												<div class="card-body">
													<h5 class="card-title">{{$value->vehicle_category}} Driver: {{$u_value->name}}</h5>
													<h5 class="card-title">Phone: {{$value->driver_phone}}</h5>
													<h5 class="card-title"> Trip Time: {{$value->trip_time}}</h5>
													<h5 class="card-title">Where To: {{$value->where_to}}</h5>
													<h5 class="card-title">Destination: {{$value->destinetion}}</h5>
													<h5 class="card-title">Trip Status: {{$value->trip_status}}</h5>


													@foreach($book_response->reverse() as $book_response_value)
													   @if ($book_response_value->customer_email == $value->customer_email && $book_response_value->book_id == $value->id )
														<p class="card-text">Trip Amount: {{$book_response_value->response_amount}} BDT</p>

														<form  action="{{ route('customer.bookRespose') }}" method="POST" enctype="multipart/form-data" >
                                                            @csrf
																<label>Your Response!</label>
																<input type="number" name="response_id" class="form-control" value="{{$book_response_value->id}}" hidden>
																<select style=" background: light !important;"  name="response_status" required id="product_category">
																	<option  value="Pending" {{$book_response_value->response_status == "Pending"  ? 'selected' : ''}} >Pending</option>
																	<option  value="Accept" {{$book_response_value->response_status == "Accept"  ? 'selected' : ''}} >Accept</option>
																	<option  value="Cancel" {{$book_response_value->response_status == "Cancel"  ? 'selected' : ''}} >Cancel</option>
																</select>
																@if ($book_response_value->response_status != "Accept" && $book_response_value->response_status != "Cancel" )
																<center> <input type="submit"  class="btn btn-primary " value="Save Response"/> </center>  
																@endif          
                                                        </form> 			
														
														@endif 
													@endforeach
													
												</div>
												<div class="card-footer text-muted">
													Booking Palce at: {{$value->created_at}}
												</div>
												</div>
										</div>		
									
									@endif  
				               @endif                                                                                                                                     
                                      
						   @endforeach
					    @endforeach 

					@endif    		

		@endforeach

		</div>


<!--End Bookings-->


	</div>


    </section>

@endsection