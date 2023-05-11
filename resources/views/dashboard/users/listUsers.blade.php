@extends('layouts.adminka')
@section('content')

<div class="col-lg-12">
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Пользователи</h6>
      <a class="m-0 float-right btn btn-primary btn-sm" href="{{url('/adduser')}}">Добавить <i class="fas fa-plus-circle"></i></a>
    </div>
    <div class="table-responsive p-3">
      <table class="table align-items-center table-flush" id="dataTable">
        <thead class="thead-light">
          <tr>
            {{-- <th>ИД</th> --}}
            <th>Имя</th>
            <th>Мейл</th>
            <th>Телефон</th>
            <th>Роль</th>
            <th>Дата</th>
            <th width="17%">Опции</th> 
          </tr>
        </thead>
        <tfoot>
          <tr>
            {{-- <th>ИД</th> --}}
            <th>Имя</th>
            <th>Мейл</th>
            <th>Телефон</th>
            <th>Роль</th>
            <th>Дата</th>
            <th>Опции</th> 
          </tr>
        </tfoot>
        <tbody>

        	@foreach ($users as $user)
          @if ($user->deleted_at == NULL)
          
      		<tr>
            {{-- <td>{{$user->id}}</td> --}}
            <td>{{$user->name}} <img class="img-profile rounded-circle" src="images/avatars/{{$user->avatar}}" style="max-width: 60px"></td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{ucfirst($user->role)}}</td>
            <td>{{$user->created_at->format('M j, Y')}}</td>

            <td class="d-flex justify-content-between">
            	<!-- form rdirect to the route form deleting -->
						<form action="{{ url('deleteuser/'.$user->id) }}" method="POST" id="myForm">
            @csrf		<!-- this is to protect from injections -->
            @include('common.modalwindow')
              <a href="{{url('edituser/'.$user->id)}}" type="button" class="btn btn-outline-success btn-sm m-1"><i class="far fa-edit"></i> Править</a>
            </form>
              <!-- below button is to call modal window -->
            	<button type="button" class="btn btn-outline-danger btn-sm m-1 no-wrap" data-toggle="modal" data-target="#userClear{{$user->id}}"><i class="fas fa-trash-alt"></i> Удалить</button>
						
            </td>
          </tr>
          @endif
        	@endforeach
          
        </tbody>
      </table>
    </div>
  </div>
</div>















@endsection