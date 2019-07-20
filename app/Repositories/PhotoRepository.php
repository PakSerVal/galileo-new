<?php

namespace App\Repositories;

use App\Dto\PhotoDTO;
use App\Models\Photo;

/**
 * Репозиторий фото.
 *
 * @author Pak Sergey
 */
class PhotoRepository {

	/**
	 * Получение всех фото.
	 *
	 * @return PhotoDTO[]
	 *
	 * @author Pak Sergey
	 */
	public function getAll(): array {
		$result = [];

		$dbPhoto = Photo::all();
		foreach ($dbPhoto as $dbPhotoItem) {
			$photo             = new PhotoDTO();
			$photo->id         = $dbPhotoItem->id;
			$photo->title      = $dbPhotoItem->title;
			$photo->image_path = $dbPhotoItem->image->getUrl();
			$photo->createdAt  = $dbPhotoItem->created_at;
			$photo->updatedAt  = $dbPhotoItem->updated_at;

			$result[] = $photo;
		}

		return $result;
	}
}
