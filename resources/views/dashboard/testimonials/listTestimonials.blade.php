@extends('layouts.adminka')
@section('content')

<div class="col-lg-12">
  <div class="card mb-4">
    @include('common.status')
    <div class="card-header py-3 d-flex flex-row align-testimonials-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Отзывы</h6>
    </div>
    <div class="table-responsive p-3">
      <table class="table align-testimonials-center table-flush" id="dataTable">
        <thead class="thead-light">
          <tr>
            <th>ИД</th>
            <th>Отзыв</th>
            <th>Автор</th>
            <th width='100'>Дата</th>
            <th width='80'>Опции</th> 
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>ИД</th>
            <th>Отзыв</th>
            <th>Автор</th>
            <th>Дата</th>
            <th>Опции</th> 
          </tr>
        </tfoot>
        <tbody>

        	@foreach ($testimonials as $testimonial)
          
      		<tr class="{{!isset($testimonial->users->name) ? 'softDeleted' : ''}}">
            <td>{{$testimonial->id}}</td>
            <td>{{$testimonial->body}} </td>
            <td>
              {{$testimonial->users()->withTrashed()->first()->name ?? 'аноним'}}
              <small>{{!isset($testimonial->users->name) ? '(удалён)' : ''}}</small>
            </td>
            <td>{{$testimonial->created_at->format('M j, Y')}}</td>

            <td>
            	<!-- form rdirect to the route form deleting -->
						<form action="{{ url('deletetestimonial/'.$testimonial->id) }}" method="POST" id="myForm">
              @include('common.modalwindow')
							@csrf		<!-- this is to protect from injections -->
            </form>
              <!-- below button is to call modal window -->
            	<button type="button" class="btn btn-outline-danger btn-sm delete btn-flat no-wrap" data-toggle="modal" data-target="#testDelete{{$testimonial->id}}"><i class="fas fa-trash-alt"></i> Удалить</button>
						
            </td>
          </tr>
        	@endforeach
          
        </tbody>
      </table>
    </div>
  </div>
</div>















@endsection