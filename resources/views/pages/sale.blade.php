@extends('layouts.master')
@section('body')
    <section class="sale-detail">
    	<div class="container">
				<div class="row">
					<div class="h6 btn">Торговые центры</div>
					<div class="col-xs-12 col-md-3">
						<div>
							<img src="{{ URL::to('/')}}/{{$saled->logo}}">
						</div>						
					</div>
					<div class="col-xs-12 col-md-3">
						{{$saled->name}}
				    	{{$saled->full_name}}
				    	{{$saled->email}}
				    	{{$saled->site_url}}
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">					
						{{$saled->about}}
					</div>
				</div>
		</div>
    </section>
@stop