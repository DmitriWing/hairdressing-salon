
@extends('layouts.publicSite')
@section('content')
<!--==========================
      Contact Section
    ============================-->
<section id="contact" class="wow fadeInUp sec-padding">
    
    <div class="container">
        <div class="section-header">
          <h2>регистрация</h2>
          {{-- <p>Все поля обязательные</p> --}}
        </div>

        <div class="row contact-info">
          <!-- <div class="col-lg-5"> 
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>MN-12 Lincon Street, NewYork 12356, USA</address>
            </div> 
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+1 2345 67890 12</a></p>
            </div> 
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">name@website.com</a></p>
            </div> 
		      </div> -->

          <!-- Form itself -->
		      <div class="col-lg-7 mx-auto">
		        <div class="container">
                    <div class="form"> 
                        @include('common.errors')
                        @include('common.status')
                        <form method="POST" action="{{ route('register') }}" class="well" id="registerForm" > 
                         @csrf
                            {{-- name --}}
                            <div class="form-group">
                                <div class="controls">
                                    <label for="name"></label>
                                    <input type="text" name="name" class="form-control" placeholder="Имя (обязательно)" id="name" required data-validation-required-message="Пожалуйста введите имя" />
                                </div>
                            </div> 	
                            {{-- email --}}
                            <div class="form-group">
                                <div class="controls">
                                    <label for="email"></label>
                                    <input type="email" name="email" class="form-control" placeholder="Email (обязательно)" id="email" required data-validation-required-message="Пожалуйста введите мейл" />
                                </div>
                            </div> 	
                            {{-- phone --}}
                            <div class="form-group">
                                <div class="controls">
                                    <label for="phone"></label>
                                    <input type="phone" name="phone" class="form-control" placeholder="Тел. номер" id="phone" />
                                </div>
                            </div> 	
                            {{-- password --}}
                            <div class="form-group">
                                <div class="controls">
                                    <label for="password"></label>
                                    <input type="password" name="password" class="form-control" placeholder="Пароль (обязательно)" id="password" required data-validation-required-message="Please enter your password" />
                                </div>
                            </div> 	
                            {{-- confirm password --}}
                            <div class="form-group">
                                <div class="controls">
                                    <label for="password_confirmation"></label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Подтвердите пароль (обязательно)" id="password_confirmation" required data-validation-required-message="Please enter your password" />
                                </div>
                            </div> 	
                    <!-- For success/fail messages -->     	 
                            <div id="success"> </div>
                            <button type="submit" class="btn btn-primary pull-right">Зарегистрироваться</button><br />
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




{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
