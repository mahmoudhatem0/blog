	<!-- FOOTER -->
	<footer id="footer">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-3">
					<div class="footer-widget"> 
						<p>{{$setting->blog_name}}<br><ul> <li><i class="fa fa-phone"></i> {{$setting->phone_number}}<br><li><i class="fa fa-envelope"></i> {{$setting->blog_email}} <br><li><i class="fa fa-map-marker"></i> {{$setting->address}} </ul> </p>
						<ul class="contact-social">
							<li><a href="{{$setting->facebook}}" class="social-facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="{{$setting->twitter}}" class="social-twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="{{$setting->githup}}" class="social-google-plus"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Categories</h3>
						<div class="category-widget">
							<ul>
							
                                @foreach($category as $categorys)
                               <li><a href="{{route('category.show',['id'=>$categorys->id])}}">{{$categorys->name}} <span>{{$categorys->aposts()->count()}}</span></a></li>
                               @endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Tags</h3>
						<div class="tags-widget">
							<ul>
                                @foreach($tags as $tag)
								<li><a href="{{route('tags.show',['id'=>$tag->id])}}">{{$tag->tag}}</a></li>
                                @endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Newsletter</h3>
						<div class="newsletter-widget">
							<form action="{{route('subscribed')}}" method="POST">
							{{csrf_field()}}
								<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
								<input class="input" name="email" placeholder="Enter Your Email">
								<button type="submit" class="primary-button">Subscribe</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /row -->

			<!-- row -->
		
				<div class="col-md-12">
					<div class="footer-copyright">
						
Copyright &copy;<script>document.write(new Date().getFullYear());</script>
 All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by 
 <a href="https://colorlib.com" target="_blank">Colorlib</a>


					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
	<script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
