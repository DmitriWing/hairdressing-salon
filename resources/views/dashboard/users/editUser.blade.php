@extends('layouts.adminka')
@section('content')

<div class="card mb-10 col-xl-10 col-md-10">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
  <h6 class="m-0 font-weight-bold text-primary">Редактировать пользователя</h6>
  <a href="/userslist" class="btn btn-outline-primary btn-icon-split">
    <span class="icon text-white-50"><i class="fas fa-arrow-alt-circle-left"></i></span>
    <span class="text">Все пользователи</span>
  </a>
</div>
@include('common.errors')
<div class="card-body">
  {{-- @if(Auth::user()->id == $user->id || Gate::allows('isAdmin')) --}}
  <form action="{{url('/edituser/'.$user->id)}}" method="POST" enctype="multipart/form-data">
    <!-- modal window -->
    {{-- @include('common.modalwindow') --}}
    @csrf
  	<div class="form-group">
      <label for="Server01">Имя</label>
      <input name="name" type="text" value="{{$user->name}}" class="form-control" id="Server01">
      <div class="valid-feedback"></div>
      
    </div>

    <div class="form-group">
      <label for="Server02">Роль:</label>
       <select name="role" class="form-control" id="Select1" {{-- @if(Auth::user()->role != 'admin') disabled @endif --}}> 
      	@foreach ($roles as $role)
      		<option value="{{$role}}"
      		@if ($user->role == $role)
      			selected
      		@endif
      		>{{ucfirst($role)}}</option>
      	@endforeach
      </select>
      <div class="valid-feedback"></div>
      
    </div>

    <div class="form-group">
      <label for="Server03">Мэйл</label>
      <input name="email" type="email" value="{{$user->email}}" class="form-control" id="Server03" readonly>
      <div class="valid-feedback"></div>
      
    </div>

    <div class="form-group">
      <label for="Password1">Пароль</label>
      <input type="password" name="password" class="form-control" id="Password1" placeholder="Password">
    </div>

    <div class="form-group">
      <label for="Password2">Подтверждение пароля</label>
      <input type="password" name="password_confirmation" class="form-control" id="Password2" placeholder="Confirm Password">
    </div>

    <div class="form-group">
      <label for="Server04">Телефон</label>
      <input name="phone" type="phone" value="{{$user->phone}}" class="form-control" id="Server04">
      <div class="valid-feedback"></div>
    </div>

    <div class="form-group">
      <label for="exampleFormControlReadonly">Текущая аватарка</label>
      <input class="form-control" type="text" name="avatarcurrent" value="{{$user->avatar}}" 
        id="exampleFormControlReadonly" readonly hidden >
      <div class="currentImg">
        <img src="../images/avatars/{{$user->avatar}}" class="img-thumbnail">
      </div>
    </div>

    <div class="form-group">
      <div class="input-group">
        <div class="custom-file">
          <input name="avatar" type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Выберите изображение</label>
        </div>
      </div>
    </div>

    <button class="btn btn-outline-success btn-icon-split" type="submit">
      <span class="icon text-white-50"><i class="fas fa-check"></i></span>
      <span class="text">Применить</span>
    </button>

  </form>
  <!-- below button is to call modal window -->
  {{-- @else --}}

  {{-- <div class="alert alert-danger font-weight-bold">You don't have permission to manage foreign profile</div>
  <a href="/profile/{{Auth::user()->id}}" class="m-0 font-weight-bold text-primary">Edit your profile</a> --}}

  {{-- @endif --}}
  
</div>
</div>









@endsection