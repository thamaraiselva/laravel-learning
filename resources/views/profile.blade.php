<!-- @extends('layouts.app') -->

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Profile</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    
          <form method="post" action="{{isset($profile_data->id) ? route('profile.update',$profile_data->id) :route('profile.store')}}">
          @if(isset($profile_data->id))
            @method('PATCH')
          @endif
          @csrf
          <div class="form-group">    
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" name="first_name" value="{{isset($profile_data->first_name) ? $profile_data->first_name :' '}}"/>
          </div>

          <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" name="last_name" value="{{isset($profile_data->last_name) ? $profile_data->last_name :' '}}"/>
          </div>
           <div class="form-group">
            <label for="Gender">Gender</label>
            <select class="form-control" name="Gender">
              <option {{(isset($profile_data->Gender) && $profile_data->Gender=='male') ? 'selected':' '}} value="male">Male</option>
              <option value="female" {{(isset($profile_data->Gender) && $profile_data->Gender=='female') ? 'selected':' '}} >Female</option>
              <option value="other" {{(isset($profile_data->Gender) && $profile_data->Gender=='other') ? 'selected':' '}} >Other</option>
            </select>
          </div> 
          <div class="form-group">
              <label for="city">City:</label>
              <input type="text" class="form-control" name="city" value="{{isset($profile_data->city) ? $profile_data->city :' '}}"/>
          </div>
          <!-- <div class="form-group">
              <label for="city">City:</label>
              <input type="file" class="form-control" name="city"/>
          </div> -->
          <div class="form-group">
              <label for="country">Country:</label>
              <input type="text" class="form-control" name="country" value="{{isset($profile_data->country) ? $profile_data->country :' '}}"/>
          </div>
          <div class="form-group">
              <label for="job_title">Job Title:</label>
              <input type="text" class="form-control" name="job_title" value="{{isset($profile_data->job_title) ? $profile_data->job_title :' '}}"/>
          </div>                      
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>
</div>
@endsection