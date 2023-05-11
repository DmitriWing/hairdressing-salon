@extends('layouts.adminka')
@section('content')

<div class="col-lg-12">
  <div class="card mb-4">
    @include('common.status')
    <div class="card-header py-3 d-flex flex-row align-comments-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Отзывы</h6>
    </div>
    <div class="table-responsive p-3">
      <table class="table align-comments-center table-flush" id="dataTable">
        <thead class="thead-light">
          <tr>
            <th>ИД</th>
            <th>Комментарий</th>
            <th>Фото</th>
            <th>Автор</th>
            <th width='100'>Дата</th>
            <th width='80'>Опции</th> 
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>ИД</th>
            <th>Комментарий</th>
            <th>Фото</th>
            <th>Автор</th>
            <th width='100'>Дата</th>
            <th width='80'>Опции</th> 
          </tr>
        </tfoot>
        <tbody>

        	@foreach ($comments as $comment)
          
      		<tr class="{{!isset($comment->users->name) ? 'softDeleted' : ''}}" >
            <td>{{$comment->id}}</td>
            <td>{{$comment->body}} </td>
            <td>
              <img src="images/gallery/{{$comment->gallery->image}}" style="max-width: 60px">
            </td>
            
            <td class="d-flex flex-column">
              {{$comment->users()->withTrashed()->first()->name ?? 'аноним'}}
              <small>{{!isset($comment->users->name) ? '(удалён)' : ''}}</small>
            </td>
            {{-- <td>{{$comment->users->name}}</td> --}}
            <td>
              {{ mb_convert_case($comment->created_at->locale('ru_RU')->isoFormat('MMM D, YYYY'), MB_CASE_TITLE, "UTF-8") }}
            </td>

            <td>
            	<!-- form rdirect to the route form deleting -->
						<form action="{{ url('deletecomment/'.$comment->id) }}" method="POST" id="myForm">
              @include('common.modalwindow')
							@csrf		<!-- this is to protect from injections -->
            </form>
              <!-- below button is to call modal window -->
            	<button type="button" class="btn btn-outline-danger btn-sm delete btn-flat no-wrap" data-toggle="modal" data-target="#commentDelete{{$comment->id}}"><i class="fas fa-trash-alt"></i> Удалить</button>
						
            </td>
          </tr>
        	@endforeach
          
        </tbody>
      </table>
    </div>
  </div>
</div>















@endsection