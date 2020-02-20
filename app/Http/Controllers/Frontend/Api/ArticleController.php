<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Http\Controllers\Frontend\Api\Responses\ApiResponseConverter;
use App\Http\Controllers\Frontend\Api\Responses\Article\GetArticleResponse;
use App\Http\Controllers\Frontend\Api\Responses\Article\GetArticlesResponse;
use App\Repositories\ArticleRepository;
use Illuminate\Http\JsonResponse;

class ArticleController extends ApiController {
	const ACTION_GET_LATEST_ARTICLES = 'getLatestArticles';
	const ACTION_GET_TOP_ARTICLES    = 'getTopArticles';
	const ACTION_GET_ARTICLE         = 'getArticle';

	/** @var ArticleRepository */
	private $articles;

	/** @var ApiResponseConverter */
	private $converter;

	/**
	 * @param ArticleRepository    $articles
	 * @param ApiResponseConverter $responseConverter
	 */
	public function __construct(ArticleRepository $articles, ApiResponseConverter $responseConverter) {
		$this->articles  = $articles;
		$this->converter = $responseConverter;
	}

	/**
	 * Get latest articles action.
	 */
	public function getLatestArticles() {
		$articles = $this->articles->getLatest();
		$response = $this->converter->convert($articles, GetArticlesResponse::class);

		return $this->respond($response);
	}

	/**
	 * Get top articles action.
	 */
	public function getTopArticles() {
		$articles = $this->articles->getTop();
		$response = $this->converter->convert($articles, GetArticlesResponse::class);

		return $this->respond($response);
	}

	/**
	 * Get specific article
	 *
	 * @param int $id
	 *
	 * @return JsonResponse
	 */
	public function getArticle(int $id) {
		$response = $this->converter->convert($this->articles->getOne($id), GetArticleResponse::class);

		return $this->respond($response);
	}
}
