@section('title', $content->titulo)
<!-- <link href="{{ asset('css/bxSlider.css') }}" rel="stylesheet">-->
<link href="{{ asset('css/page.css') }}" rel="stylesheet">
<section class="containe-fluid">
    <div class="row">
    	<div class="col-md-12">
    	
    	<div class="main_blog_details">
			<img class="img-fluid" src="{{ asset('images/'.$content->portal) }}" alt="{{$content->titulo}}">
			<a href="#"><h4>{{$content->titulo}}</h4></a>
			<!--<div class="user_details">
				<div class="float-left">
					<a href="#">Lifestyle</a>
					<a href="#">Gadget</a>
				</div>
				<div class="float-right">
					<div class="media">
						<div class="media-body">
							<h5>Mark wiens</h5>
							<p>12 Dec, 2017 11:21 am</p>
						</div>
						<div class="d-flex">
							<img src="img/blog/user-img.jpg" alt="">
						</div>
					</div>
				</div>
			</div>-->
			<?= $content->contenido ?>
			<!--<div class="news_d_footer">
				<a href="#"><i class="lnr lnr lnr-heart"></i>Lily and 4 people like this</a>
				<a class="justify-content-center ml-auto" href="#"><i class="lnr lnr lnr-bubble"></i>06 Comments</a>
				<div class="news_socail ml-auto">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-youtube-play"></i></a>
					<a href="#"><i class="fa fa-pinterest"></i></a>
					<a href="#"><i class="fa fa-rss"></i></a>
				</div>
			</div>-->
		</div>
    	
    	</div>
    </div>
</section>