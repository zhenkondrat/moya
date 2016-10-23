<div class="top-reklama"></div>
<header>
		<div class="top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">	
						<a href="/"><!-- <img src="img/logo.png"> -->
								<div class="logo"></div>
						</a>		
					</div>
					<div class="hidden-xs col-sm-4 col-md-6 col-lg-6">	
						
							{{Form::open(array('action' => 'SiteController@super_search'))}}
							<div class="search">
								<span class="fa fa-search"></span> 		
								{{Form::text('search', $value = null, $attributes = array('placeholder' => 'Поиск '))}}	
							</div>					
							{{ Form::close() }}	
						
					</div>
					<div class="col-xs-12 col-sm-5 col-sm-offset-0 col-md-4 ">
						<div class="top-btns">
							<div>
								<a href="{{URL::to('location')}}" class="black-btn btn">Найти меня</a>
								<a href="{{URL::to('/admin')}}" class="black-btn btn">Мой город</a>
							</div>
							<div>
								<a href="{{ url('register') }}" class="white-btn btn"><span class="locate"></span>Создать аккаунт</a>
								@if (Session::has('user_id'))
									<a href="{{ url('logout') }}" class="white-btn btn">Выход пользователя</a>	
								@else
									<a href="{{ url('login') }}" class="white-btn btn">Вход в систему</a>		
								@endif
								
							</div>
						</div>	
					</div>		
				</div>
			</div>	
		</div>	
		<div class="top-menu rl">
			<div class="container">
				<div class="row">
					<ul class="main-menu">
						<li <?php if (isset($activepage)) if ($activepage==1) echo 'class="active"'; ?>><a href="{{URL::to('/reklams/all')}}">Рекламки</a></li>
						<li <?php if (isset($activepage)) if ($activepage==2) echo 'class="active"'; ?>><a href="{{URL::to('/sales/all')}}">Торговые сети</a></li>
						<li <?php if (isset($activepage)) if ($activepage==3) echo 'class="active"'; ?>><a href="">Торговые центры</a></li>
						<li <?php if (isset($activepage)) if ($activepage==4) echo 'class="active"'; ?>><a href="">Мои Рекламки</a></li>
						<li <?php if (isset($activepage)) if ($activepage==5) echo 'class="active"'; ?>><a href="{{URL::to('/maps')}}">{{-- <i class="fa fa-clock-o" aria-hidden="true"></i> --}}Время работы</a></li>
					</ul>
				</div>
			</div>
		</div>		
	</header>