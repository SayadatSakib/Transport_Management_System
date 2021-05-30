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
<title>Customers</title>
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              </div>
              <div class="card-body all-icons">
                <div class="row">


                  @foreach($users->reverse() as $value)
                    
                                 @if ($value->admin == 0 && $value->driver == 0)
                                        @foreach($customers->reverse() as $c_value)
                    
                                           @if ($c_value->email == $value->email  )
                                              <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6 col-xs-6">
                                                <div class="font-icon-detail">
                                                    <i ><img id="previewProfile" src="{{$c_value->profileimage}}" class="avatar" style="max-width:130px; margin-top:20px;"/></i>
                                                    <p>Users Name: {{$value->name}}</p>
                                                    <p> Email: {{$c_value->email}}</p>
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