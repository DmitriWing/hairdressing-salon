@extends('layouts.adminka')
@section('content')

<div class="col-lg-12">
  <div class="card mb-4" style="background-color: #0b111f">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Услуги</h6>
      <a class="m-0 float-right btn btn-outline-primary btn-sm" href="{{url('addcategory')}}">Добавить новую <i class="fas fa-plus-circle"></i></a>
    </div>

    <div class="row px-3">
      @foreach ($categories as $category)
      @if ($category->deleted_at == NULL)
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
              <div class="d-flex justify-content-around p-1">

                <form action="{{ url('deletecategory/'.$category->id) }}" method="POST">
                  @include('common.modalwindow')
                  @csrf		<!-- this is to protect from injections -->
                  <a href="{{url('editcategory/'.$category->id)}}" title="edit" type="button" class="btn btn-outline-success btn-sm mx-1"><i class="far fa-edit"></i> Править</a>
                </form>
                      <!-- below button is to call modal window -->
                <button type="button" class="btn btn-outline-danger btn-sm mx-1" data-toggle="modal" data-target="#categoryClear{{$category->id}}"><i class="fas fa-trash-alt"></i> Удалить</button>
            </div>
          </div>
              
        </div>

      @endif
      @endforeach
    </div>  {{-- row ends --}}
  </div>
</div>



@endsection