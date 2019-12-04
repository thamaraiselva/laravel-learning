<!-- @extends('layouts.app') -->

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
                <td><input type="button" value = "view"/></td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    </div>

@endsection