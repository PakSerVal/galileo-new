<?php

	use App\Dto\EnrollmentDTO;

	/**
	 * @var EnrollmentDTO[] $enrollments Отзывы
	 *
	 * @author Pak Sergey
	 */
?>
@extends('layouts.backend')

@section('content')
	<table class="table table-dark">
		<thead>
		<tr>
			<th scope="col">id</th>
			<th scope="col">Имя</th>
			<th scope="col">Телефон</th>
			<th scope="col">Действия</th>
		</tr>
		</thead>
		<tbody>
		@foreach($enrollments as $enrollment)
			<tr>
				<th scope="row">{{ $enrollment->id }}</th>
				<td>{{ $enrollment->name}}</td>
				<td>{{ $enrollment->phone }}</td>
				<td>
					<form id="{{$enrollment->id}}" class="delete" action="{{ route('delete-enrollment', ['id' => $enrollment->id]) }}" method="GET">
						{{ csrf_field() }}
						<button type="submit" class="btn btn-danger">Удалить</button>
					</form>
					<script>
						$("#{{$enrollment->id}}").on("submit", function(){
							return confirm("Удалить запись?");
						});
					</script>
				</td>
			</tr
		@endforeach>
		</tbody>
	</table>
@endsection
