@component('mail::message')
Welcome {{$admin->name }}

The body of your message.

@component('mail::button', ['url' => route('admin.activated',
						 			['email'=>$admin->email,'token' => $admin->email_token])
						 ]
			)
Verify Your Email 
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
