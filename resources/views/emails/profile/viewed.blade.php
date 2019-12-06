@component('mail::message')
[$user->first_name] 
#has viewed your profile

To check his profile .

@component('mail::button', ['url' => 'view/'.$user->profile_url])
$user->first_name .'profile'
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
