@extends('layouts.main')

@section('content')
<a class="ml-2" href="{{  route('home') }}">главный страница</a>-><a href="{{ route('auto-tools') }}">aвто запчасти</a>

@if(isset($auto))
@foreach($auto as $a)
<h1 class="text-center">{{ $a->category }}</h1>			
@endforeach
@endif

<div class="n">
	<div class="row p-0 m-0">
		<div class="col-md-2">
			<form action=" " method="">
				<input type="checkbox" name="foxwell" id="foxwell" value="foxwell">
				<label>Foxwell</label>
				<input type="checkbox" name="foxwell" id="foxwell" value="foxwell">
				<label>Foxwell</label>
				<input type="checkbox" name="foxwell" id="foxwell" value="foxwell">
				<label>Foxwell</label>
				<input type="checkbox" name="foxwell" id="foxwell" value="foxwell">
				<label>Foxwell</label>
				<input type="checkbox" name="foxwell" id="foxwell" value="foxwell">
				<label>Foxwell</label>
				<input type="checkbox" name="foxwell" id="foxwell" value="foxwell">
				<label>Foxwell</label>
				<input type="checkbox" name="foxwell" id="foxwell" value="foxwell">
				<label>Foxwell</label>
				<input type="checkbox" name="foxwell" id="foxwell" value="foxwell">
				<label>Foxwell</label>
			</form>
		</div>
		<div class="col-md-10">

			@foreach($product as $a)
			{{ $a->name }}

			@endforeach
			
			{{ $auto->links() }}
		</div>
	</div>
</div>


@endsection
