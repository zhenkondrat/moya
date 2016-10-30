@extends('layouts.master')
@section('body')
	<?php $rekl_sale = App\Shop::where('id', '=', $reklam->shops[0])->first()->sale;  ?>
    <section class="reklam-detail">
		<div class="container">
				<div class="row">
					<div class="h6 btn">Подробная информация о рекламке</div>				
					<div class="sale_info_content">
						<div class="col-xs-12 col-md-3">
							<div class="sale-logo">
								<a href="{{ URL::to('/')}}/sale/{{$rekl_sale[0]['id']}}"><img src="{{ URL::to('/')}}/{{$rekl_sale[0]['logo']}}" width="100%"></a>
							</div>						
						</div>
						<?php 
							$raitavg = App\Respond::avgReiting($rekl_sale[0]['id']); 
							$numb = floor($raitavg);//ціла частина
							$last_numb = $raitavg - $numb;
							$last_numb = $last_numb*10;
							$last_numb = floor($last_numb);//десятки 
						?>
						<div class="col-xs-12 col-md-9">
							<div class="row">	
								<div class="col-xs-6 col-md-3"> 
									{{ucfirst(trans($reklam->name))}}	
									{{$reklam->getEnd()}}			
									{{$reklam->getDays()}}								
								</div>			
								<div class="col-xs-6 col-md-3">
									<span class="sale-font">Оценка сети: {{substr($raitavg, 0 , 3)}}</span>
									<div class="stars">
									 	@for ($i = 1; $i <= $numb; $i++)
											<i class="fa fa-fw fa-star"></i>
										@endfor
											
											@if($last_numb>8)
												<i class="fa fa-fw fa-star"></i>
												<?php $i++?>
											@else
												@if($last_numb>3)
													<i class="fa fa-fw fa-star-half-o"></i>
													<?php $i++?>
												@endif
											@endif

										@for (; $i <= 5; $i++)
											<i class="fa fa-fw fa-star-o"></i>
										@endfor  
									</div>
									<p>{{App\Respond::where('new_id',$rekl_sale[0]['id'])->count()}} голосов</p>
								</div>
								<div class="col-xs-6 col-md-3">
									<span class="sale-font">Поделится: </span></br>
									<div class="social-share">
										<a href="{{URL::to('vk')}}"><i class="fa fa-vk" aria-hidden="true"></i></a> 
										<a href="{{URL::to('gplus')}}"><i class="fa fa-google-plus" aria-hidden="true"></i></a> 
										<a href="{{URL::to('fb')}}"><i class="fa fa-facebook-official" aria-hidden="true"></i></a> 
									</div>
								</div>
								<div class="col-xs-6 col-md-3">
									<span class="sale-font">Размищение</span></br>

									<a href="{{ action('MapController@locationSale', $rekl_sale[0]['id'] ) }}"><div class="show_map"><i class="fa fa-map-marker" aria-hidden="true"></i></div>  Показать магазины на карте</a> 
								</div>	
							</div>
						</div>	
					</div>
				</div>
				<div class="row slider-gazetka">
					<div class="h6 btn">Картинки з газетки</div>
					<div class="col-xs-12 ">
							<div class="xm-rorate" id="id-xm-rorate">
							<ul class="xm-rorate-img clearfix" id="id-xm-content">
								@foreach ($reklam->magazines as $magaz)  
									<li><a href="#" target="_blank"><img src="{{URL::to('/')}}/{{$magaz->image}}" alt="#"></a></li>
								@endforeach	
							</ul>
							</div>
							<ul class="xm-rorate-con clearfix" id="id-xm-control">
								@foreach ($reklam->magazines as $magaz)  
									<li><img src="{{URL::to('/')}}/{{$magaz->image}}" alt="#"></li>
								@endforeach	
								<li class="xm-rorate-slider" id="id-xm-slider"></li>
							</ul>
							
							@foreach ($reklam->magazines as $magaz)  
								{{-- <div class="slide item"><a class="fancybox" href="{{URL::to('/')}}/{{$magaz->image}}" ><img src="{{URL::to('/')}}/{{$magaz->image}}"></a></div> --}}	
							@endforeach	
						
					</div>
				</div>							
				<div class="row">
					<div class="h6 btn">Товар в газетке</div>
					<div class="col-xs-12 ">
						@foreach ($reklam->products as $product)  
							<div class="row product shadow">
								<div class="col-xs-12 col-sm-6 col-md-4" >
									<img class="center" src="{{ URL::to('/')}}/{{$product->image}}">
								</div>
								<div class="col-xs-12 col-sm-6 col-md-8">
									<div class="product-info">
										<div class="product-info-name">
											<div class="product-name">
												{{$product->name}}
											</div>
											<div class="product-price">
												Цена: {{sprintf("%01.2f", $product->price)}}грн.
											</div>
										</div>
										<div class="product-about">
											{!!$product->about!!}
										</div>
									</div>
								</div>
							</div>
						@endforeach	
					</div>
				</div>	
		</div>		
	</section>
@stop