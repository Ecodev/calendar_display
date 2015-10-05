<?php

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Repository for Tx_CalendarDisplay_Domain_Model_Event
 */
class Tx_CalendarDisplay_Domain_Repository_EventRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * Gets events following by $category and $keyword
	 *
	 * @param integer $category Category
	 * @param string $keyword Keyword
	 * @return array of Tx_CalendarDisplay_Domain_Model_Event
	 */
	public function filter($category = NULL, $keyword = '', $timeBegin = NULL) {
		$query = $this->createQuery();
		if ($category) {
			$constraint = $query->equals('booking.resources.category', $category);
		}

		if ($keyword) {
			$constraintKeyword = $query->logicalOr($query->like('note', '%' . $keyword . '%'), $query->like('booking.resources.name', '%' . $keyword . '%'));
			if ($constraint) {
				$constraint = $query->logicalAnd($constraint, $constraintKeyword);
			} else {
				$constraint = $constraintKeyword;
			}
		}

		if ($timeBegin) {

			$constraintTime = $query->greaterThanOrEqual('time_begin', strtotime($timeBegin));
			if ($constraint) {
				$constraint = $query->logicalAnd($constraint, $constraintTime);
			} else {
				$constraint = $constraintTime;
			}
		}

		return $query->matching($constraint)
			->setOrderings(array('time_begin' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING))
			->execute();
	}

	/**
	 * Gets all events which has start from the $timeBegin
	 *
	 * @param integer $timeBegin Unix timestamp
	 * @return array of Tx_CalendarDisplay_Domain_Model_Event
	 */
	public function findAllByTimeBegin($timeBegin) {
		$query = $this->createQuery();
		$constraint = $query->greaterThanOrEqual('time_begin', $timeBegin);

		return $query->matching($constraint)
			->setOrderings(array('time_begin' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING))
			->execute();
	}

	/**
	 * Gets all events which has start from the $timeEnd
	 *
	 * @param integer $timeEnd Unix timestamp
	 * @return array of Tx_CalendarDisplay_Domain_Model_Event
	 */
	public function findAllByTimeEnd($timeEnd) {
		$query = $this->createQuery();
		$constraint = $query->greaterThanOrEqual('time_end', $timeEnd);

		return $query->matching($constraint)
			->setOrderings(array('time_begin' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING))
			->execute();
	}

	/**
	 * Gets all events which as start from the $timeEnd
	 *
	 * @param integer $timeBegin Unix timestamp
	 * @param integer $timeEnd Unix timestamp
	 * @return array of Tx_CalendarDisplay_Domain_Model_Event
	 */
	public function findAllByTimeRange($timeBegin, $timeEnd) {

		$query = $this->createQuery();

		// there are 4 cases
		$_constraints[] = $query->logicalAnd(
			$query->greaterThanOrEqual('time_begin', $timeBegin),
			$query->lessThanOrEqual('time_end', $timeEnd)
		);

		$_constraints[] = $query->logicalAnd(
			$query->greaterThanOrEqual('time_begin', $timeBegin),
			$query->lessThanOrEqual('time_begin', $timeEnd)
		);

		$_constraints[] = $query->logicalAnd(
			$query->greaterThanOrEqual('time_end', $timeBegin),
			$query->lessThanOrEqual('time_end', $timeEnd)
		);

		$_constraints[] = $query->logicalAnd(
			$query->lessThanOrEqual('time_begin', $timeBegin),
			$query->greaterThanOrEqual('time_end', $timeEnd)
		);

		$constraints = $query->logicalOr($_constraints);

		$result = $query->matching($constraints)
			->setOrderings(array('time_begin' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING))
			->execute();

		return $result;
	}
}