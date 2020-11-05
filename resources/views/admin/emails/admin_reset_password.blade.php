@component('mail::message')
# Reset Acount

Welcome {{$data['data']->name}}

@component('mail::button', ['url' => aurl('reset/password/' . $data['token'])])
Reset Password
@endcomponent

OR <br>
Copy This Link

<a href="{{aurl('reset/password/' . $data['token'])}}">{{aurl('reset/password/' . $data['token'])}}</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
