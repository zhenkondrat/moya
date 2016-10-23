@extends('layouts.master')
@section('body')
    <section class="sale-detail">
    	<div class="container">
				<div class="row bottom-pad">
					<div class="h6 btn">Подробная информация о торговой сети <span style="color:yellow;">"{{$saled->name}}"</span></div>
					<div class="col-xs-12 col-md-3">
						<div class="sale-logo">
							<a href="{{$saled->site_url}}"><img src="{{ URL::to('/')}}/{{$saled->logo}}"></a>
						</div>						
					</div>
					<div class="col-xs-12 col-md-6">
						
					</div>
				</div>				
				@if (count($saled->shops)>0)			
					<div class="row bottom-pad">
						<div class="h6 btn">Рекламки сети</div>
						<div class="col-sm-12">
							<?php $arr_rekl = collect(); ?>
							@foreach ($saled->shops as $shop)  
								<?php $arr_rekl = $arr_rekl->merge($shop->reklams); ?>
							@endforeach

							<?php  $reklams = $arr_rekl->unique('name')->sortBy('name'); ?>
							@foreach ($reklams as $rekl)  
								<div class="slide item"><a class="fancybox" href="{{URL::to('reklam')}}/{{$rekl->id}}" ><img src="{{URL::to('/')}}/{{$rekl->image}}"><div class="slide-text-r slide-date-r" style="display:block;">{{$rekl->name}}</div></a></div>
							@endforeach	
								
						</div>
						</br>	
					</div>
				@endif
				@if(count($news)>0)
				<div class="row bottom-pad">
					
					<div class="col-sm-6">
						<div class="h6 btn">Категории</div>
						<?php $arr_rekl = collect(); ?>
						@foreach ($saled->shops as $shop)  
							<?php $arr_rekl = $arr_rekl->merge($shop->reklams); ?>
						@endforeach

						<?php  $reklams = $arr_rekl->unique('name')->sortBy('name'); ?>
						@foreach ($reklams as $rekl)  
							<div class="slide item"><a class="fancybox" href="{{URL::to('reklam')}}/{{$rekl->id}}" ><img src="{{URL::to('/')}}/{{$rekl->image}}"><div class="slide-text-r slide-date-r" style="display:block;">{{$rekl->name}}</div></a></div>
						@endforeach	
							
					</div>
					
						<div class="col-sm-6">
							<div class="h6 btn">Новости</div>
							@foreach ($news as $one_news)  
								<div class="row news shadows">
							            <div class="col-sm-12">
							                <a class="fancybox" href="{{URL::to('/')}}/{{$one_news->image}}">
							                    <div class="img-box shadows"><img src="{{URL::to('/')}}/{{$one_news->image}}" alt="aaaaaaaaaaaaaaaaa" class="image"></div>
							                </a>
							            </div>
							            <div class="col-sm-12">							                
							                <div class="teaser-sale shadows">
							                   <a href="{{URL::to('/onenews')}}/{{$one_news->id}}">{{$one_news->header}}</a>
							                </div>
							            </div>
							    </div>				
							@endforeach						
								
						</div>
					
					</br>	
				</div>
				@endif
				@if (count($saled->shops)>0)			
				<div class="row bottom-pad">
					<div class="h6 btn">Ближайшее магазины</div>
					<div class="col-sm-12">
						<table>
							<thead>
								<th>№</th>
								<th style="width:200px;">График работы</th>
								<th>Адресс</th>
								<th>Показать на карте</th>
								{{-- <th>Активна</th> --}}
							</thead>
							<tbody>
							<?php $i=0; ?>
								@foreach ($saled->shops as $shop)   
									<tr>
										<?php $i+=1; ?>
										<td>{{$i}}</td>
										<td>{!!ucfirst(trans($shop->work_graph))!!}</td>
										<td>{{$shop->adress}}</td>
										<td><a href="{{URL::to('location')}}">Показать на карте</a></td>
										{{-- <td>{{$rekl->enabled}}</td> --}}
									</tr>
								@endforeach
							</tbody>
						</table>	
											 						
					</div>	
				</div>
				@endif
				<div class="row bottom-pad">
					<div class="h6 btn">О сети <span style="color:yellow;">"{{$saled->name}}"</span></div>
					<div class="col-xs-12">			
						<div class="row sale-info shadow">
							<div class="col-xs-3"><strong>Название сети:</strong> {{$saled->name}}</div>
					    	<div class="col-xs-3"><strong>Полное название предприятия:</strong> {{$saled->full_name}}</div>
					    	<div class="col-xs-3"><strong>E-mail:</strong> {{$saled->email}}</div>
					    	<div class="col-xs-3"><strong>Адресс сайта:</strong> <a href="{{$saled->site_url}}" > {{$saled->site_url}}</a></div>
				    	</div>		
						{!!$saled->about!!}
					</div>
				</div>
		</div>
    </section>
@stop