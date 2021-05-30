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
<title>Drivers</title>
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                
              </div>
              <div class="card-body all-icons">
                <div class="row">


                  @foreach($users->reverse() as $value)
                    
                                 @if ($value->driver == 1)
                                        @foreach($drivers->reverse() as $d_value)
                    
                                           @if ($d_value->email == $value->email  )
                                      
                                              <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                                <div class="font-icon-detail">
                                                    <a href="{{route('admin.updateDriverGet',$d_value->id)}}" ><img id="previewProfile" src="{{$d_value->profileimage}}" class="avatar" style="max-width:130px; margin-top:20px;"/></a>
                                                    <p>Users Name: {{$value->name}}</p>
                                                    <p> Status: {{$d_value->driver_profile}}</p>
                                                    <p> Email: {{$d_value->email}}</p>
                                                </div>
                                              </div>
                                             
                                           @endif                                                                                                                                     
                                      
                                          @endforeach
                               
                                 @endif    

                

                        @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection