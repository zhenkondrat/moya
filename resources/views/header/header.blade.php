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
								<a href="{{URL::to('mylocation')}}" class="black-btn btn"><i class="fa fa-map-marker" aria-hidden="true"></i> Найти меня</a>
								<a href="{{URL::to('/admin')}}" class="black-btn btn"> <i class="fa fa-building" aria-hidden="true"></i> Мой город</a>
							</div>
							<div>
								<a href="{{ url('register') }}" class="white-btn btn"><i class="fa fa-child" aria-hidden="true"></i> Создать новый аккаунт</a>
								@if (Session::has('user_id'))
									<a href="{{ url('logout') }}" class="white-btn btn"><i class="fa fa-times" aria-hidden="true"></i> Выход пользователя</a>	
								@else
									<a href="{{ url('login') }}" class="white-btn btn"><i class="fa fa-user" aria-hidden="true"></i> Вход в систему</a>		
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
						<li <?php if (isset($activepage)) if ($activepage==1) echo 'class="active"'; ?>><a href="{{URL::to('/reklams/all')}}"><i class="fa fa-tags" aria-hidden="true"></i> Рекламки</a></li>
						<li <?php if (isset($activepage)) if ($activepage==2) echo 'class="active"'; ?>><a href="{{URL::to('/sales/all')}}"><i class="fa fa-list-alt" aria-hidden="true"></i> Торговые сети</a></li>
						<li <?php if (isset($activepage)) if ($activepage==3) echo 'class="active"'; ?>><a href="{{URL::to('myreklams')}}"><i class="fa fa-university" aria-hidden="true"></i> Торговые центры</a></li>
						<li <?php if (isset($activepage)) if ($activepage==4) echo 'class="active"'; ?>><a href="{{URL::to('myreklams')}}"><i class="fa fa-map-o" aria-hidden="true"></i> Мои Рекламки</a></li>
						<li <?php if (isset($activepage)) if ($activepage==5) echo 'class="active"'; ?>><a href="{{URL::to('location')}}"><i class="fa fa-clock-o" aria-hidden="true"></i> Время работы</a></li>
					</ul>
				</div>
			</div>
		</div>		
	</header>
	{{-- <i class="fa fa-clock-o" aria-hidden="true"></i> 
		<i class="fa fa-building" aria-hidden="true"></i>
		<i class="fa fa-university" aria-hidden="true"></i>
		<i class="fa fa-tags" aria-hidden="true"></i>
		<i class="fa fa-list-alt" aria-hidden="true"></i>
		<i class="fa fa-map-marker" aria-hidden="true"></i>
		<i class="fa fa-user" aria-hidden="true"></i>


	--}}