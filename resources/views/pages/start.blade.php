@extends('layouts.master')
@section('body')
    <section class="sidebar">
		<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-9">	
						<div class="blocker slider">
							<div class="h6 btn">Актуальные рекламки</div>
							<div class="content">
								<div class="wrapp carousel" style="margin: 0 auto; float: left;">
									@foreach ($reklams as $rekl)  
										<div class="slide item"><a class="fancybox" href="{{$rekl->image}}" ><img src="{{$rekl->image}}"></a></div>
									@endforeach
								</div>
								
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
										<div class="col-sm-12 col-md-12">	
											@foreach ($categories as $cat)  
												<a href="#" class="white-btn btn ltl"> {{$cat->name}}</a>	
											@endforeach
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
										<div class="col-sm-12 col-md-12">	
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
						</div>

						<div class="blocker">
							<div class="h6 btn">Торговые центры</div>
							<div class="content">
								<div class="wrapp">
									<div class="locate"></div>
								</div>
							</div>
						</div>

						<div class="blocker">
							<div class="h6 btn">Рекламки</div>
							<div class="content">
								<div class="wrapp">
									<table>
										<thead>
											<th>№</th>
											<th style="width:200px;">Назва</th>
											<th>Кінець акції</th>
											<th>До кінця залишилось(днів)</th>
											{{-- <th>Активна</th> --}}
										</thead>
										<tbody>
										<?php $i=0; ?>
											@foreach ($reklams as $rekl)  
												<tr>
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
					<div class="col-sm-12 col-md-3">	
						<div class="row">
							<div class="col-xs-4 col-sm-6 col-md-12">
								<div class="blocker mobil">
									<img src="img/mobil.jpg" width="100%">
								</div>
							</div>
							<div class="col-xs-4 col-sm-6 col-md-12">
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
												<form class="sennder">
													<input type="text" class="email" placeholder="Введите">
													<input type="submit" value="Подписатся" class="silver-btn ">
													<input type="checkbox" class="checkbox"> Соглашаюсь с условиями	
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-4 col-sm-12 ">
								<div class="blocker city">
									<div class="h6 btn center">Рекламки в Украине</div>
									<div class="content">
										<!-- <div class="wrapp"> -->
											<ul class="cities">
												<li><a href="#">Київ</a></li>
												<li><a href="#">Львів</a></li>
												<li><a href="#">Одеса</a></li>
												<li><a href="#">Харків</a></li>
												<li><a href="#">Донецьк</a></li>
												<li><a href="#">Дніпро</a></li>
												<li><a href="#">Вінниця</a></li>
												<li><a href="#">Хмельницький</a></li>
												<li><a href="#">Херсон</a></li>
												<li><a href="#">Запоріжжя</a></li>
											</ul>
											<a class="see-all-city" href="#">Посмотреть все ></a>
										<!-- </div> -->
									</div>
								</div>
							</div>
						<!-- <div class="blocker">
							<div class="h6 btn">header</div>
							<div class="content">
								<div class="wrapp">
									
								</div>
							</div>
						</div> -->
					</div>				
				</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 ">
					<div class="blocker">
						<div class="h6 btn">Информация о <span style="color:yellow;">Моя рекламка</span></div>
						<div class="content">
							<div class="wrapp">
								
							</div>
						</div>
					</div>

					<div class="blocker news-block">
						<div class="h6 btn">Новости, конкурсы, акции в торговых сетях</div>
						<div class="content">
								<div class="row news">
							            <div class="col-sm-6 col-md-4">
							                <a class="fancybox" 
							                 href="images/kodberri.gif">
							                    <img src="images/kodberri.gif" alt="Wyjazdy wakacyjne – jak się na nie przygotować?" class="image">
							                </a>
							            </div>
							            <div class="col-sm-6 col-md-8">
							                <h3><a href="http://www.promoceny.pl/centra-handlowe/artykul/wyjazdy-wakacyjne-jak-sie-na-nie-przygotowac/">Wyjazdy wakacyjne – jak się na nie przygotować?</a></h3>
							                <div class="teaser">
							                    Wyjeżdżamy na wakacje by odpocząć od znanych nam miejsc, odetchnąć świeżym powietrzem, zobaczyć coś nowego. Często taka wycieczka jest jedynym wolnym czasem w ciągu roku, więc planujemy ją tygodnie przed terminem. Chcemy dopiąć wszystko na ostatni guzik, więc nie zapominajmy, że sama podróż też wymaga spakowania kilku rzeczy.
							                    <a title="Wyjazdy wakacyjne – jak się na nie przygotować?" href="http://www.promoceny.pl/centra-handlowe/artykul/wyjazdy-wakacyjne-jak-sie-na-nie-przygotowac/">więcej</a>
							                </div>
							            </div>
							    </div>

							    <div class="row news">
							            <div class="col-sm-12 col-md-4">
							                <a class="fancybox" 
							                 href="images/kodberri.gif">
							                    <img src="images/kodberri.gif" alt="Wyjazdy wakacyjne – jak się na nie przygotować?" class="image">
							                </a>
							            </div>
							            <div class="col-sm-12 col-md-8">
							                <h3><a href="http://www.promoceny.pl/centra-handlowe/artykul/wyjazdy-wakacyjne-jak-sie-na-nie-przygotowac/">Wyjazdy wakacyjne – jak się na nie przygotować?</a></h3>
							                <div class="teaser">
							                    Wyjeżdżamy na wakacje by odpocząć od znanych nam miejsc, odetchnąć świeżym powietrzem, zobaczyć coś nowego. Często taka wycieczka jest jedynym wolnym czasem w ciągu roku, więc planujemy ją tygodnie przed terminem. Chcemy dopiąć wszystko na ostatni guzik, więc nie zapominajmy, że sama podróż też wymaga spakowania kilku rzeczy.
							                    <a title="Wyjazdy wakacyjne – jak się na nie przygotować?" href="http://www.promoceny.pl/centra-handlowe/artykul/wyjazdy-wakacyjne-jak-sie-na-nie-przygotowac/">więcej</a>
							                </div>
							            </div>
							    </div>
						</div>
					</div>
				</div>
			</div>
		</div>				
	</section>
@stop