<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Kseniya Studio</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta content="Author" name="WebThemez">
  <!-- Favicons -->
  {{-- <link href="img/favicon.png" rel="icon"> --}}
  <link href="{{asset('images/avatars/mylogo.png')}}" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('publicsite/lib/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="{{asset('publicsite/fontawesome-free-6.2.1-web/css/all.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('publicsite/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('publicsite/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('publicsite/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('publicsite/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('publicsite/lib/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
  <link href="{{asset('publicsite/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('publicsite/css/style.css')}}" rel="stylesheet"> 
  <link href="{{asset('publicsite/css/dimastyle.css')}}" rel="stylesheet"> 
</head>

<body id="body">

  <!--==========================
    Top Bar
  ============================-->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="fa fa-envelope-o"></i> <a href="mailto:contact@example.com">name@websitename.com</a>
        <i class="fa fa-phone"></i> +1 2345 67855 22
      </div>
      <div class="social-links float-right">
        <a href="https://twitter.com/?lang=ru" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="https://www.facebook.com/" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="https://www.linkedin.com/" class="linkedin"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.instagram.com/" class="instagram"><i class="fa fa-instagram"></i></a>
      </div>
    </div>
  </section>

  <!--==========================
    Header
  ============================-->
   <!-- Topbar Start -->
   <div class="container-fluid d-block top-contact-bar">
    <div class="row py-0.5 px-5 justify-content-between ">
      <div class="text-left text-black ">
          <div class="d-inline-flex align-items-center testClass">
              <small class="text-dark"><i class="fa fa-phone-alt mr-2"></i>+372 5817 2897</small>
              <small class="px-3 text-dark">|</small>
              <small class="text-dark"><i class="fa fa-envelope mr-2"></i>ksenia.andrukovich@gmail.com</small>
          </div>
      </div>
      <div class="text-right text-black">
        <div class="d-inline-flex align-items-center">
          <a class="text-dark px-2" target="blank" href="https://twitter.com/?lang=ru">
              <i class="fab fa-twitter"></i>
          </a>
          <a class="text-dark px-2" target="blank" href="https://www.linkedin.com/">
              <i class="fab fa-linkedin-in"></i>
          </a>
          <a class="text-dark px-2" target="blank" href="https://www.instagram.com/">
              <i class="fab fa-instagram"></i>
          </a>
          <a class="text-dark px-2" target="blank" href="https://www.youtube.com/">
              <i class="fab fa-youtube"></i>
          </a>
          <small class="px-2">|</small>
          @auth
            <form method="POST" action="{{route('logout')}}">
              @csrf
              <a type="submit" class="text-dark" href="{{route('logout')}}">
                <small><i class="fas fa-sign-out-alt"></i> Выйти</small>
              </a>
            </form>
            <small class="px-2">|</small>

            @canany(['isAdmin', 'isManager'])
              <a class="text-dark " href="/adminka">
                <small><i class="fas fa-fw fa-tachometer-alt"></i> Админка</small>
              </a>
            @elsecanany(['isUser'])
              <a class="text-dark " href="/profile">
                <small><i class="fas fa-user"></i> {{ Auth::user()->name }}</small>
              </a>
            @endcanany
          @else
            <a class="text-dark " href="/login">
              <small><i class="fas fa-sign-in-alt"></i> Войти</small>
            </a>
            <small class="px-2">|</small>
            <a class="text-dark " href="/register">
              <small><i class="fas fa-user-plus"></i> Регистрация</small>
            </a>
          @endauth
        </div>
      </div>
    </div>
  </div>
<!-- Topbar End -->


  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="/" class="scrollto"><span>Kseniya</span> Studio</a></h1> 
      </div>
      @php
          $path = Request::path();

      @endphp
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="{{$path === '/' ? 'menu-active' : ''}}"><a href="/">Главная</a></li>
          <li class="{{$path === 'services' ? 'menu-active' : ''}}"><a href="/services">Услуги</a></li>
          <li class="{{$path === 'aboutme' ? 'menu-active' : ''}}"><a href="/aboutme">Обо мне</a></li>
          <li class="{{$path === 'gallery' ? 'menu-active' : ''}}"><a href="/gallery">Галерея</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  @yield('intro')

  <main id="main">
    @yield('content')

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; <strong>Здесь</strong> тоже надо 
      </div>
      <div class="credits"> 
        что-то добавить
      </div>
    </div>
  </footer>
  <!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript  -->
  <script src="{{asset('publicsite/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('publicsite/lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('publicsite/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('publicsite/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('publicsite/lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{asset('publicsite/lib/superfish/superfish.min.js')}}"></script>
  <script src="{{asset('publicsite/lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('publicsite/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('publicsite/lib/magnific-popup/magnific-popup.min.js')}}"></script>
  <script src="{{asset('publicsite/lib/sticky/sticky.js')}}"></script> 
  <script src="{{asset('publicsite/contact/jqBootstrapValidation.js')}}"></script>
  <script src="{{asset('publicsite/contact/contact_me.js')}}"></script>
  <script src="{{asset('publicsite/js/main.js')}}"></script>

</body>
</html>
