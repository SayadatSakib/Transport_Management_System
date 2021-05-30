<title>Transport Management System</title>

@extends('layouts.app')

@section('content')
<section class="ftco-section bg-light">
    	<div class="container">




<!--Heavy Truck-->

<div class="row justify-content-center pb-5 mb-3">

<div class="col-md-7 heading-section text-center ftco-animate">
	<h3>Our Heavy Truck Drivers</h3><br><br>
</div>
</div>


<div class="row">	


@foreach($users->reverse() as $value)
			
			@if ($value->driver == 1)
				   @foreach($drivers->reverse() as $d_value)

					  @if ($d_value->email == $value->email && $d_value->v_category == 1 && $d_value->driver_profile == "Approved" && $d_value->driver_status == 1 )

							<div class="col-md-3 ftco-animate">
								<div class="text-center" style="position: relative; top: -25px; margin-bottom: -90px;">
								<a href="{{route('customer.getDriver',$d_value->id)}}"> <img style="height: 100px; width: 100px; border-radius: 50%; border: 5px solid rgba(255,255,255,0.5); position: relative; " src="{{$d_value->profileimage}}" class="img-fluid" alt="Responsive image"> </a>
								</div>
							<div class="block-7">
							<a href="{{route('customer.getDriver',$d_value->id)}}">
								<div class="img" style="max-height: 160px; max-width: 1080px; background-image: url('{{$d_value->vehicleimage}}');"></div>
							</a>
							</div>
							</div>

					   @endif                                                                                                                                     
							  
				   @endforeach
				   
			@endif    		

@endforeach


</div>
<!--End Heavy Truck-->



<!--Car-->

		<div class="row justify-content-center pb-5 mb-3">

		<div class="col-md-7 heading-section text-center ftco-animate">
			<h3>Our Car Drivers</h3><br><br>
		</div>
		</div>


		<div class="row">	


		@foreach($users->reverse() as $value)
                    
					@if ($value->driver == 1)
						   @foreach($drivers->reverse() as $d_value)
	   
							  @if ($d_value->email == $value->email && $d_value->v_category == 2 && $d_value->driver_profile == "Approved" && $d_value->driver_status == 1 )

							        <div class="col-md-3 ftco-animate">
									    <div class="text-center" style="position: relative; top: -25px; margin-bottom: -90px;">
										<a href="{{route('customer.getDriver',$d_value->id)}}"> <img style="height: 100px; width: 100px; border-radius: 50%; border: 5px solid rgba(255,255,255,0.5); position: relative; " src="{{$d_value->profileimage}}" class="img-fluid" alt="Responsive image"> </a>
										</div>
									<div class="block-7">
									<a href="{{route('customer.getDriver',$d_value->id)}}">
										<div class="img" style="max-height: 160px; max-width: 1080px; background-image: url('{{$d_value->vehicleimage}}');"></div>
									</a>
									</div>
									</div>

				               @endif                                                                                                                                     
                                      
						   @endforeach
						   
					@endif    		

		@endforeach


    	</div>
<!--End Car-->



<!--Covered Van-->

<div class="row justify-content-center pb-5 mb-3">

<div class="col-md-7 heading-section text-center ftco-animate">
	<h3>Our Covered Van Drivers</h3><br><br>
</div>
</div>


<div class="row">	


@foreach($users->reverse() as $value)
			
			@if ($value->driver == 1)
				   @foreach($drivers->reverse() as $d_value)

					  @if ($d_value->email == $value->email && $d_value->v_category == 3 && $d_value->driver_profile == "Approved" && $d_value->driver_status == 1 )

							<div class="col-md-3 ftco-animate">
								<div class="text-center" style="position: relative; top: -25px; margin-bottom: -90px;">
								<a href="{{route('customer.getDriver',$d_value->id)}}"> <img style="height: 100px; width: 100px; border-radius: 50%; border: 5px solid rgba(255,255,255,0.5); position: relative; " src="{{$d_value->profileimage}}" class="img-fluid" alt="Responsive image"> </a>
								</div>
							<div class="block-7">
							<a href="{{route('customer.getDriver',$d_value->id)}}">
								<div class="img" style="max-height: 160px; max-width: 1080px; background-image: url('{{$d_value->vehicleimage}}');"></div>
							</a>
							</div>
							</div>

					   @endif                                                                                                                                     
							  
				   @endforeach
				   
			@endif    		

@endforeach


</div>
<!--End Covered Van-->


<!--Micro Bus-->

<div class="row justify-content-center pb-5 mb-3">

<div class="col-md-7 heading-section text-center ftco-animate">
	<h3>Our Micro Bus Drivers</h3><br><br>
</div>
</div>


<div class="row">	


@foreach($users->reverse() as $value)
			
			@if ($value->driver == 1)
				   @foreach($drivers->reverse() as $d_value)

					  @if ($d_value->email == $value->email && $d_value->v_category == 4 && $d_value->driver_profile == "Approved" && $d_value->driver_status == 1 )

							<div class="col-md-3 ftco-animate">
								<div class="text-center" style="position: relative; top: -25px; margin-bottom: -90px;">
								<a href="{{route('customer.getDriver',$d_value->id)}}"> <img style="height: 100px; width: 100px; border-radius: 50%; border: 5px solid rgba(255,255,255,0.5); position: relative; " src="{{$d_value->profileimage}}" class="img-fluid" alt="Responsive image"> </a>
								</div>
							<div class="block-7">
							<a href="{{route('customer.getDriver',$d_value->id)}}">
								<div class="img" style="max-height: 160px; max-width: 1080px; background-image: url('{{$d_value->vehicleimage}}');"></div>
							</a>
							</div>
							</div>

					   @endif                                                                                                                                     
							  
				   @endforeach
				   
			@endif    		

@endforeach


</div>
<!--End Micro Bus-->


<!--CNG-->

<div class="row justify-content-center pb-5 mb-3">

<div class="col-md-7 heading-section text-center ftco-animate">
	<h3>Our CNG Drivers</h3><br><br>
</div>
</div>


<div class="row">	


@foreach($users->reverse() as $value)
			
			@if ($value->driver == 1)
				   @foreach($drivers->reverse() as $d_value)

					  @if ($d_value->email == $value->email && $d_value->v_category == 5 && $d_value->driver_profile == "Approved" && $d_value->driver_status == 1 )

							<div class="col-md-3 ftco-animate">
								<div class="text-center" style="position: relative; top: -25px; margin-bottom: -90px;">
								<a href="{{route('customer.getDriver',$d_value->id)}}"> <img style="height: 100px; width: 100px; border-radius: 50%; border: 5px solid rgba(255,255,255,0.5); position: relative; " src="{{$d_value->profileimage}}" class="img-fluid" alt="Responsive image"> </a>
								</div>
							<div class="block-7">
							<a href="{{route('customer.getDriver',$d_value->id)}}">
								<div class="img" style="max-height: 160px; max-width: 1080px; background-image: url('{{$d_value->vehicleimage}}');"></div>
							</a>
							</div>
							</div>

					   @endif                                                                                                                                     
							  
				   @endforeach
				   
			@endif    		

@endforeach


</div>
<!--End CNG-->


<!--Mini Truck-->

<div class="row justify-content-center pb-5 mb-3">

<div class="col-md-7 heading-section text-center ftco-animate">
	<h3>Our Mini Truck Drivers</h3><br><br>
</div>
</div>


<div class="row">	


@foreach($users->reverse() as $value)
			
			@if ($value->driver == 1)
				   @foreach($drivers->reverse() as $d_value)

					  @if ($d_value->email == $value->email && $d_value->v_category == 6 && $d_value->driver_profile == "Approved" && $d_value->driver_status == 1 )

							<div class="col-md-3 ftco-animate">
								<div class="text-center" style="position: relative; top: -25px; margin-bottom: -90px;">
								<a href="{{route('customer.getDriver',$d_value->id)}}"> <img style="height: 100px; width: 100px; border-radius: 50%; border: 5px solid rgba(255,255,255,0.5); position: relative; " src="{{$d_value->profileimage}}" class="img-fluid" alt="Responsive image"> </a>
								</div>
							<div class="block-7">
							<a href="{{route('customer.getDriver',$d_value->id)}}">
								<div class="img" style="max-height: 160px; max-width: 1080px; background-image: url('{{$d_value->vehicleimage}}');"></div>
							</a>
							</div>
							</div>

					   @endif                                                                                                                                     
							  
				   @endforeach
				   
			@endif    		

@endforeach


</div>
<!--End Mini Truck-->


<!--Truck-->
<div class="row justify-content-center pb-5 mb-3">

<div class="col-md-7 heading-section text-center ftco-animate">
	<h3>Our Truck Drivers</h3><br><br>
</div>
</div>

<div class="row">	


@foreach($users->reverse() as $value)
			
			@if ($value->driver == 1)
				   @foreach($drivers->reverse() as $d_value)

					  @if ($d_value->email == $value->email && $d_value->v_category == 7 && $d_value->driver_profile == "Approved" && $d_value->driver_status == 1)
				
							<div class="col-md-3 ftco-animate">
								<div class="text-center" style="position: relative; top: -25px; margin-bottom: -90px;">
								<a href="{{route('customer.getDriver',$d_value->id)}}"> <img style="height: 100px; width: 100px; border-radius: 50%; border: 5px solid rgba(255,255,255,0.5); position: relative; " src="{{$d_value->profileimage}}" class="img-fluid" alt="Responsive image"> </a>
								</div>
							<div class="block-7">
							<a href="{{route('customer.getDriver',$d_value->id)}}">
								<div class="img" style="max-height: 160px; max-width: 1080px; background-image: url('{{$d_value->vehicleimage}}');"></div>
							</a>
							</div>
							</div>

					   @endif                                                                                                                                     
							  
				   @endforeach
				   
			@endif    		

@endforeach

</div>		


<!--End Truck-->





    </section>

@endsection