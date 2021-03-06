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
 * View helper for rendering script
 *
 * = Examples =
 */
class Tx_CalendarDisplay_ViewHelpers_Check_PermissionViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * Inject JS file in the header code.
	 *
	 * @param Tx_CalendarDisplay_Domain_Model_FeUser $user
	 * @param Tx_CalendarDisplay_Domain_Model_Event $event
	 * @return boolean
	 */
	public function render($user, $event) {
		$result = FALSE;
		if ($user->getTxCalendardisplayAdmin() ||
			$event->getPurchaser()->getUid() == $user->getUid()
		) {
			$result = TRUE;

		}

		return $result;
	}
}