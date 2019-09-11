<?php

namespace App\Http\Controllers\Frontend\Api\Responses;

/**
 * Интерфейс модели ответа сервера.
 *
 * @author Pak Sergey
 */
interface ApiResponse {
	/**
	 * @param mixed $data
	 *
	 * @return mixed
	 */
	public function convert($data): array;
}
