<?php

	use App\Dto\OpinionDTO;
	use App\Http\Controllers\Backend\OpinionController;

/**
	 * @var OpinionDTO[] $opinions Отзывы
	 *
	 * @author Pak Sergey
	 */
?>
@extends('layouts.backend')

@section('content')
	<a href="<?= action(OpinionController::getActionUrl(OpinionController::ACTION_SHOW_CREATE_FORM)) ?>" type="button" class="btn btn-primary">Создать</a>
	<table class="table table-dark">
		<thead>
		<tr>
			<th scope="col">id</th>
			<th scope="col">Текст</th>
			<th scope="col">Автор</th>
			<th scope="col">Опубликован или нет</th>
			<th scope="col">Дествия</th>
		</tr>
		</thead>
		<tbody>
		@foreach($opinions as $opinion)
			<tr>
				<th scope="row">{{ $opinion->id }}</th>
				<td>{{ $opinion->text }}</td>
				<td>{{ $opinion->appeal }}</td>
				<td>{{ $opinion->isPublished ? 'Опубликован' : 'Не опубликован' }}</td>
				<td>
					<a href="{{ route('edit-opinion', ['id' => $opinion->id]) }}" type="button" class="btn btn-warning">Редактировать</a>
					<form id="{{$opinion->id}}" class="delete" action="{{ route('delete-opinion', ['id' => $opinion->id]) }}" method="GET">
						{{ csrf_field() }}
						<button type="submit" class="btn btn-danger">Удалить</button>
					</form>
					<script>
						$("#{{$opinion->id}}").on("submit", function(){
							return confirm("Удалить отзыв?");
						});
					</script>
				</td>
			</tr
		@endforeach>
		</tbody>
	</table>
@endsection
