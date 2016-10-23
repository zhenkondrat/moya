@extends('layouts.master')
@section('body')
	<?php 
		function truncate($text, $length) {
		   $length = abs((int)$length);
		   if(strlen($text) > $length) {
		      $text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
		   }
		   return($text);
		}
	?>
    <section class="news-list">
		<div class="container">
				<div class="h6 btn">Новости, конкурсы, акции в торговых сетях</div>
						<div class="content">
							@foreach ($news as $one_news)  
								<div class="row news shadows">
							            <div class="col-sm-6 col-md-4">
							                <a class="fancybox" href="{{URL::to('/')}}/{{$one_news->image}}">
							                    <div class="img-box"><img src="{{URL::to('/')}}/{{$one_news->image}}" alt="aaaaaaaaaaaaaaaaa" class="image"></div>
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
							<?php echo $news->render(); ?>	
						</div>
		</div>		
	</section>
@stop