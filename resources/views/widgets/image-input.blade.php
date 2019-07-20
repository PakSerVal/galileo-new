<?php
	/**
	 * Инпут для изображений.
	 *
	 * @var bool $isNeedSelectBtn
	 *
	 * @author Pak Sergey
	 */
	$isNeedSelectBtn = true;
?>

<div class="image-selector" style="max-width: 500px; border:  1px solid grey; padding: 20px; margin: 10px 0">
	<input type="hidden" name="image_id" class="form-control" data-role="image-id-input">

	@if($isNeedSelectBtn)
		<button type="button" class="btn btn-primary" data-role="select-image" data-url="{{ route('images-get') }}">
			Выбрать изображение
		</button>
	@endif

	<label for="image-upload-input" class="btn btn-primary">
		Загрузить изображение
	</label>
	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

	<input id="image-upload-input" name="image" style="visibility:hidden;" type="file" data-upload-url="{{route('image-upload')}}">

	<img src="" class="image-preview" alt="preview" />
</div>
