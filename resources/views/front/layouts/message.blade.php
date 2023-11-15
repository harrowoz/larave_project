@if (Session::has('error'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    <h4><i class="icon fa fa-ban"></i>Error</h4> {{Session::get('error')}}
</div>
@endif
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    <h4><i class="icon fa fa-check"></i>Success!</h4> {{ Session::get('success') }}
</div>
@endif
