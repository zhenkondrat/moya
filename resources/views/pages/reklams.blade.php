@extends('layouts.master')
@section('body')
    <section class="sidebar">
		<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-3">	
						<div class="h6 filter-reklams">
							<i class="fa fa-clock-o" aria-hidden="true"></i>
							<a class="filter-reklams-a <?php if ($activedata==1) echo 'active'; ?>" href="{{URL::to('/reklams/all')}}">Все</a>
							<a class="filter-reklams-a <?php if ($activedata==2) echo 'active'; ?>" href="{{URL::to('/reklams/actual')}}">Актуальные</a>
							<a class="filter-reklams-a <?php if ($activedata==3) echo 'active'; ?>" href="{{URL::to('/reklams/soon')}}">Будущие</a>
						</div>

						<div class="h6 btn">Категории</div>
						@foreach ($categories as $cat)  
							<a href="{{URL::to('/reklams')}}/{{$cat->id}}" class="white-btn btn ta-left darknes fullw">
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
						<div class="h6 btn">Актуальные рекламки</div>
						<div class="wrapp list-rekl" style="">
									
							@foreach ($reklams as $rekl)  
								<div class="slide item"><a class="fancybox" href="{{URL::to('reklam')}}/{{$rekl->id}}" ><div class="slide-text-r shadow" style="display:block;">{{$rekl->name}}</div><img src="{{URL::to('/')}}/{{$rekl->image}}"><div class="slide-text-r slide-date-r" style="display:block;">До конца осталось {{$rekl->getDays()}}дней</div></a></div>
							@endforeach

						</div>
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
							<div class="sale-detail"> 
								<a href="{{URL::to('sales/all')}}" class="black-btn btn centr">Все торговые сети</a>
							</div>
					</div>
				</div>
			</div>
		</div>				
	</section>
@stop