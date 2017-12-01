@component('mail::message')
Welcome {{$user->name }}

The body of your message.

@component('mail::button', ['url' => route('activated',
						 			['email'=>$user->email,'token' => $user->email_token])
						 ]
			)
Verify Your Email 
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
