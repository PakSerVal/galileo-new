<?php

namespace App\Http\Controllers\Frontend\Api\Responses;

/**
 * Интерфейс модели ответа сервера.
 *
 * @author Pak Sergey
 */
interface ApiResponse {
	/**
	 * @param object $data
	 *
	 * @return mixed
	 */
	public function convert($data): array;
}
