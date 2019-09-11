<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Dto\ArticleDTO;
use App\Models\Article;

class ArticleRepository {

	/**
	 * @return ArticleDTO[]
	 */
	public function getAll(): array {
		$result = [];
		$dbArticles = Article::all();

		foreach ($dbArticles as $dbArticle) {
			$article              = new ArticleDTO();
			$article->id          = $dbArticle->id;
			$article->title       = $dbArticle->title;
			$article->content     = $dbArticle->content;
			$article->isPublished = $dbArticle->is_published;
			$article->updatedAt   = $dbArticle->updated_at;
			$article->createdAt   = $dbArticle->created_at;

			$result[] = $article;
		}

		return $result;
	}

	/**
	 * @return ArticleDTO[]
	 */
	public function getLatest(): array {
		$result = [];
		$dbArticles = Article
			::where(Article::ATTR_IS_PUBLISHED, true)
			->orderBy(Article::ATTR_PRIORITY, 'desc')
			->orderBy(Article::ATTR_CREATED_AT, 'desc')
			->get()
		; /** @var Article[] $dbArticles */

		foreach ($dbArticles as $dbArticle) {
			$article              = new ArticleDTO();
			$article->id          = $dbArticle->id;
			$article->title       = $dbArticle->title;
			$article->content     = $dbArticle->content;
			$article->isPublished = $dbArticle->is_published;
			$article->thumbImage  = $dbArticle->thumbImage()->getUrl();
			$article->previewText = $dbArticle->preview_text;
			$article->priority    = $dbArticle->priority;
			$article->updatedAt   = $dbArticle->updated_at;
			$article->createdAt   = $dbArticle->created_at;

			$result[] = $article;
		}

		return $result;
	}

	/**
	 * Get one article by id
	 *
	 * @param int $id
	 *
	 * @return ArticleDTO|null
	 */
	public function getOne(int $id): ?ArticleDTO {
		$source = Article::where(Article::ATTR_ID, $id)
			->where(Article::ATTR_IS_PUBLISHED, true)
			->first()
		; /** @var Article $source */

		if (null === $source) {
			return null;
		}

		$article              = new ArticleDTO();
		$article->id          = $source->id;
		$article->title       = $source->title;
		$article->content     = $source->content;
		$article->isPublished = $source->is_published;
		$article->thumbImage  = $source->thumbImage()->getUrl();
		$article->previewText = $source->preview_text;
		$article->priority    = $source->priority;
		$article->updatedAt   = $source->updated_at;
		$article->createdAt   = $source->created_at;

		return $article;
	}
}
