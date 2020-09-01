
@include('include.header')

</header>
	<!-- /HEADER -->
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div id="hot-post" class="row hot-post">
				<div class="col-md-8 hot-post-left">
					<!-- post -->
					<div class="post post-thumb">
					
						<a class="post-img" href="{{route('aposts.showui',['slug' => $frist_post->slug ])}}"><img src="/storage/apost_image/{{$frist_post->featrued}}" alt="no image"></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">{{$frist_post->category->name}}</a>
							</div>
							<h3 class="post-title title-lg"><a href="blog-post.html"><?php $frist=substr($frist_post->content,0,50);echo $frist . "..."; ?></a></h3>
							<ul class="post-meta">
								<li><a href="author.html">{{$frist_post->title}}</a></li>
								<li>{{$frist_post->created_at->diffForHumans()}}</li>
							</ul>
						</div>
						
					</div>
					<!-- /post -->
				</div>
				<div class="col-md-4 hot-post-right">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="{{route('aposts.showui',['slug' => $second_post->slug ])}}"><img src="/storage/apost_image/{{$second_post->featrued}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">{{$second_post->category->name}}</a>
							</div>
							<h3 class="post-title"><a href="blog-post.html"><?php $frist=substr($second_post->content,0,50);echo $frist . "..."; ?></a></h3>
							<ul class="post-meta">
								<li><a href="author.html">{{$second_post->title}}</a></li>
								<li>{{$second_post->created_at->diffForHumans()}}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="{{route('aposts.showui',['slug' => $third_post->slug ])}}"><img src="/storage/apost_image/{{$third_post->featrued}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">{{$second_post->category->name}}</a>
								<a href="category.html">{{$third_post->category->name}}</a>
							</div>
							<h3 class="post-title"><a href="blog-post.html"><?php $frist=substr($third_post->content,0,50);echo $frist . "..."; ?></a></h3>
							<ul class="post-meta">
								<li><a href="author.html">{{$third_post->title}}</a></li>
								<li>{{$third_post->created_at->diffForHumans()}}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					
					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">{{$frist_category->name}}</h2>
							</div>
						</div>
						<!-- post -->
						@foreach($frist_category->aposts()->orderBy('created_at','desc')->take(3)->get() as $post)
						<div class="col-md-4">
							<div class="post post-sm">
								<a class="post-img" href="{{route('aposts.showui',['slug' => $post->slug ])}}"><img src="/storage/apost_image/{{$post->featrued}}" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="category.html">{{$post->category->name}}</a>
									</div>
									<h3 class="post-title title-sm"><a href="blog-post.html"><?php $frist=substr($post->content,0,50);echo $frist . "..."; ?></a></h3>
									<ul class="post-meta">
										<li><a href="author.html">{{$post->title}}</a></li>
										<li>{{$post->created_at->diffForHumans()}}</li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						<!-- /post -->

					</div>
					<!-- /row -->

					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">{{$second_category->name}}</h2>
							</div>
						</div>
					<!-- post -->
					@foreach($second_category->aposts()->orderBy('created_at','desc')->take(3)->get() as $post)
						<div class="col-md-4">
							<div class="post post-sm">
								<a class="post-img" href="{{route('aposts.showui',['slug' => $post->slug ])}}"><img src="/storage/apost_image/{{$post->featrued}}" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="category.html">{{$post->category->name}}</a>
									</div>
									<h3 class="post-title title-sm"><a href="blog-post.html"><?php $frist=substr($post->content,0,50);echo $frist . "..."; ?></a></h3>
									<ul class="post-meta">
										<li><a href="author.html">{{$post->title}}</a></li>
										<li>{{$post->created_at->diffForHumans()}}</li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						<!-- /post -->

					</div>
					<!-- /row -->

					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">{{$third_category->name}}</h2>
							</div>
						</div>
							<!-- post -->
					@foreach($third_category->aposts()->orderBy('created_at','desc')->take(3)->get() as $post)
						<div class="col-md-4">
							<div class="post post-sm">
								<a class="post-img" href="{{route('aposts.showui',['slug' => $post->slug ])}}"><img src="/storage/apost_image/{{$post->featrued}}" alt=""></a>
								<div class="post-body">
									<div class="post-category">
										<a href="category.html">{{$post->category->name}}</a>
									</div>
									<h3 class="post-title title-sm"><a href="blog-post.html"><?php $frist=substr($post->content,0,50);echo $frist . "..."; ?></a></h3>
									<ul class="post-meta">
										<li><a href="author.html">{{$post->title}}</a></li>
										<li>{{$post->created_at->diffForHumans()}}</li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						<!-- /post -->
					</div>
					<!-- /row -->
				</div>
				<div class="col-md-4">
				

					<!-- social widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Social Media</h2>
						</div>
						<div class="social-widget">
							<ul>
								<li>
									<a href="{{$setting->facebook}}" class="social-facebook">
										<i class="fa fa-facebook"></i>
										<span>21.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="{{$setting->twitter}}" class="social-twitter">
										<i class="fa fa-twitter"></i>
										<span>10.2K<br>Followers</span>
									</a>
								</li>
								<li>
									<a href="{{$setting->githup}}" class="social-google-plus">
										<i class="fa fa-google-plus"></i>
										<span>5K<br>Followers</span>


										
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /social widget -->

					<!-- category widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Categories</h2>
						</div>
						<div class="category-widget">
							<ul>
								
					  @foreach($category as $categorys)
					   <li><a href="#">{{$categorys->name}} <span>{{$categorys->aposts()->count()}}</span></a></li>
                       @endforeach
								
							</ul>
						</div>
					</div>
					<!-- /category widget -->

					<!-- newsletter widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Newsletter</h2>
						</div>
						<div class="newsletter-widget">
						<form action="{{route('subscribed')}}" method="POST">
							{{csrf_field()}}
								<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
								<input class="input" name="email" placeholder="Enter Your Email">
								<button type="submit" class="primary-button">Subscribe</button>
							</form>
						</div>
					</div>
					<!-- /newsletter widget -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
	<!--All Posts-->

<div class="our-projects" id="port">
 <div class="container">
   
   <h2 class="special-heading">Posts</h2>
   <ul class="shuffle">
	  <li class="selected control" data-filter="all" >All</li>
	  @foreach($category as $categorys)
	 <li class="control"          data-filter=".{{$categorys->name}}">{{$categorys->name}}</li>
      @endforeach
   </ul>
   <div class="gallery"  data-ref="mixitup-container">
         <div class="row">
		 @foreach($posts as $post)	 
		 <div class="col-md-4"> 
            <div class="{{$post->category->name}}" data-ref="mixitup-target">
               <div class="over"><a href="{{route('aposts.showui',['slug' => $post->slug ])}}">View more</a> </div>
            <span class="heart">
               <i class="fa fa-heart"></i>{{$post->comments()->count()}}
            </span>
               <img src="/storage/apost_image/{{$post->featrued}}">
			 </div>
			 </div>
			 @endforeach 
      </div>

   </div>
 </div>
   
</div>
<!--end projects-->

	 @include('include.footer')
	 <script src="{{asset('js/mixitup.min.js')}}"></script>
	 <script src="{{asset('js/mixitup.js')}}"></script>

</body>

</html>
