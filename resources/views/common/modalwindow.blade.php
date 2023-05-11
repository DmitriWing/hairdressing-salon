<!-- Modal Center -->
<div class="modal fade" 

@if(!empty($category->id) && empty($image->id)) id="categoryClear{{$category->id}}"
@elseif(!empty($user->id)) id="userClear{{$user->id}}"
@elseif(!empty($testimonial->id)) id="testDelete{{$testimonial->id}}"
@elseif(!empty($comment->id)) id="commentDelete{{$comment->id}}"
@elseif(!empty($image->id)) id="imageDelete{{$image->id}}"
@else id="staticBackdrop"
@endif 

data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Подтверждение</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if(!empty($category->id) && empty($image->id))
        Уверены, что хотите удалить категорию "{{$category->title}}"?
        @elseif(!empty($user->id))
        Уверены, что хотите удалить пользователя "{{$user->name}} ({{ucfirst($user->role)}})" ?
        @elseif(!empty($testimonial->id))
        Уверены, что хотите удалить отзыв (ид: {{$testimonial->id}}) пользователя {{$testimonial->users()->withTrashed()->first()->name ?? 'аноним'}}?
        @elseif(!empty($comment->id))
        Уверены, что хотите удалить комментарий (ид: {{$comment->id}}) пользователя {{$comment->users()->withTrashed()->first()->name ?? 'аноним'}}?
        @elseif(!empty($image->id))
        Уверены, что хотите удалить фото?
        @endif
        
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Закрыть</button>

        <button type="submit" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50"><i class="fas fa-sync fa-spin"></i></span>
          <span class="text">На все 100%</span>
        </button>
      </div>
    </div>
  </div>
</div>
