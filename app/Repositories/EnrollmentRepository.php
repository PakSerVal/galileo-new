<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Dto\EnrollmentDTO;
use App\Models\Enrollment;

class EnrollmentRepository {

	/**
	 * @return EnrollmentDTO[]
	 *
	 * @author Pak Sergey
	 */
	public function getAll(): array {
		$result = [];

		$dbEnrollments = Enrollment::all();

		foreach ($dbEnrollments as $dbEnrollment) {
			$enrollment        = new EnrollmentDTO();
			$enrollment->id    = $dbEnrollment->id;
			$enrollment->name  = $dbEnrollment->name;
			$enrollment->phone = $dbEnrollment->phone;

			$result[] = $enrollment;
		}

		return $result;
	}
}
