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
 * Validator for Tx_CalendarDisplay_Domain_Model_Event
 */
class Tx_CalendarDisplay_Domain_Validator_EventValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator {

	/**
	 * If the given event is valid
	 *
	 * @param Tx_CalendarDisplay_Domain_Model_Event $event
	 * @return boolean true
	 */
	public function isValid($event) {
		$isValid = TRUE;
		if ($event->getTimeBegin() == NULL || $event->getTimeBegin() == '') {
			$this->addError(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('tx_calendardisplay_domain_model_event.time_begin.required', 'CalendarDisplay'), 2);
			$isValid = FALSE;
		}
		if ($event->getTimeEnd() == NULL || $event->getTimeEnd() == '') {
			$this->addError(Tx_Extbase_Utility_Localization::translate('tx_calendardisplay_domain_model_event.time_end.required', 'CalendarDisplay'), 2);
			$isValid = FALSE;
		}
		return $isValid;
	}

}