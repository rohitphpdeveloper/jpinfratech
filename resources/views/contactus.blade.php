@extends('layouts.homeapp')
@section('content')

<div class="contact_us cellpadding">
    <div class="container ">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <div class="content">
            <div class="icons_01"><i class="fa fa-phone" aria-hidden="true"></i></div>
            <h4>contact deatils</h4>
            
            <h5>(0120) 4609000, 2470800</h5>
          </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="content">
              <div class="icons_01"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
              <h4>email</h4>
              <h5>info@jaypeeinfrastructure.com</h5>
          </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="content last">
              <div class="icons_01"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
              <h4>location</h4>
              <h5>Sector-128 ,Noida - 201304,Uttar Pradesh,India</h5>
              </div>
          </div>
      </div>
    </div>
  </div>

  <div class="contact_form cellpadding">
            <div class="container">
                 @if (count($errors) > 0)
                  <div class="alert alert-danger">
                        <ul class='text'>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                  @endif

                  @if(session()->has('success'))

                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong> {{ session()->get('success') }}</strong> 
                    </div>
                   @endif
              </div>
               <div class="row">
                  <div class="content">
                     <h4>We Love to Hear From You</h4>
                     <div class="simple-text">
                        <p style="text-align:center;">Please call or email contact form and we will be happy to assist you.</p>
                     </div>
                  </div>
               </div>
               <div class="row">
                <div class="col-lg-12">
                  <div class="contact_form_01">
                     <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1">
                      {!! Form::open(array('url' => 'contactus','method' => 'POST','class' => 'form-horizontal form-label-left','id'=>'contactForm')) !!}
                           <div class="form-group col-md-6 pl0">
                              <input name="name" id="name" class="form-control" placeholder="Name" required="" type="text">
                           </div>
                           <div class="form-group col-md-6 pr0" style="margin-left: 45px;">
                              <input id="email" name="email" class="form-control" placeholder="Email" required="" type="email">
                           </div>
                           <div class="form-group">
                              <input id="subject" name="mobileno" class="form-control" placeholder="Enter Your mobile number" required="" type="text">
                           </div>
                           <div class="form-group">
                              <textarea class="form-control" id="message" name="msg" rows="3" placeholder="Enter Your message" required></textarea>
                           </div>
                           <button type="submit" name="contactform" id="contactform" class="sim-button button6 btn btn-primary yellowbtn"><span>send Message</span></button>
                         {!! Form::close() !!}
                     </div>
                  </div>
               </div>
            </div>
         </div>
<script>
  window.setTimeout(function() {
      $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
      });
  }, 2000);
</script>

@endsection