@extends('layouts.publicSite')
@section('content')



<!--==========================
  Our Portfolio Section
============================-->
<section id="portfolio" class="wow fadeInUp sec-padding">
  <div class="container">
    <div class="section-header">
      <h2>Моя галерея</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt fugiat culpa esse aute nulla. nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row no-gutters">


@foreach ($images as $image)

      <!-- Modal  -->
<div class="modal fade" id="commentsModal-{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="commentsModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-black">
      <div class="modal-header">
        {{-- <h5 class="modal" id="commentsModalTitle">Modal title</h5> --}}
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body ">
        <div class="col ">
          <div class="card bg-black">

            {{-- @if (!array_key_exists($image->id, $comments) || count($comments[$image->id]) == 0) --}}
              {{-- <div class="customer-message align-items-center">
                <div class="text-white small "></div>
                <div class="text-white mb-3">Будте первым оставившим комментарий</div>
              </div> --}}
            {{-- @else --}}

            {{-- {{$testimonial->users()->withTrashed()->first()->name ?? 'аноним'}} --}}

              @foreach ($comments as $comment)
                @if($comment->gallery_id == $image->id)
                  <div class="customer-message align-items-center">
                    <div class="text-white small ">
                      {{$comment->users()->withTrashed()->first()->name ?? 'аноним'}} · {{$comment->created_at}}
                    </div>
                    <div class="text-white mb-3">{{$comment->body}}</div>
                  </div>
                @endif
              @endforeach  {{-- ends ($comments as $comment) --}}
              {{-- @endif (count($comments[$image->id]) == 0) --}}
              @auth
                <form action="{{url('createcomment/'.$image->id)}}" name="commentForm-{{$image->id}}" id="commentForm-{{$image->id}}" method="POST">
                @csrf
                  <textarea rows="5" cols="100" class="form-control" placeholder="Оставьте Ваш комментарий" name="body" id="message" required data-validation-required-message="Please enter your message" minlength="5" data-validation-minlength-message="Min 5 characters"  maxlength="999" style="resize:none"></textarea>
                </form>
              @endauth
              
          </div>
        </div>
      </div>
      <div class="modal-footer d-block">
        @auth
          <nav id="">
            <ul class="nav-menu">
              <li><a type="button" class="modalButton" data-dismiss="modal">Закрыть</a></li>
              <li ><a onclick="event.preventDefault(); $('#commentForm-{{$image->id}}').submit();" class="modalButton ">Отправить</a></li>
            </ul>
          </nav>
        @else
          <a href="login">Что бы оставить комментарий Вы должны войти в систему</a>
        @endauth

      </div>
    </div>
  </div>
</div>
<!-- Modal -->
          
      <div class="col-lg-3 col-md-4">
        <div class="portfolio-item wow fadeInUp">
          <a href="images/gallery/{{$image->image}}" class="portfolio-popup">
            <img src="images/gallery/{{$image->image}}" alt="{{$image->image}}">
          </a>
          <div class="portfolio-overlay">
            <div class="portfolio-info">
              <button data-toggle="modal" data-target="#commentsModal-{{$image->id}}" class="w-100 h-100 p-3 callComment">
                Комментарии
              </button>
            </div>
          </div>
        </div>
      </div>

     @endforeach {{-- ends ($images as $image) --}}
    </div>
  </div>
</section><!-- #portfolio -->





@endsection