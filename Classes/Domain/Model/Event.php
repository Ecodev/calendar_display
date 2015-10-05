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
 * Event
 */
class Tx_CalendarDisplay_Domain_Model_Event extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * timeBegin
	 *
	 * @var DateTime $timeBegin
	 * @validate NotEmpty
	 */
	protected $timeBegin;

	/**
	 * timeEnd
	 *
	 * @var DateTime $timeEnd
	 * @validate NotEmpty
	 */
	protected $timeEnd;

	/**
	 * note
	 *
	 * @var string $note
	 */
	protected $note;

	/**
	 * purchaser
	 *
	 * @var Tx_CalendarDisplay_Domain_Model_FeUser $purchaser
	 */
	protected $purchaser;

	/**
	 * booking
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_CalendarDisplay_Domain_Model_Booking> $booking
	 */
	protected $booking;

	/**
	 * availableResources
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_CalendarDisplay_Domain_Model_Resource> $availableResources
	 */
	protected $availableResources;

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
		$this->booking = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Setter for timeBegin
	 *
	 * @param DateTime $timeBegin timeBegin
	 * @return void
	 */
	public function setTimeBegin($timeBegin) {
		$this->timeBegin = $timeBegin;
	}

	/**
	 * Getter for timeBegin
	 *
	 * @return DateTime timeBegin
	 */
	public function getTimeBegin() {
		return $this->timeBegin;
	}

	/**
	 * Setter for timeEnd
	 *
	 * @param DateTime $timeEnd timeEnd
	 * @return void
	 */
	public function setTimeEnd($timeEnd) {
		$this->timeEnd = $timeEnd;
	}

	/**
	 * Getter for timeEnd
	 *
	 * @return DateTime timeEnd
	 */
	public function getTimeEnd() {
		return $this->timeEnd;
	}

	/**
	 * Setter for note
	 *
	 * @param string $note note
	 * @return void
	 */
	public function setNote($note) {
		$this->note = $note;
	}

	/**
	 * Getter for note
	 *
	 * @return string note
	 */
	public function getNote() {
		return $this->note;
	}

	/**
	 * Setter for purchaser
	 *
	 * @param Tx_CalendarDisplay_Domain_Model_FeUser $purchaser purchaser
	 * @return void
	 */
	public function setPurchaser($purchaser) {
		$this->purchaser = $purchaser;
	}

	/**
	 * Getter for purchaser
	 *
	 * @return Tx_CalendarDisplay_Domain_Model_FeUser purchaser
	 */
	public function getPurchaser() {
		return $this->purchaser;
	}

	/**
	 * Setter for booking
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage <Tx_CalendarDisplay_Domain_Model_Booking> $booking booking
	 * @return void
	 */
	public function setBooking(Tx_Extbase_Persistence_ObjectStorage $booking) {
		$this->booking = $booking;
	}

	/**
	 * Getter for booking
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_CalendarDisplay_Domain_Model_Booking> booking
	 */
	public function getBooking() {
		return $this->booking;
	}

	/**
	 * Gets the boolean value of comparing the TimeBegin and TimeEnd
	 *
	 * @return boolean
	 */
	public function getCompareDayBeginDayEnd() {
		return $this->getTimeBegin()->format('Y-m-d') == $this->getTimeEnd()->format('Y-m-d');
	}

	/**
	 * Adds a Booking
	 *
	 * @param Tx_CalendarDisplay_Domain_Model_Booking the Booking to be added
	 * @return void
	 */
	public function addBooking(Tx_CalendarDisplay_Domain_Model_Booking $booking) {
		$this->booking->attach($booking);
	}

	/**
	 * Removes a Booking
	 *
	 * @param Tx_CalendarDisplay_Domain_Model_Booking the Booking to be removed
	 * @return void
	 */
	public function removeBooking(Tx_CalendarDisplay_Domain_Model_Booking $bookingToRemove) {
		$this->booking->detach($bookingToRemove);
	}
}
