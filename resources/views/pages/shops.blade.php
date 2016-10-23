@extends('layouts.master')
@section('body')
    <section class="shop-list">
		<div class="container">
				<div class="row">
					<div class="h6 btn">Подробная информация о magazah</div>
					<div class="col-xs-12 ">
						<div class="blocker">
							<div class="h6 btn">Поиск</div>
							<div class="content">
								<div class="wrapp find_news">
									{{Form::open(array('action' => 'SiteController@shopsPage', 'class'=>'search_shops'))}}
										{{-- {{Form::label('asdsd', $value = null, $attributes = array('class'=>''))}} --}}
										<div class="row">
											<div class="col-xs-12 col-sm-4">
												{{Form::text('find_sale', $value = null, $attributes = array('class'=>'email', 'placeholder' => 'Введите торговую сеть'))}}
											</div>
											<div class="col-xs-12 col-sm-4">
												{{Form::text('find_city', $value = null, $attributes = array('class'=>'email', 'placeholder' => 'Введите город'))}}
											</div>
											<div class="col-xs-12 col-sm-4">
												<input type="submit" value="Поиск" class="silver-btn ">
											</div>
										</div>
									{{ Form::close() }}
								</div>
							</div>
						</div>	
					</div>
					<div class="col-xs-12 ">
							<table>
								<thead>
									<th>№</th>
									<th>Торговая сеть</th>									
									<th>Адресс</th>
									<th>Город</th>
									<th>Телефон</th>
									<th>График работы</th>
									<th>Показать на карте</th>
									{{-- <th>Активна</th> --}}
								</thead>
								<tbody>
								<?php
									if (count($shop_list)>0)
										{
										 $i=0; ?>
										@foreach ($shop_list as $shop)   
											<tr>
												<?php $i+=1; ?>
												<td>{{$i}}</td>
												<td>{{$shop->sale[0]['name']}}</td>
												<td>{{$shop->adress}}</td>
												<td>{{$shop->getCity()}}</td>
												<td>{{$shop->getFormatedPhone()}}</td>
												<td>{{strip_tags(ucfirst(trans($shop->work_graph)))}}</td>
												<td><a href="{{URL::to('location')}}">Показать на карте</a></td>
												{{-- <td>{{$rekl->enabled}}</td> --}}
											</tr>
										@endforeach
										<?php
										}
										else
										{
										?>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
										<?php
										}
										?>
								</tbody>
							</table>	
							</br>	
					</div>
				</div>
				
		</div>		
	</section>
@stop