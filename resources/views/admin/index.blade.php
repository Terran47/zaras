@extends('layouts.app')
@section('content')
	@if(Auth::user()->id === 1)

	<div class="admin-index-block">
		@include('admin.menu')

		<img src="./media/logo.png" alt="" style="display: table; margin:20px auto">
	</div>

	@else
		<script type="text/javascript">
			window.location = "{{ url('/') }}";
		</script>
	@endif
@endsection('content')