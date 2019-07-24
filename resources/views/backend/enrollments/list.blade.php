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
		</tr>
		</thead>
		<tbody>
		@foreach($enrollments as $enrollment)
			<tr>
				<th scope="row">{{ $enrollment->id }}</th>
				<td>{{ $enrollment->name}}</td>
				<td>{{ $enrollment->phone }}</td>
			</tr
		@endforeach>
		</tbody>
	</table>
@endsection
