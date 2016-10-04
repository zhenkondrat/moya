@extends('layouts.master')
@section('body')
	<div class="container">
		<div class="row">
			<div class=" col-xs-12 col-sm-4 col-sm-offset-4">
			    {!! Form::open() !!}
			        @include('widgets.form._formitem_text', ['name' => 'email', 'title' => 'Email', 'placeholder' => 'Ваш Email' ])
			        @include('widgets.form._formitem_password', ['name' => 'password', 'title' => 'Пароль', 'placeholder' => 'Пароль' ])
			        @include('widgets.form._formitem_checkbox', ['name' => 'remember', 'title' => 'Запомнить меня'] )
			        @include('widgets.form._formitem_btn_submit', ['title' => 'Вход'])
			    {!! Form::close() !!}    
		    </br>
			<p><a href="{{URL::to('/reset')}}">Забыли пароль?</a></p>
		</div>
	</div>
</div>
@stop