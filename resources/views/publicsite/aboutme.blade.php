@extends('layouts.publicSite')
@section('content')
<section id="team" class="wow fadeInUp sec-padding">
  <div class="container">
    <div class="section-header">
      <h2>Обо мне</h2>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="member">
          <div class="pic"><img src="{{asset('publicsite/img/team3.jpg')}}" alt=""></div>
          <div class="details">
            <h4>Ксения К</h4>
            <span>Что-то можно добавить</span>
            <div class="social">
              <a href="https://twitter.com/?lang=ru"><i class="fa fa-twitter"></i></a>
              <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
              <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-9 col-md-6 content">
        <h2>Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
        <h3>Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus ovident</h3>
        <p>Consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt fugiat. Dolores quae porro consequatur aliquam, incidunt fugiat culpa esse aute nulla. malis nulla duis fugiat</p>
        <ul>
          <li><i class="icon ion-ios-checkmark-outline"></i> Dolores quae porro consequatur aliquam, incidunt fugiat culpa.</li>
          <li><i class="icon ion-ios-checkmark-outline"></i> Dolores quae porro consequatur aliquam, culpa esse aute nulla.</li>
          <li><i class="icon ion-ios-checkmark-outline"></i> Dolores quae porro esse aute nulla. malis nulla duis fugiat</li>
        </ul> 
      </div>

    </div>

  </div>
</section>

<!--==========================
      Contact Section
============================-->
<section id="contact" class="wow fadeInUp sec-padding">
  <div class="container">
    <div class="section-header">
      <h2>Контакт</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt fugiat culpa esse aute nulla. malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
    </div>
    <div class="row contact-info">
      <div class="col-lg-5"> 
        <div class="contact-address">
          <i class="ion-ios-location-outline"></i>
          <h3>Адрес</h3>
          <address>Tškalovi 3a, Sillamae 40232, Estonia</address>
        </div> 
        <div class="contact-phone">
          <i class="ion-ios-telephone-outline"></i>
          <h3>Тел номер</h3>
          <p><a href="tel:+155895548855">+372 5817 2897</a></p>
        </div> 
        <div class="contact-email">
          <i class="ion-ios-email-outline"></i>
          <h3>Мейл</h3>
          <p><a href="mailto:info@example.com">ksenia.andrukovich@gmail.com</a></p>
        </div> 
      </div>
      <!-- map -->
      <div class="col-lg-7">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d427.03380250007166!2d27.759201805411035!3d59.39426427419336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46946a08ede2c5d5%3A0x9cc529e0396f6804!2sT%C5%A1kalovi%203a%2C%20Sillam%C3%A4e%2C%2040232%20Ida-Viru%20maakond!5e0!3m2!1sru!2see!4v1675783938219!5m2!1sru!2see" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>  
      <!-- ends map -->
    </div>
  </div>
</section>
<!-- #contact -->

@endsection