@extends('layouts.master')
@section('body')

<div class="container">
		<div class="row">
			<div class=" col-xs-12 col-sm-4 col-sm-offset-4">
				{{ Form:: open(array('url'=>'contact','method'=>'POST', 'id'=>'myform')) }} 
					<div class>
						{{ Form:: label ('first_name', 'Фамилия*' )}}
						{{ Form:: text ('first_name', '' )}}
					</div>
					<div class>
						{{ Form:: label ('last_name', 'Имя*' )}}
						{{ Form:: text ('last_name', '' )}}
					</div>
					<div class>
						{{ Form:: label ('phone_number', 'Номер телефона' )}}
						{{ Form:: text ('phone_number', '', array('placeholder' => '0971234567')) }}
					</div>
					<div class>
						{{ Form:: label ('email', 'E-mail*') }}
						{{ Form:: email ('email', '', array('placeholder' => 'me@example.com', 'class' => '')) }}
					</div>
					<div class>
						{{ Form:: label ('messager', 'Сообщение*' )}}
						{{ Form:: textarea ('messager', '')}}
					</div>
					<div class>
						{{ Form::reset('Очистить поля', array('class' => 'btn-primary')) }}
					</div>
					<div class>
						{{-- <div class="g-recaptcha" data-sitekey="6Lc_UwoUAAAAAOWFpLOALeA4H5d96Px2Z4mfTWoN" style="display:block;"></div> --}}
						{!! app('captcha')->display(); !!}
					</div>
					<div class>
						{{ Form::submit('Отправить', array('class' => 'btn btn-primary')) }}
					</div>
				{{ Form:: close() }}
			</div>
		</div>
</div>

@stop