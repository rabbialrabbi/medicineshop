@component('mail::message')
Dear {{$user->name}},

Thanks for register in our Site. Please Click the Button to start validate process
We will let you know when the validation is complete.


@component('mail::button', ['url' => route('user.validation',['data'=>$token])])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
