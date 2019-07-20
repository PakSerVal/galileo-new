<?php

	use App\Models\Photo;

/**
	 * Редактирование фото
	 *
	 * @var Photo $photo фото
	 *
	 * @author Pak Sergey
	 */
?>
@extends('layouts.backend')

@section('content')
	{{ Form::model($photo, ['url' => route('update-photo')]) }}
	{{ Form::hidden($photo::ATTR_ID, $photo->id) }}

	{{ Form::label($photo::ATTR_TITLE, 'Заголоаок') }}
	{{ Form::text($photo::ATTR_TITLE) }}

	@include('widgets.image-input');

	{{ Form::submit('Сохранить') }}
	{{ Form::close() }}
@endsection
