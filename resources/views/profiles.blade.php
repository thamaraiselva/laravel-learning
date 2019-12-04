@extends('layouts.app')

<style>

/* @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css") */


.social-btn-holder{
  padding:10px;
  margin-top:5px;
  margin-bottom:5px;
}
.social-btn-holder .btn-social{
  font-size:12px;
  font-weight:bold;
}

.btn-social{
  color: white;
  opacity:0.9;
}
.btn-social:hover {
  color: white;
  opacity:1;
}
.btn-facebook {
background-color: #3b5998;
}
.btn-twitter {
background-color: #00aced;
}
.btn-linkedin {
background-color:#0e76a8;
}
.btn-github{
  background-color:#000000;
}
.btn-google {
  background-color: #c32f10;
}
.btn-stackoverflow{
  background-color: #D38B28;
}

.btn-hackerrank{
  background-color: #27AB5B;
}
.btn-soundcloud{
  background-color: #FF7202;
}



.centered-text{
  text-align: center;
}

</style>

@section('main')
    <div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">Profiles</h1>    
    <table class="table table-striped">
        <thead>
            <tr>
            <td>ID</td>
            <td>Profile Image</td>
            <td>Name</td>
            <td colspan = 2>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($profiles as $profile)
            <tr>
                <td>{{$profile->id}}</td>
                <td>
                @php 
                $view_image=($profile->profile_image!='') ? $profile->profile_image : 'default.png';
                @endphp 
                <img id="profile" 
                    src="{{ Storage::url('profile-images/'.$view_image) }}"
                    style="width: 40px; height: 40px; border-radius: 20px;" >
                </img>
                </td>
                <td>{{$profile->first_name}}</td>
                <td><input type="button" class="btn btn-primary" value = "view" onclick="document.location.href='{{'view/'.$profile->profile_url}}';"/></td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    </div>
@endsection