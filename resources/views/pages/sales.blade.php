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
						@foreach ($sales as $sale)  
							<div class="brand-block">
								<div class="brand-logo"><img src="{{$sale->logo}}"></div>
								<a href=""><div class="brand-name">{{$sale->name}}</div></a>
							</div>
						@endforeach
					</div>

				</div>
			</div>
		</div>				
	</section>
@stop