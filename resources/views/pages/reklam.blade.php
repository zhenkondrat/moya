@extends('layouts.master')
@section('body')
    <section class="reklam-detail">
		<div class="container">
				<div class="row">
					<div class="h6 btn">Подробная информация о рекламке</div>
					<div class="col-xs-12 ">
							{{ucfirst(trans($reklam->name))}}	
							{{$reklam->getEnd()}}			
							{{$reklam->getDays()}}
							<?php $rekl_sale = App\Shop::where('id', '=', $reklam->shops[0])->first()->sale;  ?>
							<img src="{{URL::to('/')}}/{{$rekl_sale[0]['logo']}}">						
							
					</div>
				</div>
				<div class="row">
					<div class="h6 btn">Картинки з газетки</div>
					<div class="col-xs-12 ">
							<div class="xm-rorate" id="id-xm-rorate">
							<ul class="xm-rorate-img clearfix" id="id-xm-content">
								@foreach ($reklam->magazines as $magaz)  
									<li><a href="#" target="_blank"><img src="{{URL::to('/')}}/{{$magaz->image}}" alt="#"></a></li>
								@endforeach	
							</ul>
							<ul class="xm-rorate-con clearfix" id="id-xm-control">
								@foreach ($reklam->magazines as $magaz)  
									<li><img src="{{URL::to('/')}}/{{$magaz->image}}" alt="#"></li>
								@endforeach	
								<li class="xm-rorate-slider" id="id-xm-slider"></li>
							</ul>
							</div>
							@foreach ($reklam->magazines as $magaz)  
								{{-- <div class="slide item"><a class="fancybox" href="{{URL::to('/')}}/{{$magaz->image}}" ><img src="{{URL::to('/')}}/{{$magaz->image}}"></a></div> --}}	
							@endforeach	
						
					</div>
				</div>							
				<div class="row">
					<div class="h6 btn">Товар в газетке</div>
					<div class="col-xs-12 ">
						@foreach ($reklam->products as $product)  
							{{$product->name}}
						@endforeach	
					</div>
				</div>	
		</div>		
	</section>
@stop