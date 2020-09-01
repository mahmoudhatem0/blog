@include('include.header')

<!-- PAGE HEADER -->
<div class="page-header">
			<div class="page-header-bg" style="background-image: url('/storage/apost_image/{{$posts->featrued}}');" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<h1 class="text-uppercase">{{$posts->title}} </h1>
						<p class="lead">{{$posts->category->name}}</p>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->

</header>
	<!-- /HEADER -->
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<div class="section-row">
						<div class="section-title">
							<h3 class="title">{{$posts->title}}</h3>
						</div>
						<h1>{{$posts->created_at->diffForHumans()}}</h1>
						<p>{{$posts->content}}</p>
						
                        @foreach($posts->tags as $tag)
						<a href="" class="badge badge-pill badge-warning" style="background-color:#ee4266">{{$tag->tag}}</a>
                         @endforeach
					</div>
					
					<div class="section-row">
						<div class="section-title">
							<br>
						<h1>All Tags</h1>
						</div>
						@foreach($tags as $tag)
						<a href="" class="badge badge-pill badge-warning" style="background-color:#ee4266">{{$tag->tag}}</a>
                         @endforeach
		        	
					</div>

					<div class="section-row">
						<div class="section-title">
						
						</div>
						<br>
						@if($prev)
				    	<a href="{{route('aposts.showui',['slug' => $prev->slug ])}}" class="badge badge-pill badge-warning" style="background-color:#ee4266">Next => {{$prev->title}}</a>	
					    @endif
						@if($next)
				    	<a href="{{route('aposts.showui',['slug' => $next->slug ])}}" class="badge badge-pill badge-warning" style="background-color:#ee4266">Prev => {{$next->title}}</a>	
					    @endif
		        	
					</div>
            <!-- start commend -->
			<div class="container ">
         <div class="row">
        <div class="col-md-8">
            <div class="commend" id="myGroup">
            @if(count($posts->comments)>0)
			@foreach($posts->comments()->orderBy('created_at','desc')->take(5)->get() as $comment)
                <div class="row">
                    <div class="col-md-1"><img class="" src="/storage/avatar/avatar.png" width="40">
					</div>
					<div class="col-md-11"><span class="d-block font-weight-bold name">{{$comment->email}} </span><span class="date text-black-50"> Shared publicly - {{$comment->created_at->diffForHumans()}}</span>
								<div class="">
									<p class="">{{$comment->commend}}</p>
								</div>

			
					</div>
                </div>
			@endforeach
		    @else   
		   <p>No Comments</p>
			@endif
                <div class="subscript">
                    <div class="">
                        <span class="like  cursor action-collapse" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#collapse-1"><i class="fa fa-commenting-o"></i><span class="ml-1 comment-to">Comment</span></span>
                        <span class="like  cursor action-collapse" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-2" href="#collapse-2"><i class="fa fa-share"></i><span class="ml-1 share-to">Share</span></span>
                    </div>
                </div>
                <div id="collapse-1" class="comment-add" data-parent="#myGroup">
                    <div class="row">
					<form action="{{route('commandh.store')}}" method="POST">
					{{csrf_field()}}
						<div class="col-md-1"><img class="rounded-circle" src="/storage/avatar/avatar.png" width="40"></div>
						<div class="col-md-2">
						<input class="form-control" type="hidden"  name="post_id" value="{{$posts->id}}" >
						<input class="form-control" type="text" placeholder="Your Name or Email" name="email" >
						</div>
						<div class="col-md-9"><textarea class="form-control" placeholder="Your Comment" name="commend"></textarea>
						<div class="text-right command-button"><button class="btn btn-primary btn-sm shadow-none" type="submit">Post comment</button><button class="btn btn-primary btn-sm ml-1 shadow-none" type="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-1" href="#collapse-1">Cancel</button></div>
					 </form>
					    </div>
						
					</div>
                  
                </div>
                <div id="collapse-2" class="share" data-parent="#myGroup" aria-expanded="false" >
                    <div class="links"><i class="fa fa-facebook border p-3 rounded mr-1"></i><i class="fa fa-twitter border p-3 rounded mr-1"></i><i class="fa fa-google-plus"></i> </div>
                </div>
            </div>
        </div>
    </div>
</div>
			<!-- end  commend -->
			

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

	@include('include.footer')

</body>

</html>
