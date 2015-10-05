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
 * FeUser
 */
class Tx_CalendarDisplay_Domain_Model_FeUser extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	/**
	 * username
	 *
	 * @var string $username
	 */
	protected $username;

	/**
	 * email
	 *
	 * @var string $email
	 * @valivate EmailAddress
	 */
	protected $email;

	/**
	 * telephone
	 *
	 * @var string $telephone
	 */
	protected $telephone;

	/**
	 * txCalendardisplayAdmin
	 *
	 * @var integer $telephone
	 */
	protected $txCalendardisplayAdmin;

	/**
	 * setter for username
	 *
	 * @param string $username username
	 * @return void
	 */
	public function setUsername($username) {
		$this->username = $username;
	}

	/**
	 * getter for username
	 *
	 * @return string useranem
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * setter for email
	 *
	 * @param string $email email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * getter for email
	 *
	 * @return string email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * setter for telephone
	 *
	 * @param string $telephone telephone
	 * @return void
	 */
	public function setTelephone($telephone) {
		$this->telephone = $telephone;
	}

	/**
	 * getter for telephone
	 *
	 * @return string telephone
	 */
	public function getTelephone() {
		return $this->telephone;
	}

	/**
	 * setter for txCalendardisplayAdmin
	 *
	 * @param integer $txCalendardisplayAdmin txCalendardisplayAdmin
	 * @return void
	 */
	public function setTxCalendardisplayAdmin($txCalendardisplayAdmin) {
		$this->txCalendardisplayAdmin= $txCalendardisplayAdmin;
	}

	/**
	 * getter for txCalendardisplayAdmin
	 *
	 * @return integer txCalendardisplayAdmin
	 */
	public function getTxCalendardisplayAdmin() {
		return $this->txCalendardisplayAdmin;
	}
}