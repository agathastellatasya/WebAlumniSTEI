@extends((Auth::user() != null && Auth::user()->IsAdmin == 1) ? 'layouts.app' : 'layouts.apphome')

@section('title', $user->name . ' | Update Profile')

@section('content')
@if(Auth::user() != null && Auth::user()->IsAdmin == 1)
<div class="container" style="margin-top: 3%">
    <div class="row edit-profile">
        <div class="col-4 edit-prof-pic">
            <img alt="User Pic" src="/storage/profile_image/{{$user->profile_image}}" class="img-circle img-responsive"
            id="user-ava">
            <h3 class="panel-title user-main-name">{{$user->name}}</h3>
        </div>
        <div class="col-8">
            <div class="profile-content">
                <h1 id="profile-header"> MY PROFILE </h1>
                <div class="profile-info">
                    <div class=" col-md-9 col-lg-9 "> 
                        {!! Form::open(['action' => ['MembersController@update',$user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <table class="table table-user-information">
                            <tbody>
                                <tr>
                                    <td class="user-info-left">Profile Picture</td>
                                    <td>
                                        {{Form::file('profile_image')}} 
                                    </td>
                                </tr>
                                <tr>
                                    <td class="user-info-left">Phone Number</td>
                                    <td>
                                        {{Form::text('phone_number', $user->phone_number, ['class' => 'form-control'])}}
                                    </td>                         
                                </tr>
                                <tr>
                                    <td class="user-info-left">Company</td>
                                    <td>
                                        {{Form::text('company', $user->company, ['class' => 'form-control'])}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="user-info-left">Interest</td>
                                    <td>
                                        {{Form::text('interest', $user->interest, ['class' => 'form-control'])}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="user-info-left">Address</td>
                                    <td>
                                        {{Form::text('address', $user->address, ['class' => 'form-control'])}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        {{Form::hidden('_method', 'PUT')}}
                        {{Form::submit('Submit', ['class' => 'btn btn-primary pull-left'])}}
                        <a onclick="return confirm('Are you sure you want to cancel?')" href="/members/{{$user->id}}" class="btn btn-danger pull-left" style="margin-left: 20px">Cancel</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div>
        <div class="row edit-profile">
            <div class="col-12">
                <img alt="User Pic" src="/storage/profile_image/{{$user->profile_image}}" class="img-circle img-responsive"
                id="user-ava">
                <h3 class="panel-title user-main-name">{{$user->name}}</h3>
            </div>          
            <div class="col-2 col-md-offset-5 col-xs-offset-5 profile-navigation-container">
                <ul>
                    <li><a href="#profile" class="page-scroll profile-navigation"><i class="fa fa-angle-double-down"></i></a></li>
                </ul> 
            </div>
        </div>
     
        <section id="profile">
            <div class="row">
                <div class="col-12">
                    <div class="profile-info">
                        <div class="col-md-8 col-lg-5 col-md-offset-2 col-lg-offset-3-5"> 
                            {!! Form::open(['action' => ['MembersController@update',$user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td class="user-info-left">Profile Picture</td>
                                        <td>
                                            {{Form::file('profile_image')}} 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="user-info-left">Phone Number</td>
                                        <td>
                                            {{Form::text('phone_number', $user->phone_number, ['class' => 'form-control'])}}
                                        </td>                         
                                    </tr>
                                    <tr>
                                        <td class="user-info-left">Company</td>
                                        <td>
                                            {{Form::text('company', $user->company, ['class' => 'form-control'])}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="user-info-left">Interest</td>
                                        <td>
                                            {{Form::text('interest', $user->interest, ['class' => 'form-control'])}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="user-info-left">Address</td>
                                        <td>
                                            {{Form::text('address', $user->address, ['class' => 'form-control'])}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            {{Form::hidden('_method', 'PUT')}}
                            {{Form::submit('Submit', ['class' => 'btn btn-primary pull-left'])}}
                            <a onclick="return confirm('Are you sure you want to cancel?')" href="/members/{{$user->id}}" class="btn btn-danger pull-left" style="margin-left: 20px">Cancel</a>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endif
@endsection

<!-- <div class="container">
    <h2 class="sub-title">Edit Profile</h2>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >  
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$user->name}}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" 
                        src="/storage/profile_image/{{$user->profile_image}}"
                        class="img-circle img-responsive" id="">
                        </div>
                        
                        <div class=" col-md-9 col-lg-9 "> 
                            {!! Form::open(['action' => ['MembersController@update',$user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group">
                                {{Form::label('profile_image','Profile Image')}}
                                {{Form::file('profile_image')}}
                               
                                {{Form::label('email','Email')}} 
                                {{Form::text('email', $user->email , ['class' => 'form-control'])}}

                                {{Form::label('phone_number','Phone Number')}}
                                {{Form::text('phone_number', $user->phone_number, ['class' => 'form-control'])}}

                                {{Form::label('company','Company')}}
                                {{Form::text('company', $user->company, ['class' => 'form-control'])}}
                                
                                {{Form::label('interest','Interest')}}
                                {{Form::text('interest', $user->interest, ['class' => 'form-control'])}}

                                {{Form::label('address','Address')}}
                                {{Form::text('address', $user->address, ['class' => 'form-control'])}}
                            </div>
                            {{Form::hidden('_method', 'PUT')}}
                            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                            <a onclick="return confirm('Are you sure you want to cancel?')" href="/members/{{$user->id}}" class="btn btn-danger pull-right">Cancel</a>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->