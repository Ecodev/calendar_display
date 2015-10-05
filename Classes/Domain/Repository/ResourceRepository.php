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
 * Repository for Tx_CalendarDisplay_Domain_Model_Resource
 */
class Tx_CalendarDisplay_Domain_Repository_ResourceRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * Gets resoureces following by $category and $$keyword
	 *
	 * @param integer $category Category
	 * @param string $keyword Keyword
	 * @return array of Tx_CalendarDisplay_Domain_Model_Resource
	 */
	public function filterResources($category = NULL, $keyword = '') {
		$query = $this->createQuery();
		$constraint = NULL;
		if ($category) {
			$constraint = $query->equals('category', $category);
		}

		if ($keyword) {
			$constraintKeyword = $query->logicalOr($query->like('name', '%' . $keyword . '%'), $query->like('category.name', '%' . $keyword . '%'));
			if ($constraint) {
				$constraint = $query->logicalAnd($constraint, $constraintKeyword);
			} else {
				$constraint = $constraintKeyword;
			}
		}

		$result = $query->matching($constraint)
			->setOrderings(array('name' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING))
			->execute();
		return $result;
	}

	/**
	 * Gets resoureces following by $category and $$keyword
	 *
	 * @param array of Tx_CalendarDisplay_Domain_Model_Events
	 * @param integer $category Category
	 * @param string $keyword Keyword
	 * @return array of Tx_CalendarDisplay_Domain_Model_Resource
	 */
	public function findAvailable($events, $category = NULL, $keyword = '') {

		$query = $this->createQuery();
		$constraint = NULL;
		if ($category) {
			$constraint = $query->equals('category', $category);
		}

		if ($keyword) {
			$constraintKeyword = $query->logicalOr($query->like('name', '%' . $keyword . '%'), $query->like('category.name', '%' . $keyword . '%'));
			if ($constraint) {
				$constraint = $query->logicalAnd($constraint, $constraintKeyword);
			} else {
				$constraint = $constraintKeyword;
			}
		}

		$resources = $query->matching($constraint)
			->setOrderings(array('name' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING))
			->execute();

		// finishes resources initialisation
		// some values must be computed
		foreach ($resources as $resource) {
			$resource->setAvailableNumber($resource->getNumber());
			$resource->setBookedResourcesNumber(0);
		}

		foreach ($events as $event) {
			$bookings = $event->getBooking();
			foreach ($bookings as $booking) {
				$_resource = $booking->getResources()->current();

				// search for the corresponding resource...
				foreach ($resources as $resource) {
					if ($resource->getUid() == $_resource->getUid()) {
						// ... and update the value
						$resource->setAvailableNumber($resource->getAvailableNumber() - $booking->getNumber());
						$resource->setBookedResourcesNumber($resource->getBookedResourcesNumber() + $booking->getNumber());
					}
				}
			}
		}
		return $resources;
	}

}
