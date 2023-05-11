@if (session('status'))
  {{-- <div class="alert alert-success alert-dismissible fade show m-1">
    {{ session('status') }}
  </div> --}}


    <div class="alert alert-success alert-dismissible fade show m-1">

      {{ session('status') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>


@endif