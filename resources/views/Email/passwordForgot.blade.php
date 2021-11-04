@component('mail::message')
# Change password Request
Click on the buttin below to change password

@component('mail::button', ['url' => 'http://localhost:4200/reset-password?token='.$token]);
Rest Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
