@if (session()->has('warning'))
<div class="alert alert-warning" role="alert">
  {{ session('warning') }}
</div>
@endif