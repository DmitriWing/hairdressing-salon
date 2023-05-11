@extends('layouts.adminka')
@section('content')

<div class="card mb-10 col-xl-10 col-md-10">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
  <h6 class="m-0 font-weight-bold text-primary">Добавить пользователя</h6>
  <a href="/listUsers" class="btn btn-primary btn-icon-split">
    <span class="icon text-white-50"><i class="fas fa-arrow-alt-circle-left"></i></span>
    <span class="text">Все пользователи</span>
  </a>
</div>
@include('common.errors')
@include('common.status')
<div class="card-body">
  <form action="{{url('/adduser')}}" method="POST" enctype="multipart/form-data">
    <!-- modal window -->
    {{-- @include('common.modalwindow') --}}
    @csrf
  	<div class="form-group">
      <label for="Server01">Имя:</label>
      <input name="name" type="text" class="form-control" id="Server01">
      <div class="valid-feedback"></div>
      
    </div>

    <div class="form-group">
      <label for="Server02">Роль:</label>
      <select name="role" class="form-control" id="Select1">
      	@foreach ($roles as $role)
      		<option value="{{$role}}" 
      		@if ($role == 'master')
      			selected
      		@endif
      		>{{ucfirst($role)}}</option>
      	@endforeach
      </select>
      <div class="valid-feedback"></div>
      
    </div>

    <div class="form-group">
      <label for="Server03">Мэйл:</label>
      <input name="email" type="email" class="form-control" id="Server03">
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
      <label for="Server04">Телефон:</label>
      <input name="phone" type="phone" class="form-control" id="Server04">
      <div class="valid-feedback"></div>
    </div>

    <div class="form-group">
      <div class="input-group">
        <div class="custom-file">
          <input name="avatar" type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Выберите изображение</label>
        </div>
      </div>
    </div>
    
    <button class="btn btn-success btn-icon-split" type="submit">
      <span class="icon text-white-50"><i class="fas fa-check"></i></span>
      <span class="text">Добавить</span>
    </button>

  </form>
  
</div>
</div>









@endsection