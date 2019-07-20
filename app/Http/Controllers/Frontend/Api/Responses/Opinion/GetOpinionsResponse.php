<?php

namespace App\Http\Controllers\Frontend\Api\Responses\Opinion;

use App\Dto\OpinionDTO;
use App\Http\Controllers\Frontend\Api\Responses\ApiResponse;
use App\Models\Opinion;

/**
 * Данные отзывов в ответе сервера.
 *
 * @author Pak Sergey
 */
class GetOpinionsResponse implements ApiResponse {

	/**
	 * @inheritDoc
	 *
	 * @param OpinionDTO[] $opinions
	 *
	 * @author Pak Sergey
	 */
	public function convert($opinions): array {
		$result = [];
		foreach ($opinions as $opinion) {
			$result[] = [
				Opinion::ATTR_ID     => $opinion->id,
				Opinion::ATTR_APPEAL => $opinion->appeal,
				Opinion::ATTR_TEXT   => $opinion->text,
			];
		}

		return $result;
	}
}
