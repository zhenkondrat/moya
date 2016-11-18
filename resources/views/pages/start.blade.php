@extends('layouts.master')
@section('body')
    <section class="sidebar">
		<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-9">	
						<div class="blocker slider">
							<div class="h6 btn">Актуальные рекламки</div>
							<div class="content">
								<div class="prev_button own-btn shadow"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
								<div class="wrapp carousel" style="margin: 0 auto; float: left; height:auto;">
									
									@foreach ($reklams as $rekl)  
										<div class="slide item"><a class="fancybox" href="{{URL::to('reklam')}}/{{$rekl->id}}" ><div class="slide-text shadow">{{$rekl->name}}</div><img class="lazyOwl" src="{{$rekl->image}}"><div class="slide-text slide-date"> До конца осталось {{$rekl->getDays()}}дней</div></a></div>
									@endforeach
								</div>
								<div class="next_button own-btn shadow"><i class="fa fa-chevron-right"></i></div>
							</div>
						</div>
					
						{{-- <div class="blocker">
							<div class="h6 btn">Специальное предложение</div>
							<div class="content">
								<div class="wrapp">
								<button class="white-btn btn ltl">Televisor</button>
								<button class="white-btn btn ltl">Televisor</button>
								<button class="white-btn btn ltl">Televisor</button>
								<button class="white-btn btn ltl">Televisor</button>
								<button class="white-btn btn ltl">Televisor</button>
								<button class="white-btn btn ltl">Televisor</button>
								<button class="white-btn btn ltl">Televisor</button>
								<button class="white-btn btn ltl">Televisor</button>
								<button class="white-btn btn ltl">Televisor</button>
								<button class="white-btn btn ltl">Televisor</button>		
								</div>
							</div>
						</div>	 --}}					

						<div class="blocker">
							<div class="h6 btn">Категории</div>
							<div class="content">
								<div class="">
									<div class="row">
										<div class="col-sm-12 col-md-12 categories">	
											@foreach ($categories as $cat)  
												<a href="#" class="white-btn btn ltl ta-left darknes">
													<div class="row">
														<div class="col-xs-3">
															<img src="{{$cat->image}}" >
														</div>
														<div class="col-xs-9">
														 	<div class="cat-text"> {{$cat->name}} </div>
														 </div>
													</div>
												</a>	
											@endforeach											
										</div>
										<div class="cat-detail"> 
											<button class="cat black-btn btn ">Все категории</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="blocker brand">
							<div class="h6 btn">Торговые сети</div>
							<div class="content">
								<div class="">
									<div class="row">
										<div class="col-sm-12 col-md-12 sales">	
											@foreach ($sales as $sale)  
												<div class="brand-block shadow">
													<div class="brand-logo"><img src="{{$sale->logo}}"></div>
													<a href="{{URL::to('sale/')}}/{{$sale->id}}"><div class="brand-name">{{$sale->name}}</div></a>
												</div>
											@endforeach
										</div>
										<div class="sale-detail"> 
											<button class="sale black-btn btn ">Все торговые сети</button>
										</div>
									</div>
								</div>
								
							</div>
						</div>

						{{-- <div class="blocker">
							<div class="h6 btn">Торговые центры</div>
							<div class="content">
								<div class="wrapp">
									<div class="locate"></div>
								</div>
							</div>
						</div> --}}
						
						<div class="blocker">
							<div class="h6 btn">Рекламки</div>
							<div class="content">
								<div class="wrapp">
									<table>
										<thead>
											<th>№</th>
											<th style="width:200px;">Назва</th>
											<th>Кінець акції</th>
											<th>До кінця залишилось</th>
											{{-- <th>Активна</th> --}}
										</thead>
										<tbody>
										<?php $i=0; ?>
											@foreach ($reklams as $rekl)  
												<tr onclick="window.location.assign('{{URL::to('reklam')}}/{{$rekl->id}}');">
													<?php $i+=1; ?>
													<td>{{$i}}</td>
													<td>{{ucfirst(trans($rekl->name))}}</td>
													<td>{{$rekl->getEnd()}}</td>
													<td>{{$rekl->getDays()}}</td>
													{{-- <td>{{$rekl->enabled}}</td> --}}
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>				
					<div class="col-xs-12 col-md-3">	
						<div class="row">
							<div class="col-xs-6 col-md-12">
								<div class="blocker mobil">
									<img src="img/mobil.jpg" width="100%">
								</div>
							</div>
							<div class="col-xs-6 col-md-12">
								<div class="blocker social">
									<div class="h6 btn center">Будь в курсе</div>
									<div class="content">
										<div class="wrapp">
											<p> Мы в соцеальных сетях:</p>
											<div class="social-icon">
												<a href="http:\\ok.ru"><img src="img\ok.png"></a>
												<a href="http:\\facebook.com"><img src="img\fb.png"></a>
												<a href="http:\\vk.com"><img src="img\vk.png"></a>
											</div>
											<div class="divider"></div>
											<p> Подписка на  разсылку:</p>
											<div>
												{{Form::open(array('action' => 'SiteController@add_email'))}}
													{{Form::email('email', $value = null, $attributes = array('class'=>'email', 'placeholder' => 'Введите'))}}
													<input type="submit" value="Подписатся" class="silver-btn ">
													{{Form::checkbox('checkbox', null , false, $attributes = array('class'=>'checkbox'))}}
													{{Form::label('lbl', 'Соглашаюсь с условиями', $attr = array('class' => 'condition', ))}}
													
												{{ Form::close() }}
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-hidden col-md-12 ">
								<div class="blocker city">
									<div class="h6 btn center">Рекламки в Украине</div>
									<div class="content">
										<!-- <div class="wrapp"> -->
											<ul class="cities">
												<li><a href="{{URL::to('/')}}/Київ/shops">Київ</a></li>
												<li><a href="{{URL::to('/')}}/Львів/shops">Львів</a></li>
												<li><a href="{{URL::to('/')}}/Одеса/shops">Одеса</a></li>
												<li><a href="{{URL::to('/')}}/Харків/shops">Харків</a></li>
												<li><a href="{{URL::to('/')}}/Донецьк/shops">Донецьк</a></li>
												<li><a href="{{URL::to('/')}}/Дніпро/shops">Дніпро</a></li>
												<li><a href="{{URL::to('/')}}/Вінниця/shops">Вінниця</a></li>
												<li><a href="{{URL::to('/')}}/Хмельницький/shops">Хмельницький</a></li>
												<li><a href="{{URL::to('/')}}/Херсон/shops">Херсон</a></li>
												<li><a href="{{URL::to('/')}}/Запоріжжя/shops">Запоріжжя</a></li>
											</ul>
											<a class="see-all-city" href="{{URL::to('/shops')}}">Посмотреть все ></a>
										<!-- </div> -->
									</div>
								</div>
							</div>
					</div>				
				</div>
		</div>
	</section>
	<?php 
		function truncate($text, $length) {
		   $length = abs((int)$length);
		   if(strlen($text) > $length) {
		      $text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
		   }
		   return($text);
		}
	?>	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 ">				

					<div class="blocker news-block">
						<div class="h6 btn"><a href="{{URL::to('allnews')}}">Новости, конкурсы, акции в торговых сетях</a></div>
						<div class="content">
							@foreach ($news as $one_news)  
								<div class="row news shadows">
							            <div class="col-sm-6 col-md-4">
							                <a class="fancybox" href="{{URL::to('/')}}/{{$one_news->image}}">
							                    <div class="img-box shadows"><img src="{{URL::to('/')}}/{{$one_news->image}}" alt="aaaaaaaaaaaaaaaaa" class="image"></div>
							                </a>
							            </div>
							            <div class="col-sm-6 col-md-8">
							                <h3><a href="{{URL::to('/onenews')}}/{{$one_news->id}}">{{$one_news->header}}</a></h3>
							                <div class="teaser">
							                    {!!truncate($one_news->text, 620)!!} <a href="{{URL::to('/onenews')}}/{{$one_news->id}}">Подробнее -></a>
							                </div>
							            </div>
							    </div>				
							@endforeach
							<div class="news-all"> 
								<a href="{{URL::to('allnews')}}" class="sale black-btn btn ">Все новости</a>
							</div>	
						</div>
						
					</div><!-- block -->

					<div class="blocker">
						<div class="h6 btn">Информация о <span style="color:yellow;">Моя рекламка</span></div>
						<div class="content">
							<div class="wrapp">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		

	</section>
	
@stop