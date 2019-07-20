<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Dto\CourseDTO;
use App\Dto\OpinionDTO;
use App\Models\Course;
use App\Models\Opinion;

/**
 * Репозиторий отзывов.
 *
 * @author Pak Sergey
 */
class OpinionRepository {

	/**
	 * Получение всех отзывов.
	 *
	 * @return OpinionDTO[]
	 *
	 * @author Pak Sergey
	 */
	public function getAll(): array {
		$result = [];

		$dbOpinions = Opinion::getQuery()->orderBy(Opinion::ATTR_CREATED_AT, 'desc')->get();
		foreach ($dbOpinions as $dbOpinion) {
			$opinion              = new OpinionDTO();
			$opinion->id          = $dbOpinion->id;
			$opinion->appeal      = $dbOpinion->appeal;
			$opinion->text        = $dbOpinion->text;
			$opinion->createdAt   = $dbOpinion->created_at;
			$opinion->updatedAt   = $dbOpinion->updated_at;
			$opinion->isPublished = $dbOpinion->is_published;

			$result[] = $opinion;
		}

		return $result;
	}

	/**
	 * Получение всех опубликованных отзывов.
	 *
	 * @return OpinionDTO[]
	 *
	 * @author Pak Sergey
	 */
	public function getPublished(): array {
		$result = [];

		$dbOpinions = Opinion::where([
			Opinion::ATTR_IS_PUBLISHED => true,
		])->get()->all();
		foreach ($dbOpinions as $dbOpinion) { /** @var Opinion $dbOpinion */
			$opinion              = new OpinionDTO();
			$opinion->id          = $dbOpinion->id;
			$opinion->appeal      = $dbOpinion->appeal;
			$opinion->text        = $dbOpinion->text;
			$opinion->createdAt   = $dbOpinion->created_at;
			$opinion->updatedAt   = $dbOpinion->updated_at;
			$opinion->isPublished = $dbOpinion->is_published;

			$result[] = $opinion;
		}

		return $result;
	}
}
