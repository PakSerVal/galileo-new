<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Api\Responses;

/**
 * Конвертер сырых данных в данные ответа сервера.
 *
 * @author Pak Sergey
 */
class ApiResponseConverter {

	/**
	 * Конвертирование.
	 *
	 * @param mixed  $data
	 * @param string $responseClass
	 *
	 * @return array
	 *
	 * @author Pak Sergey
	 */
	public function convert($data, $responseClass): array {
		$response = new $responseClass(); /** @var ApiResponse $response */

		return $response->convert($data);
	}
}
