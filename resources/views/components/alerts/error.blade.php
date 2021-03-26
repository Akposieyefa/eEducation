@if (session()->has('errMsg'))
<div class="alert alert-danger" role="alert">
  {{ session('errMsg') }}
</div>
@endif