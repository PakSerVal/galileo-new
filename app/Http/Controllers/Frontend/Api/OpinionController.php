<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Dto\OpinionDTO;
use App\Http\Controllers\Frontend\Api\Requests\SaveOpinionRequest;
use App\Http\Controllers\Frontend\Api\Responses\ApiResponseConverter;
use App\Http\Controllers\Frontend\Api\Responses\Opinion\GetOpinionsResponse;
use App\Repositories\OpinionRepository;
use Illuminate\Http\JsonResponse;

/**
 * Контроллер отзывов.
 *
 * @author Pak Sergey
 */
class OpinionController extends ApiController {
	const ACTION_GET_OPINIONS = 'getOpinions';
	const ACTION_SAVE_OPINION = 'saveOpinion';

	/** @var OpinionRepository Репозиторий отзывов */
	private $opinions;

	/** @var ApiResponseConverter Преобразователь ответа сервера */
	private $converter;

	/**
	 * @param OpinionRepository    $opinions
	 * @param ApiResponseConverter $responseConverter
	 *
	 * @author Pak Sergey
	 */
	public function __construct(OpinionRepository $opinions, ApiResponseConverter $responseConverter) {
		$this->opinions  = $opinions;
		$this->converter = $responseConverter;
	}

	/**
	 * Получение курсов.
	 *
	 * @return JsonResponse
	 *
	 * @author Pak Sergey
	 */
	public function getOpinions() {
		$opinions = $this->opinions->getPublished();
		$response = $this->converter->convert($opinions, GetOpinionsResponse::class);

		return $this->respond($response);
	}

	/**
	 * Сохранение отзыва.
	 *
	 * @param SaveOpinionRequest $request
	 *
	 * @author Pak Sergey
	 */
	public function saveOpinion(SaveOpinionRequest $request) {
		$opinion              = new OpinionDTO();
		$opinion->text        = $request->content;
		$opinion->appeal      = $request->name;
		$opinion->isPublished = false;

		$this->opinions->save($opinion);
	}
}
