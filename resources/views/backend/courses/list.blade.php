<?php
	use App\Dto\CourseDTO;
	use App\Http\Controllers\Backend\CourseController;

	/**
	 * @var CourseDTO[] $courses
	 */
?>
@extends('layouts.backend')

@section('content')
	<a href="<?= action(CourseController::getActionUrl(CourseController::ACTION_SHOW_CREATE_FORM)) ?>" type="button" class="btn btn-primary">Создать</a>
	<table class="table table-dark">
		<thead>
		<tr>
			<th scope="col">id</th>
			<th scope="col">Название</th>
			<th scope="col">Описание</th>
			<th scope="col">Шаблон</th>
			<th scope="col">Избражение</th>
			<th scope="col">Дествия</th>
		</tr>
		</thead>
		<tbody>
		@foreach($courses as $course)
			<tr>
				<th scope="row">{{ $course->id }}</th>
				<td>{{ $course->title }}</td>
				<td>{{ $course->description }}</td>
				<td>{{ $course->viewPath }}</td>
				<td><img src="{{ $course->imagePath }}" alt="curse img"></td>
				<td>
					<a href="{{ route('edit-course', ['id' => $course->id]) }}" type="button" class="btn btn-warning">Редактировать</a>
					<form id="{{ $course->id }}" class="delete" action="{{ route('delete-course', ['id' => $course->id]) }}" method="GET">
						{{ csrf_field() }}
						<button type="submit" class="btn btn-danger">Удалить</button>
					</form>
					<script>
						$("#{{ $course->id }}").on("submit", function(){
							return confirm("Удалить курс?");
						});
					</script>
				</td>
			</tr
		@endforeach>
		</tbody>
	</table>
@endsection
