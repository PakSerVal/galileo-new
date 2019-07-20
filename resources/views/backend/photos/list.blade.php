<?php

use App\Dto\PhotoDTO;

/**
	 * @var PhotoDTO[] $photos Отзывы
	 *
	 * @author Pak Sergey
	 */
?>
@extends('layouts.backend')

@section('content')
	<a href="{{ route('create-photo-form') }}" type="button" class="btn btn-primary">Создать</a>
	<table class="table table-dark">
		<thead>
		<tr>
			<th scope="col">id</th>
			<th scope="col">Заголовок</th>
			<th scope="col">Изображение</th>
		</tr>
		</thead>
		<tbody>
		@foreach($photos as $photo)
			<tr>
				<th scope="row">{{ $photo->id }}</th>
				<td>{{ $photo->id }}</td>
				<td>{{ $photo->title }}</td>
				<td><img src="{{ $photo->image_path }}" alt="photo"></td>
				<td>
					<a href="{{ route('edit-photo', ['id' => $photo->id]) }}" type="button" class="btn btn-warning">Редактировать</a>
					<form id="{{$photo->id}}" class="delete" action="{{ route('delete-photo', ['id' => $photo->id]) }}" method="GET">
						{{ csrf_field() }}
						<button type="submit" class="btn btn-danger">Удалить</button>
					</form>
					<script>
						$("#{{$photo->id}}").on("submit", function(){
							return confirm("Удалить отзыв?");
						});
					</script>
				</td>
			</tr
		@endforeach>
		</tbody>
	</table>
@endsection
