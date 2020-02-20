@extends('layouts.backend')

@section('content')
	<a href="{{ route('backend-articles-list') }}" class="list-group-item list-group-item-action">Статьи</a>
	<a href="{{ route('opinions-list') }}" class="list-group-item list-group-item-action">Отзывы</a>
	<a href="{{ route('photos-list') }}" class="list-group-item list-group-item-action">Фото</a>
	<a href="{{ route('enrollments-list') }}" class="list-group-item list-group-item-action">Записи на курс</a>
@endsection

