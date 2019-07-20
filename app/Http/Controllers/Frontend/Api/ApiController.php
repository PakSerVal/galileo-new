<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 * Апаи контроллер.
 *
 * @author Pak Sergey
 */
class ApiController extends Controller {

	/**
	 * Отправка ответа в JSON'е.
	 *
	 * @param array $data
	 * @param int   $statusCode
	 * @param array $headers
	 *
	 * @return JsonResponse
	 */
	protected function respond($data, $statusCode = 200, $headers = []): JsonResponse {
		return response()->json($data, $statusCode, $headers);
	}
}
