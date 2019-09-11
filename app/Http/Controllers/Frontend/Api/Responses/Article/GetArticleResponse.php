<?php

namespace App\Http\Controllers\Frontend\Api\Responses\Article;

use App\Dto\ArticleDTO;
use App\Http\Controllers\Frontend\Api\Responses\ApiResponse;
use App\Models\Article;

class GetArticleResponse implements ApiResponse {

	/**
	 * @inheritDoc
	 *
	 * @param ArticleDTO $article
	 */
	public function convert($article): array {
		$result = [
			Article::ATTR_TITLE   => $article->title,
			Article::ATTR_CONTENT => $article->content,
		];

		return $result;
	}
}
