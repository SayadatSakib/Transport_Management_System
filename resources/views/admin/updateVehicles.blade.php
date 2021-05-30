@extends('admin/layouts.adminapp')
<style>
.avatar {
  vertical-align: middle;
  width: 100px !important;
  height: 100px !important;
  border-radius: 50%;
}
</style>
@section('content')
<title>Update Vehicle</title>

<div class="row justify-content-center">
       
        <div class="col-sm-3">

        <h6 class="text-center" style="font-weight: bold;">Update Vehicle!</h6>

          <form class="text-left border border-dark p-2" method="POST" action="{{ route('admin.updatVehiclePost') }}" enctype="multipart/form-data">         
               @csrf
               <input type="text" name="v_id" class="form-control mb-4" value="{{$vehicles->id}}" hidden >
               <a class = "label label-left">Vehicle</a>
               <input type="text" name="vehicleName" class="form-control mb-4" value="{{$vehicles->vehicle}}" required>

                     <div class="form-group">
                         <label for="Shop Category">Vehicle Category</label>
                              <select style="color: white !important; background-color: dark !important;" class="form-control" name="vehicleCategory" id="vehicle_category">       
                                 @foreach($vehicle_category as $value)
                                      <option style="background: black !important;" value="{{ $value->id }}" {{$value->id == $vehicles->category  ? 'selected' : ''}} >{{ $value->vehicle_categories }}</option>
                                 @endforeach
                              </select>
                    </div> 

               <!-- Send button -->
               <button class="btn btn-success" type="submit">Update</button><br>               
          </form>  
          </div>  
</div> 

@endsection