@if (session()->has('info'))
<div class="alert alert-info" role="alert">
  {{ session('info') }}
</div>
@endif