<?php

namespace App\Http\Controllers\Frontend\Api\Responses\Photo;

use App\Dto\PhotoDTO;
use App\Http\Controllers\Frontend\Api\Responses\ApiResponse;

/**
 * Данные фото в ответе сервера.
 *
 * @author Pak Sergey
 */
class GetPhotoResponse implements ApiResponse {

	/**
	 * @inheritDoc
	 *
	 * @param PhotoDTO[] $photo
	 *
	 * @author Pak Sergey
	 */
	public function convert($photo): array {
		$result = [];
		foreach ($photo as $photoItem) {
			$result[] = $photoItem->image_path;
		}

		return $result;
	}
}
