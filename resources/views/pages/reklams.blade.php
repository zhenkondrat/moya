@extends('layouts.master')
@section('body')
    <section class="sidebar">
		<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-3">	
						@foreach ($categories as $cat)  
							<a class="white-btn btn"> {{$cat->name}}</a>	
						@endforeach
					</div>
					<div class="col-sm-6 col-md-9">	
						@foreach ($reklams as $rekl)  
							<div class="slide item"><a class="fancybox" href="{{$rekl->image}}" ><img src="{{$rekl->image}}"></a></div>
						@endforeach
					</div>
				</div>
			</div>
		</div>				
	</section>
@stop