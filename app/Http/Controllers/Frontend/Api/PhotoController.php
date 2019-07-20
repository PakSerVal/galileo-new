<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Http\Controllers\Frontend\Api\Responses\ApiResponseConverter;
use App\Http\Controllers\Frontend\Api\Responses\Photo\GetPhotoResponse;
use App\Repositories\PhotoRepository;
use Illuminate\Http\JsonResponse;

/**
 * Контроллер фото.
 *
 * @author Pak Sergey
 */
class PhotoController extends ApiController {
	const ACTION_GET_PHOTOS = 'getPhotos';

	/** @var PhotoRepository Репозиторий фото */
	private $photo;

	/** @var ApiResponseConverter Преобразователь ответа сервера */
	private $converter;

	/**
	 * @param PhotoRepository      $photo
	 * @param ApiResponseConverter $responseConverter
	 *
	 * @author Pak Sergey
	 */
	public function __construct(PhotoRepository $photo, ApiResponseConverter $responseConverter) {
		$this->photo     = $photo;
		$this->converter = $responseConverter;
	}

	/**
	 * Получение курсов.
	 *
	 * @return JsonResponse
	 *
	 * @author Pak Sergey
	 */
	public function getPhotos() {
		$photo    = $this->photo->getAll();
		$response = $this->converter->convert($photo, GetPhotoResponse::class);

		return $this->respond($response);
	}
}
