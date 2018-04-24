@extends((Auth::user() != null && Auth::user()->IsAdmin == 1) ? 'layouts.app' : 'layouts.apphome')

@section('title', $userdata[3]->name . ' | Profile')

@section('content')

@if(Auth::user() != null && Auth::user()->IsAdmin == 1)
<div class="container" style="margin-top: 3%">
    <div class="row edit-profile">
        <div class="col-4 edit-prof-pic">
            <img alt="User Pic" src="/storage/profile_image/{{$userdata[3]->profile_image}}" class="img-circle img-responsive"
            id="user-ava">
            <h3 class="panel-title user-main-name">{{$userdata[3]->name}}</h3>
        </div>
        <div class="col-8">
            <div class="profile-content">
            <h1 id="profile-header"> MY PROFILE </h1>
            <div class="profile-info">
                <div class=" col-md-9 col-lg-9 "> 
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td class="user-info-left">Name</td>
                                <td>{{$userdata[3]->name}}</td>
                            </tr>
                            <tr>
                                <td class="user-info-left">Phone Number</td>
                                <td>{{$userdata[3]->phone_number}}                            
                            </tr>
                            <tr>
                                <td class="user-info-left">Company</td>
                                <td>{{$userdata[3]->company}}</td>
                            </tr>
                            <tr>
                                <td class="user-info-left">Interest</td>
                                <td>{{$userdata[3]->interest}}</td>
                            </tr>
                            <tr>
                                <td class="user-info-left">Address</td>
                                <td>{{$userdata[3]->address}}</td>
                            </tr>
                            @if(Auth::guard('member')->user() != null && Auth::guard('member')->user()->id == $userdata[3]->id)
                                @if(Auth::guard('member')->user()->email != null)
                                    <tr>
                                        <td class="user-info-left">
                                            Google Account
                                        </td>
                                        <td>
                                            <a href="/link/google" data-original-title="Edit Google Link" 
                                                data-toggle="tooltip" type="button" class="btn btn-sm btn-warning">
                                                {{Auth::guard('member')->user()->email}} <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                                @if(Auth::guard('member')->user()->facebook_email != null)
                                    <tr>
                                        <td class="user-info-left">
                                            Facebook Account
                                        </td>
                                        <td>
                                            <a href="/link/facebook/delete" data-original-title="Delete Facebook Link" 
                                                data-toggle="tooltip" type="button" class="btn btn-sm btn-danger">
                                                {{Auth::guard('member')->user()->facebook_email}} <i class="glyphicon glyphicon-remove"></i> 
                                            </a>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="user-info-left">
                                            Facebook Account
                                        </td>
                                        <td>
                                            <a href="/link/facebook" data-toggle="tooltip" type="button" class="btn btn-sm btn-success">
                                                Link facebook account
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                                @if(Auth::guard('member')->user()->linkedin_email != null)
                                    <tr>
                                        <td class="user-info-left">
                                            Linkedin Account
                                        </td>
                                        <td>
                                            <a href="/link/linkedin/delete" data-original-title="Delete Linkedin Link" 
                                                data-toggle="tooltip" type="button" class="btn btn-sm btn-danger">
                                                {{Auth::guard('member')->user()->linkedin_email}} <i class="glyphicon glyphicon-remove"></i> 
                                            </a>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="user-info-left">
                                            Linkedin Account
                                        </td>
                                        <td>
                                            <a href="/link/linkedin" data-toggle="tooltip" type="button" class="btn btn-sm btn-success">
                                                Link linkedin account
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                            <div class="edit-profile-button">
                                @if((Auth::user() != null && Auth::user()->IsAdmin == 1) || (Auth::guard('member')->user() != null && Auth::guard('member')->user()->id == $userdata[3]->id))
                                    <a href="/members/{{$userdata[3]->id}}/edit" data-original-title="Edit this user" 
                                        data-toggle="tooltip" type="button" class="btn btn-sm btn-warning">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                @endif
                                @if(!Auth::guest() &&  Auth::user()->IsAdmin == 1)
                                    <a onclick="return confirm('Do you want to delete this member?')" href="/members/{{$userdata[3]->id}}/delete" data-original-title="Delete this user" 
                                        data-toggle="tooltip" type="button" class="btn btn-sm btn-danger pull-right">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </a>
                                @endif
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>    
@else
<div>
    <div class="row edit-profile">
        <div class="col-12">
            <img alt="User Pic" src="/storage/profile_image/{{$userdata[3]->profile_image}}" class="img-circle img-responsive"
            id="user-ava">
            <h3 class="panel-title user-main-name">{{$userdata[3]->name}}</h3>
            <h3 class="panel-title nim">{{$userdata[3]->nim}}</h3>
        </div>        
        <div class="col-md-5 col-md-offset-3-5 col-xs-12 edit-prof-pic">
            <div class="row user-services">
                <div class="col-6 user-services-questions">
                    {{count($userdata[1])}}
                </div>
                <div class="col-6 user-services-answers">
                    {{count($userdata[2])}}
                </div>
            </div>
            <div class="row">
                <div class="col-6 user-services-questions-text">
                    Questions Asked
                </div>
                <div class="col-6 user-services-answers-text">
                    Answers Submitted
                </div>
            </div>
        </div>   
        <div class="col-2 col-md-offset-5 col-xs-offset-5 profile-navigation-container">
            <ul>
                <li><a href="#profile" class="page-scroll profile-navigation"><i class="fa fa-angle-double-down"></i></a></li>
            </ul> 
        </div>
    </div>
 
    <section id="profile">
        <div>
            <div class="section pull-right" style="padding: 1em 2em 0 0">
                @if((Auth::user() != null && Auth::user()->IsAdmin == 1) || (Auth::guard('member')->user() != null && Auth::guard('member')->user()->id == $userdata[3]->id))
                    <a href="/members/{{$userdata[3]->id}}/edit" data-original-title="Edit this user" 
                        data-toggle="tooltip" type="button" class="btn btn-sm btn-warning" style="margin-bottom: 1em">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a><br>
                @endif
                @if(!Auth::guest() &&  Auth::user()->IsAdmin == 1)
                    <a onclick="return confirm('Do you want to delete this member?')" href="/members/{{$userdata[3]->id}}/delete" data-original-title="Delete this user" 
                        data-toggle="tooltip" type="button" class="btn btn-sm btn-danger pull-right">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="profile-info">
                    <div class="col-md-8 col-lg-5 col-md-offset-2 col-lg-offset-3-5"> 
                        <table class="table table-user-information">
                            <tbody>
                                <tr>
                                    <td class="user-info-left">Name</td>
                                    <td>{{$userdata[3]->name}}</td>
                                </tr>
                                <tr>
                                    <td class="user-info-left">Phone Number</td>
                                    <td>{{$userdata[3]->phone_number}}</td>                          
                                </tr>
                                <tr>
                                    <td class="user-info-left">Company</td>
                                    <td>{{$userdata[3]->company}}</td>
                                </tr>
                                <tr>
                                    <td class="user-info-left">Interest</td>
                                    <td>{{$userdata[3]->interest}}</td>
                                </tr>
                                <tr>
                                    <td class="user-info-left">Address</td>
                                    <td>{{$userdata[3]->address}}</td>
                                </tr>
                                @if(Auth::guard('member')->user() != null && Auth::guard('member')->user()->id == $userdata[3]->id)
                                    @if(Auth::guard('member')->user()->email != null)
                                        <tr>
                                            <td class="user-info-left">
                                                Google Account
                                            </td>
                                            <td>
                                                <a href="/link/google" data-original-title="Edit Google Link" 
                                                    data-toggle="tooltip" type="button" class="btn btn-sm btn-warning">
                                                    {{Auth::guard('member')->user()->email}} <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if(Auth::guard('member')->user()->facebook_email != null)
                                        <tr>
                                            <td class="user-info-left">
                                                Facebook Account
                                            </td>
                                            <td>
                                                <a href="/link/facebook/delete" data-original-title="Delete Facebook Link" 
                                                    data-toggle="tooltip" type="button" class="btn btn-sm btn-danger">
                                                    {{Auth::guard('member')->user()->facebook_email}} <i class="glyphicon glyphicon-remove"></i> 
                                                </a>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td class="user-info-left">
                                                Facebook Account
                                            </td>
                                            <td>
                                                <a href="/link/facebook" data-toggle="tooltip" type="button" class="btn btn-sm btn-success">
                                                    Link facebook account
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if(Auth::guard('member')->user()->linkedin_email != null)
                                        <tr>
                                            <td class="user-info-left">
                                                Linkedin Account
                                            </td>
                                            <td>
                                                <a href="/link/linkedin/delete" data-original-title="Delete Linkedin Link" 
                                                    data-toggle="tooltip" type="button" class="btn btn-sm btn-danger">
                                                    {{Auth::guard('member')->user()->linkedin_email}} <i class="glyphicon glyphicon-remove"></i> 
                                                </a>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td class="user-info-left">
                                                Linkedin Account
                                            </td>
                                            <td>
                                                <a href="/link/linkedin" data-toggle="tooltip" type="button" class="btn btn-sm btn-success">
                                                    Link linkedin account
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endif
@endsection