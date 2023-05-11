@extends('layouts.adminka')
@section('content')

<div class="col-lg-12" >
  <div class="card mb-4 px-2">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Галерея</h6>
      @include('dashboard.gallery.filterform')
      <a class="m-0 float-right btn btn-outline-primary btn-sm" href="{{url('addimage')}}">Добавить фото <i class="fas fa-plus-circle"></i></a>
    </div>
    <div class="row justify-content-around">

    @foreach ($images as $image)
     {{-- var_dump($image);  --}}
    <div class="card m-2" style="width: 18rem;">
      <img class="card-img-top" src="/images/gallery/{{$image->image}}" alt="Card image cap">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title">
          {{!empty($image->categories->title) ? $image->categories->title : 'Без категории'}}
        </h5>

        <button class="btn btn-outline-link dropdown-toggle" type="button" data-toggle="dropdown"  aria-expanded="false">
          <i class="fas fa-cog"></i>
        </button>

        <div class="dropdown-menu">
          <form 
            action="{{ route('editimage', $image->id) }}"
            method="POST" id="category-form-{{ $image->id }}">
            @csrf
            @foreach ($categories as $category)
              <div class="dropdown-item">
                <input type="radio" 
                value="{{$category->id}}" 
                id="category-form-{{ $image->id }}_{{$category->id}}" 
                name="category_id[{{ $image->id }}]"
                @checked($image->category_id == $category->id) class="inputRadio" 
                onchange="document.querySelector('#category-form-{{ $image->id }}').submit()">
                <label for="category-form-{{ $image->id }}_{{$category->id}}">{{$category->title}}</label>
              </div>
            @endforeach
          </form>
            <div class="dropdown-item">
              <button type="button" class="btn btn-outline-danger btn-sm delete btn-flat no-wrap" data-toggle="modal" data-target="#imageDelete{{$image->id}}"><i class="fas fa-trash-alt"></i> Удалить</button>
            </div>
        </div>

      </div>

      <ul class="list-group list-group-flush">
        <li class="list-group-item p-0">
          <form action="{{ url('publishimage/'.$image->id) }}" method="POST" id="publish-form-{{ $image->id }}">
            @csrf
            <input type="checkbox" name="image_{{$image->id}}" id="image_{{$image->id}}"  onchange="document.querySelector('#publish-form-{{ $image->id }}').submit()" @checked($image->publishing) class="inputPublish">
            <label for="image_{{$image->id}}" class="labelPublish">
              {{$image->publishing ? 'Снять с публикации' : 'Опубликовать'}}
            </label>
          </form>
        </li>
      </ul>

      <div class="card-footer mt-auto">
        <small class="text-muted">Добавлено: {{ mb_convert_case($image->created_at->locale('ru_RU')->isoFormat('MMM D, YYYY'), MB_CASE_TITLE, "UTF-8") }}</small>
      </div>
    </div>
    
        
    {{-- To delete image from gallery. It called by button from dropdown menu --}}
    <form action="{{ url('deleteimage/'.$image->id) }}" method="POST">
      @csrf	
      @method('DELETE')
      @include('common.modalwindow')
    </form>

    @endforeach
     </div>  {{-- row ends --}}




  </div>
</div>















@endsection