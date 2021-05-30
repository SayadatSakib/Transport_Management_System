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
<title>Update City</title>

<div class="row justify-content-center">
       
        <div class="col-sm-3">

        <h6 class="text-center" style="font-weight: bold;">Update City</h6>

          <form class="text-left border border-dark p-2" method="POST" action="{{ route('admin.updateCityPost') }}" enctype="multipart/form-data">         
               @csrf
               <input type="text" name="c_id" class="form-control mb-4" value="{{$cities->id}}" hidden >
               <a class = "label label-left">City</a>
               <input type="text" name="city" class="form-control mb-4" value="{{$cities->city}}" required>
               <!-- Send button -->
               <button class="btn btn-success" type="submit">Update</button><br>               
          </form>  
          </div>  
</div> 

@endsection