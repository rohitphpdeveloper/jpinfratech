@extends('layouts.homeapp')

@section('content')
		<div class="blog_left_sidebar cellpadding">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-12">
						<div class="box_11">
							<div class="wow slideInLeft">
								<div class="image">
								<a href="{{url('/')}}">{{Html::image('public/assets/img/logo.jpg')}}</a>
								</div>
							</div>
						</div>
            @if (Auth::guest())
                <div class="pdfBlock wow slideInUp">
                  <a href="{{url('/login')}}">
                     <i class="fa fa-sign-in"></i>
                     <div class="pdfSize">
                      <span>Fd Holder</span>
                      <p>Login</p>
                     </div>
                    </a>
                  </div>
                  <div class="pdfBlock wow slideInUp">
                      <a href="{{url('/login_buyers')}}">
                         <i class="fa fa-sign-in"></i>
                         <div class="pdfSize">
                            <span>Home Buyers</span>
                            <p>Login</p>
                         </div>
                      </a>
                  </div>
               @else
                   <div class="pdfBlock wow slideInUp" style="visibility: visible; animation-name: slideInUp;">
                      <a href="{{url('/home')}}">
                       <i class="fa fa-sign-in" style="top: 12px;
                      font-size: 30px;"></i>
                       <div class="pdfSize">
                        <span>Dashboard</span>
                       </div>
                      </a>
                      </div>
                      <div class="pdfBlock wow slideInUp" style="visibility: visible; animation-name: slideInUp;">
                       <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                          </form>
                       <i class="fa fa-sign-in" style="top: 12px;
                      font-size: 30px;"></i>
                       <div class="pdfSize">
                        <span>Logout</span>
                       </div>
                      </a>
                      </div>
                @endif
					

						<aside class="blogAside">
							<div class="emptySpace30 emptySpace-xs10"></div>
							<div class="text-widget normall">
								<div class="recentTitle">
									<h5 class="h5 as">Latest News</h5>
								</div>
                @foreach($news as $row)
								<div class="image">
									<marquee direction="up" scrollamount="1">
										<a href="{{url('news/'.$row->url)}}">{{$row->name}}</a>
									</marquee>
								</div>
                 @endforeach
							</div>
						</aside>
					</div>
					<div class="col-md-9 col-sm-12">
<div class="sec-title text-center">
             <h1 style="color:#07579e; font-size:100px; padding-top:20px;"></h1>  <h2>  Website is Under Construction</h2> 
            </div>
						<!--- <ul class="ca-menu2">
                    <li class="ca-menu1">
                        <a href="{{url('page/corporate')}}">
                            <span class="ca-icon2"><i class="fa fa-building-o" aria-hidden="true"></i></span>
                            <div class="ca-content2">
                                <h2 class="ca-main2">Corporate</h2>
                               
                            </div>
                        </a>
                    </li>
                    <li class="ca-menu0">
                        <a href="{{url('page/business')}}">
                            <span class="ca-icon2"><i class="fa fa-briefcase"></i></span>
                            <div class="ca-content2">
                                <h2 class="ca-main2">Business</h2>
                            </div>
                        </a>
                    </li>
                    <li class="ca-menu3">
                        <a href="{{url('page/investor')}}">
                            <span class="ca-icon2"><i class="fa fa-user"></i></span>
                            <div class="ca-content2">
                                <h2 class="ca-main2">Investors</h2>
                            </div>
                        </a>
                    </li>
                    <li class="ca-menu4">
                        <a href="{{url('page/csr')}}">
                            <span class="ca-icon2"><i class="fa fa-user"></i></span>
                            <div class="ca-content2">
                                <h2 class="ca-main2">CSR</h2>
                            </div>
                        </a>
                    </li>
                    <li class="ca-menu5">
                        <a href="{{url('contact_us')}}">
                            <span class="ca-icon2"><i class="fa fa-pencil"></i></span>
                            <div class="ca-content2">
                                <h2 class="ca-main2">Careers</h2>
                            </div>
                        </a>
                    </li>
                    <li class="ca-menu6">
                        <a href="{{url('page/gallery')}}">
                            <span class="ca-icon2"><i class="fa fa-picture-o" aria-hidden="true"></i></span>
                            <div class="ca-content2">
                                <h2 class="ca-main2">Gallery</h2>
                            </div>
                        </a>
                    </li>
                </ul>
					</div>	
				</div>
			</div>
		</div>-->
<!--
		  <div class="footer_strip">
            <div class="container">
               <div class="row">
                  <div class="col-md-10 col-sm-8 wow slideInLeft" data-wow-duration="5s" data-wow-delay="0.1s" data-wow-offset="10">
                     <h3>Are you looking for experts advice for your new business?</h3>
                  </div>
                  <div class="col-md-2 col-sm-4">
                     <a href="{{url('contact_us')}}">
                        <div class="wrapper-inner-tab-backgrounds-first">
                           <div class="sim-button button6 whitebtn"><span>Contact us</span></div>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      <div id="content-wrapper">
         <div class="about_sec cellpadding">
            <div class="container">
               <div class="row">
                  <h1 class="text-center">What <span>We do</span></h1>
                  <div class="empty-space lg-40 xs-20 sm-30"></div>
                  <div class="col-md-6 col-sm-12">
                     <div class="empty-space lg-20 sm-20"></div>
                     <div class="simple-text wow slideInLeft">
                        <p>“To strive for excellence in every activity we undertake as we contribute in nation building through our participation in the infrastructure sector of the country, utilizing resources optimally, while growing with a human face.”</p>
                						<p>To become India’s leading name in the field of infrastructure development and real estate.<br>
To become a leading brand in luxurious and spacious living, in sync with nature<br>
To become a leading name in serving the nation with world class highways and industrial infrastructure<br>
                            </p>
                					</div>
                     <div class="empty-space lg-30"></div>
                     <div class="wrapper-inner-tab-backgrounds-first slideInLeft">
                        <a href="{{url('page/about_us')}}">
                           <div class="sim-button button6 yellowbtn"><span>READ MORE</span></div>
                        </a>
                     </div>
                     <div class="empty-space sm-40 xs-40"></div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                     <div class="about_right slideInRight">
			{{Html::image('public/assets/img/aboutus.png','',array('class'=>'img-responsive'))}}
                     </div>
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
         </div> --> 
<style>
.tt-footer{display:none;}
.blogAside{display:none;}
</style>      
         @endsection        
       
