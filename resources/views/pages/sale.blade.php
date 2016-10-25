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
					<?php 
						$raitavg = App\Respond::avgReiting($saled->id); 
						$numb = floor($raitavg);//ціла частина
						$last_numb = $raitavg - $numb;
						$last_numb = $last_numb*10;
						$last_numb = floor($last_numb);//десятки 
					?>
					<div class="col-xs-12 col-md-6">
						<div class="">
							<span style="">Оценка сети: </span>
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
						@foreach ($categories as $cat)  
							<a href="#" class="white-btn btn ltl ta-left darknes halfw">
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
				<div class="comments news-full">
				    	<div class="row">
							<div class="col-sm-3">
								<strong>Отзывы к торговой сети:</strong> 
							</div>
					    	<div class="col-sm-9">
					    		@if (count($responds)>0)					    		
						    		@foreach ($responds as $comment)  
						    			<div class="comment-text">
						    				<div class="">
												<span style="">Оценка сети: </span>
												@for ($i = 1; $i <= $comment->reiting; $i++)
													<i class="fa fa-fw fa-star"></i>
												@endfor

												@for (; $i <= 5; $i++)
													<i class="fa fa-fw fa-star-o"></i>
												@endfor
											</div>
											<p><strong>{{ $comment->user->email}}:  </strong>{{ $comment->text }}</p>
											<p>Отзыв создано: {{ $comment->created_at}}</p>
										</div>
						    		@endforeach
						    		<?php echo $responds->render(); ?>	
						    	@else
									Оставте первым свой отзыв
						    	@endif
				    		</div>
				    	</div>
				    	<div class="row">
							<div class="col-sm-2">
								<strong>Оставь отзыв:</strong> 
							</div>
					    	<div class="col-sm-10">
					    		<div class="add_comment">
					    			@if (Session::has('user_id'))									
										{{Form::open(array('action' => 'SiteController@add_respond'))}}
											
											<div class="stars-edit">
												<span style="">Оцените торговую сеть: </span>
												<i class="fa fa-fw fa-star-o" id="star1" data-score="1"></i>
												<i class="fa fa-fw fa-star-o" id="star2" data-score="2"></i>
												<i class="fa fa-fw fa-star-o" id="star3" data-score="3"></i>
												<i class="fa fa-fw fa-star-o" id="star4" data-score="4"></i>
												<i class="fa fa-fw fa-star-o" id="star5" data-score="5"></i>
											</div>
											{{Form::textarea('text', $value = null, $attributes = array('class'=>'email', 'placeholder' => 'Введите'))}}
											{{Form::hidden('reiting', $value = null, $attributes = array('class'=>'test',  ))}}
											
											{{Form::hidden('news_id', $value = $saled->id)}}
											<input type="submit" value="Комментировать" class="silver-btn ">	
										{{ Form::close() }}
									@else
										Вы не авторизированы <a href="{{URL::to('login')}}">перейдите к авторизации</a>
									@endif
									<script type="text/javascript">
										$(document).ready(function(){
											
											var data_star = 0; 
											$("i")
												  .mouseover(function() {
													
													var x = $(this).attr("data-score");														
													 switch(x){
													 		case '5': $("#star5").attr("class","fa fa-fw fa-star");
															case '4': $("#star4").attr("class","fa fa-fw fa-star");
															case '3': $("#star3").attr("class","fa fa-fw fa-star");
															case '2': $("#star2").attr("class","fa fa-fw fa-star");
													 		case '1': $("#star1").attr('class','fa fa-fw fa-star');
													 }
												  })
												  .mouseout(function() {	
												  		$( ".test" ).val(data_star);	   
														switch(data_star){
															case 0: $("#star1").attr("class","fa fa-fw fa-star-o");
															case '1': $("#star2").attr("class","fa fa-fw fa-star-o");
															case '2': $("#star3").attr("class","fa fa-fw fa-star-o");
															case '3': $("#star4").attr("class","fa fa-fw fa-star-o");
													 		case '4': $("#star5").attr('class','fa fa-fw fa-star-o');
													 	}
												  })
												  .on('click', function(){
												  	data_star = $(this).attr("data-score");
												  	$( ".test" ).val(data_star);
												  });
										});
									</script>
								</div>
				    		</div>
				    	</div>
				    </div>
		</div>
    </section>
@stop