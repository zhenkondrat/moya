@extends('layouts.master')
@section('body')
    <section class="sidebar">
		<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-3">	
						<div class="h6 filter-reklams">
							<i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
							<a class="filter-reklams-a active" href="{{URL::to('/sales/sort')}}">от А до Я</a>
						</div>

						<div class="h6 btn">Категории</div>
						@foreach ($categories as $cat)  
							<a href="{{URL::to('/')}}/sales/{{$cat->id}}" class="white-btn btn ltl ta-left darknes fullw">
													<div class="row">
														<div class="col-xs-3">
															<img src="{{URL::to('/')}}/{{$cat->image}}" >
														</div>
														<div class="col-xs-9">
														 	<div class="cat-text"> {{$cat->name}} </div>
														 </div>
													</div>
												</a>	
						@endforeach
					</div>
					<div class="col-sm-6 col-md-9">	
						<div class="h6 btn">Торговые сети</div>
						<div class="">
									
							@foreach ($sales as $sale)  
								<div class="brand-block shadow">
									<div class="brand-logo"><img src="{{URL::to('/')}}/{{$sale->logo}}"></div>
									<a href="{{URL::to('sale/')}}/{{$sale->id}}"><div class="brand-name">{{$sale->name}}</div></a>
								</div>
							@endforeach

						</div>
					</div>
				</div>
							
		</div>				
	</section>
@stop