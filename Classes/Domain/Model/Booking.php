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
 * Booking
 */
class Tx_CalendarDisplay_Domain_Model_Booking extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * resources
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_CalendarDisplay_Domain_Model_Resource> $resources
	 */
	protected $resources;

	/**
	 * number
	 *
	 * @var integer $number
	 * @validate NotEmpty
	 */
	protected $number;

	/**
	 * The constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the kickstarter
		 * You may modify the constructor of this class instead
		 */
		$this->resources = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Setter for resources
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage <Tx_CalendarDisplay_Domain_Model_Resource> $resources resources
	 * @return void
	 */
	public function setResources(Tx_Extbase_Persistence_ObjectStorage $resources) {
		$this->resources = $resources;
	}

	/**
	 * Getter for resources
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_CalendarDisplay_Domain_Model_Resource> resources
	 */
	public function getResources() {
		return $this->resources;
	}

	/**
	 * Setter for number
	 *
	 * @param integer $number number
	 * @return void
	 */
	public function setNumber($number) {
		$this->number = $number;
	}

	/**
	 * Getter for number
	 *
	 * @return integer number
	 */
	public function getNumber() {
		return $this->number;
	}

	/**
	 * Adds a Resource
	 *
	 * @param Tx_CalendarDisplay_Domain_Model_Resource the Resource to be added
	 * @return void
	 */
	public function addResource(Tx_CalendarDisplay_Domain_Model_Resource $resource) {
		$this->resources->attach($resource);
	}

	/**
	 * Removes a Resource
	 *
	 * @param Tx_CalendarDisplay_Domain_Model_Resource the Resource to be removed
	 * @return void
	 */
	public function removeResource(Tx_CalendarDisplay_Domain_Model_Resource $resourceToRemove) {
		$this->resources->detach($resourceToRemove);
	}
}

?>