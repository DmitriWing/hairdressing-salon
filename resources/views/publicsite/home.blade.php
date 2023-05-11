@extends('layouts.publicSite')
@section('intro')

<section id="intro">

  <div class="intro-content">
    <h2><span>Прически и макияж,</span><br>которые впечатляют</h2>
    <div>
    </div>
  </div>
  <div class="item" style="background-image: url('img/intro-carousel/1.jpg');"></div>  
</section><!-- #intro -->

@endsection

@section('content')

<section id="testimonials" class="wow fadeInUp sec-padding">
  <div class="container">
    <div class="section-header">
      <h2>Отзывы</h2>
      <p>Здесь вы можете оставить отзыв, пожелание или поделиться своими мыслями</p>
    </div>
    <div class="owl-carousel testimonials-carousel">
      @foreach ($testimonials as $testimonial)
        <div class="testimonial-item">
          <p>
            {{$testimonial->body}}
          </p> 
          <h3>{{$testimonial->users()->withTrashed()->first()->name ?? 'аноним'}}</h3>
        </div>
      @endforeach

    </div>
    <nav id="">
      <ul class="nav-menu">
        <li><a 
          @auth
          data-toggle="modal" data-target="#testimonialsModal" 
          type="button" class="modalButton" 
          @else
          href="login" 
        @endauth
          >Оставить отзыв</a></li>
      </ul>
    </nav>

    <!-- Modal  -->
<div class="modal fade" id="testimonialsModal" tabindex="-1" role="dialog" aria-labelledby="testimonialsModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-black">
      <div class="modal-header">
        <h5 class="modal" id="testimonialsModalTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        
        <div class="col ">
          <div class="card bg-black">
            <div class="customer-message align-items-center">
              <form action="createtestimonial" method="POST" name="testimonialForm" id="testimonialForm">
              @csrf
              <textarea rows="5" cols="100" class="form-control" placeholder="Оставьте Ваш отзыв тут" name="testimonial" id="testimonial" required data-validation-required-message="Please enter your message" minlength="5" data-validation-minlength-message="Min 5 characters"  maxlength="999" style="resize:none"></textarea>
            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer d-block">

        <nav id="">
          <ul class="nav-menu">
            <li><a type="button" class="modalButton" data-dismiss="modal">Закрыть</a></li>
            <li ><a onclick="event.preventDefault(); $('#testimonialForm').submit();" class="modalButton ">Отправить</a></li>
          </ul>
        </nav>
      </form>

      </div>
    </div>
  </div>
</div>
<!-- Modal -->

  </div>
</section>
<!-- #testimonials -->

@endsection