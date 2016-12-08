@extends('layouts.app')
@section('content')
	@if(Auth::user()->id === 1)

	<div class="admin-user-block">
		
		@include('admin.menu')
		<?php $count = 1; ?>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<table class="table table-bordered table-striped table-hover">
				<thead style="font-weight:bold; background: #795548;color:#fff;">
					<tr>
						<td>#</td>
						<td>Имя</td>
						<td>Е-mail</td>
						<td>Баланс</td>
						<td>Дата регистрации</td>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{$count++}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td style="text-align: center;">{{$user->users_balans}}</td>
							<td>{{$user->created_at}}</td>
						</tr>
					@endforeach				
				</tbody>
			</table>			
		</div>
	</div>

	@else
		<script type="text/javascript">
			window.location = "{{ url('/') }}";
		</script>
	@endif
@endsection('content')



