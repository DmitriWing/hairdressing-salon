@extends('layouts.publicSite')
@section('content')

<section id="price" class="wow fadeInUp sec-padding">
  <div class="container">
    <div class="section-header">
      <h2>Услуги 2 вариант</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt fugiat culpa esse aute nulla. duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
    </div>

    <div class="row">
      @foreach ($categories as $category)
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
          <div class="offer offer-radius offer-{{$category->color}}">
            @if($category->label != NULL)
            <div class="shape">
              <div @class(['shape-text', 'shape-text-bg-white' => $category->color == 'light'])>
                {!! $category->label !!}
              </div>
            </div>
          @endif
            <div class="offer-content">
              <h3 class="lead">{{$category->title}}</h3>
              <p>
                @if($category->cost_upper == NULL)
                  от {{$category->cost_lower}} евро
                @else
                  {{$category->cost_lower}} - {{$category->cost_upper}} евро
                @endif
              </p>
            </div>
          </div>
        </div>
      @endforeach
    </div> 
  </div>
</section><!-- #clients -->



@endsection