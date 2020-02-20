<?php

namespace App\Http\Controllers\Frontend\Api\Responses\Article;

use App\Dto\ArticleDTO;
use App\Http\Controllers\Frontend\Api\Responses\ApiResponse;
use App\Models\Article;

class GetArticlesResponse implements ApiResponse {

	/**
	 * @inheritDoc
	 *
	 * @param ArticleDTO[] $articles
	 */
	public function convert($articles): array {
		$result = [];
		foreach ($articles as $article) {
			$articlePreview = $article->previewText;

			if (strlen($articlePreview) > 130) {
				$articlePreview = wordwrap($articlePreview, 130);
				$articlePreview = mb_substr($articlePreview, 0, strpos($articlePreview, "\n"));
				$articlePreview .= '...';
			}

			$result[] = [
				Article::ATTR_ID           => $article->id,
				Article::ATTR_TITLE        => $article->title,
				Article::ATTR_PREVIEW_TEXT => $articlePreview,
				'image'                    => $article->thumbImage,
			];
		}

		return $result;
	}
}
