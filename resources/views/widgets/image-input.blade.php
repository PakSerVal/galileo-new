<?php
	/**
	 * Инпут для изображений.
	 *
	 * @var bool   $isNeedSelectBtn
	 * @var string $previewSrc
	 *
	 * @author Pak Sergey
	 */

	$isNeedSelectBtn = $isNeedSelectBtn ?? true;
	$previewSrc      = $previewSrc ?? '';
?>

<div class="image-selector" style="max-width: 500px; border:  1px solid grey; padding: 20px; margin: 10px 0">
	<h4 class="text-center">Изображение</h4>

	<input type="hidden" name="image_id" class="form-control" data-role="image-id-input">

	@if($isNeedSelectBtn)
		<button type="button" class="btn btn-primary" data-role="select-image" data-url="{{ route('images-get') }}">
			Выбрать изображение
		</button>
	@endif

	<button type="button" class="btn btn-primary" data-role="image-upload-button">
		Загрузить изображение
	</button>
	<input id="image-upload-input" name="image" style="visibility:hidden;" type="file" data-upload-url="{{route('image-upload')}}">

	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

	<img src="{{ $previewSrc }}" class="image-preview <?= ('' === $previewSrc ? 'd-none' : '')?>" alt="preview" />
</div>
