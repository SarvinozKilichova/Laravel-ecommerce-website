@extends('layouts.main')
@section('navbar')
@endsection
@section('abort')
 <div class="ps-404 bg--cover" data-background="images/background/404.jpg">
      <div class="ps-404__content">
        <h1>404</h1>
        <h3>Page not found</h3>
        <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p><a class="ps-btn" href="index.html">Back to home<i class="ps-icon-next"></i></a>
      </div>
    </div>

  @endsection 