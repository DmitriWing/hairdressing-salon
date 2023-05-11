@extends('layouts.publicSite')
@section('content')
<!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="wow fadeInUp sec-padding">
      <div class="container">
        <div class="section-header">
          <h2>вход в систему</h2>
          <p>Все поля обязательные</p>
        </div>

        <div class="row contact-info">

          <!-- Form itself -->
		      <div class="col-lg-7 mx-auto">
		        <div class="container">
              <div class="form"> 
                @include('common.errors')
                <form method="POST" action="{{ route('login') }}" class="well" id="contactForm" > 
                  @csrf
                  <div class="form-group">
                    <div class="controls">
                      <label for="email"></label>
			                <input type="email" name="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Please enter your email" />
		                </div>
	                </div> 	

                  <div class="form-group">
                    <div class="controls">
                      <label for="password"></label>
			                <input type="password" name="password" class="form-control" placeholder="Пароль" id="password" required data-validation-required-message="Please enter your password" />
		                </div>
	                </div> 	
			 
                  <!-- For success/fail messages -->     	 
                  <div id="success"> </div>
        
	                <button type="submit" class="btn btn-primary pull-right">Войти</button><br />
                </form>
              </div>
            </div>
		      </div>
        </div> <!--  row -->
      </div> <!-- container -->

      <!-- <div class="container mb-4 map">
	  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d387191.33750346623!2d-73.979681!3d40.6974881!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1541477355474" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe> 
      </div> -->
 
    </section>
    <!-- #contact -->

@endsection