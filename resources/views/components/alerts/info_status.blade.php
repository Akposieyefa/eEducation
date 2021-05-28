@if (session()->has('info_status'))
<div class="alert alert-info" role="alert">
  {{ session('info_status') }}
</div>
@endif