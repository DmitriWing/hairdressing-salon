@extends('layouts.adminka')
@section('content')

<div class="card mb-10 col-xl-10 col-md-10">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
  <h6 class="m-0 font-weight-bold text-primary">Управление услугами - Править</h6>
  <a href="/listCategories" class="btn btn-outline-primary btn-icon-split">
    <span class="icon"><i class="fas fa-arrow-alt-circle-left"></i></span>
    <span class="text">К списку услуг</span>
  </a>
</div>
@include('common.errors')
<div class="card-body">
  <form action="{{url('editcategory/'.$category->id)}}" method="POST" enctype="multipart/form-data">
    <!-- modal window -->
    @include('common.modalwindow')
    @csrf
  	<div class="form-group">
      <label for="title">Название: *</label>
      <input name="title" value="{{$category->title}}" type="text" class="form-control" id="title">
      <div class="valid-feedback">
      </div>
    </div>
    
    <div class="form-group">
      <label for="lowerPrice">Цена от: *</label>
      <input name="cost_lower" value="{{$category->cost_lower}}" type="number" class="form-control" id="lowerPrice" step="0.01">
      <div class="valid-feedback"></div>
    </div>
    
    <div class="form-group">
      <label for="upperPrice">Цена до:</label>
      <input name="cost_upper" value="{{$category->cost_upper}}" type="number" class="form-control" id="upperPrice" step="0.01">
      <div class="valid-feedback"></div>
    </div>

    <div class="form-group">
      <label for="label">Метка:</label>
      <input name="label" value="{{$category->label}}" type="text" class="form-control" id="label">
      <div class="valid-feedback"></div>
    </div>
    
    <div class="form-group">
      <label for="color">Цвет:</label>
      <select name="color" class="form-control" id="color">
        @foreach($colors as $color)
        <option value={{$color}} class="text-{{$color}}"
          @if($color == $category->color) selected @endif>{{ucfirst($color)}}
        </option>
        @endforeach
      </select>
      <div class="valid-feedback"></div>
    </div>

    <div class="form-group">
      <small>* обязательные поля</small>
    </div>

    <button class="btn btn-outline-success btn-icon-split">
      <span class="icon "><i class="fas fa-check"></i></span>
      <span class="text">Применить</span>
    </button>


  </form>
  
</div>
</div>









@endsection