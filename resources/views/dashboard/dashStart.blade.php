@extends('layouts.adminka')
@section('content')

<div class="col-xl-6 col-md-6 mb-4">
  <div class="card h-100">
    <div class="card-body">
      <div class="row justify-content-center">
        <div class="col mr-2">

          @if(isset(Auth::user()->id))
          <div class="text-xs font-weight-bold text-uppercase mb-1">Привет, {{Auth::user()->name}}</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">Добро пожаловать в Админ панель</div>
          <div class="mt-2 mb-0 text-muted text-xs">
            <div class="m-0 float-right btn btn-primary btn-sm">Вы вошли как 
              {{Auth::user()->role}} 
            </div>
          </div>
          @else
          <div class="text-xs font-weight-bold text-uppercase mb-1">Привет, Гость</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">Добро пожаловать в Админ панель</div>
          <div class="mt-2 mb-0 text-muted text-xs">
            <div class="m-0 btn btn-primary btn-sm" href="">
              Вы не авторизировались
            </div>
            <a class="m-0 float-right btn btn-secondary btn-sm" href="{{url('/login')}}">Войти <i class="fas fa-sign-in-alt"></i>
              <!-- <i class="fas fa-plus-circle"></i> --></a>
          </div>
          
          @endif

        </div>
        <div class="col-auto">
          <i class="fas fa-tachometer-alt fa-2x text-primary"></i>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection