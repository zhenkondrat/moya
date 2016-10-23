@extends('layouts.master')
@section('body')
    <section class="news-list">
		<div class="container">
				<div class="h6 btn"><a href="{{URL::to('allnews')}}">Новости, конкурсы, акции в торговых сетях</a></div>
				<div class="content">							
					<div class="row news-full">
		                <img src="{{URL::to('/')}}/{{$onenews->image}}" alt="aaaaaaaaaaaa" class="image shadow">
		            
		                <h3><a href="{{URL::to('allnews')}}">{{$onenews->header}}</a></h3>
		                <div class="teaser">
		                    {!!$onenews->text!!}
		                </div>
				        
				    </div>
				    <hr>
				    <div class="news-detail">
				    	<div class="row">
							<div class="col-sm-9">
								<strong>Новость создана:</strong> {{$onenews->created_at}}
							</div>
					    	<div class="col-sm-3">
					    		@if ($onenews->sale!= null)
					    			<strong>Новость от торговой сети:</strong>
					    			<a href="{{URL::to('sale/')}}/{{$onenews->sale->id}}"><img src="{{URL::to('/')}}/{{$onenews->sale->logo}}" alt="aaaaaaaaaaaa" class="image shadow"></a>
					    		@endif
				    		</div>
				    	</div>
				    </div>
				    <div class="comments news-full">
				    	<div class="row">
							<div class="col-sm-3">
								<strong>Коментарии к новости:</strong> 
							</div>
					    	<div class="col-sm-9">
					    		@if (count($comments)>0)					    		
						    		@foreach ($comments as $comment)  
						    			<div class="comment-text">
											<p><strong>{{ $comment->user->email}}:</strong>  {{ $comment->text }}</p>
											<p>Комментар создано: {{ $comment->created_at}}</p>
										</div>
						    		@endforeach
						    	@else
									Оставте первым свой комментарий
						    	@endif
				    		</div>
				    	</div>
				    	<div class="row">
							<div class="col-sm-2">
								<strong>Оставь коментарий:</strong> 
							</div>
					    	<div class="col-sm-10">
					    		<div class="add_comment">
					    			@if (Session::has('user_id'))									
										{{Form::open(array('action' => 'SiteController@add_comment'))}}
											{{Form::textarea('text', $value = null, $attributes = array('class'=>'email', 'placeholder' => 'Введите'))}}
											{{Form::hidden('news_id', $value = $onenews->id)}}
											<input type="submit" value="Комментировать" class="silver-btn ">	
										{{ Form::close() }}
									@else
										Вы не авторизированы
									@endif
									
								</div>
				    		</div>
				    	</div>
				    </div>
				</div>
		</div>		
	</section>
@stop