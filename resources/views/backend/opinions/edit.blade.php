<?php

	use App\Models\Opinion;

/**
	 * Редактирование отзва
	 *
	 * @var Opinion $opinion Отзыв
	 *
	 * @author Pak Sergey
	 */
?>
@extends('layouts.backend')

@section('content')
	{{ Form::model($opinion, ['url' => route('update-opinion')]) }}
	{{ Form::hidden($opinion::ATTR_ID, $opinion->id) }}

	{{ Form::label($opinion::ATTR_TEXT, 'Текст') }}
	{{ Form::textarea($opinion::ATTR_TEXT) }}

	{{ Form::label($opinion::ATTR_APPEAL, 'Автор') }}
	{{ Form::text($opinion::ATTR_APPEAL) }}

	{{ Form::label($opinion::ATTR_IS_PUBLISHED, 'Опубликован') }}
	{{ Form::checkbox($opinion::ATTR_IS_PUBLISHED) }}

	{{ Form::submit('Сохранить') }}
	{{ Form::close() }}
@endsection
