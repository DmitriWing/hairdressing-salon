@extends('layouts.adminka')
@section('content')

<div class="card mb-10 col-xl-10 col-md-10">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Добавить фото</h6>
    <a href="/listimages" class="btn btn-outline-primary btn-icon-split">
      <span class="icon text-white-50"><i class="fas fa-arrow-alt-circle-left"></i></span>
      <span class="text">Галерея</span>
    </a>
  </div>

  {{-- @if (session('success'))
      <div class="alert alert-info alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if (isset(session('success')['deleted_category']))
        <div class="alert alert-info">
          <pre>{{ print_r(session('success')['deleted_category'], true) }}</pre>
        </div>
      @endif
    @endif --}}

  @include('common.errors')
  @include('common.status')
  <div class="card-body">
    <form action="{{url('/addimage')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="category">Категория:</label>
        <select name="category" class="form-control" id="category">
          <option value="0">Выберите категорию</option>
          @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
          @endforeach
        </select>
        <div class="valid-feedback"></div>
      </div>
      
      <div class="form-group">
        <div class="input-group">
          <div class="custom-file">
            <input name="image[]" type="file" class="custom-file-input" id="customFile" multiple>
            <label class="custom-file-label" for="customFile">Выберите изображение</label>
          </div>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-9">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="publishing" name="publishing">
            <label class="custom-control-label" for="publishing">Сразу опубликовать</label>
          </div>
        </div>
      </div>

      
      <button class="btn btn-outline-success btn-icon-split" type="submit">
        <span class="icon text-white-50"><i class="fas fa-check"></i></span>
        <span class="text">Добавить</span>
      </button>

    </form>
  
</div>
</div>

{{-- to show chosen files in the label of the file input --}}
<script>
  const fileInput = document.querySelector('#customFile');
  const label = fileInput.nextElementSibling;
  fileInput.addEventListener('change', (event) => {
    const fileList = event.target.files;
    if (fileList.length) {
      label.innerText = Array.from(fileList).map(file => file.name).join(', ');
    } else {
      label.innerText = 'Выберите изображение';
    }
  });
</script>







@endsection