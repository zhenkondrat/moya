@extends('layouts.master')
@section('body')
    <section class="products">
    <div class="container">
    	<div class="row">
			<div class="h6 btn">Товар</div>
			<div class="col-xs-12 ">
				@foreach ($products as $product)  
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