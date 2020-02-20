<?php
use App\Dto\ArticleDTO;

/**
 * @var ArticleDTO[] $articles
 */
?>
@extends('layouts.ckeditor')

@section('content')
	<a href="<?= route('create-article-form') ?>" type="button" class="btn btn-primary">Создать</a>
	<table class="table table-dark">
		<thead>
		<tr>
			<th scope="col">id</th>
			<th scope="col">Заголовок</th>
			<th scope="col">Опубликован или нет</th>
		</tr>
		</thead>
		<tbody>
		@foreach($articles as $article)
			<tr>
				<th scope="row">{{ $article->id }}</th>
				<td>{{ $article->title }}</td>
				<td>{{ $article->isPublished ? 'Опубликована' : 'Не опубликована' }}</td>
				<td>
					<a href="{{ route('edit-article-form', ['id' => $article->id]) }}" type="button" class="btn btn-warning">Редактировать</a>
					<form id="{{ $article->id }}" class="delete" action="{{ route('delete-article', ['id' => $article->id]) }}" method="GET">
						{{ csrf_field() }}
						<button type="submit" class="btn btn-danger">Удалить</button>
					</form>
					<script>
						$("#{{ $article->id }}").on("submit", function(){
							return confirm("Удалить статью?");
						});
					</script>
				</td>
			</tr
					@endforeach>
		</tbody>
	</table>
@endsection
