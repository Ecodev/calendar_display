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
class Tx_CalendarDisplay_ViewHelpers_Display_BookedResourcesViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * Define whether a resource should be displayed.
	 *
	 * @param Tx_CalendarDisplay_Domain_Model_Event $event
	 * @param Tx_CalendarDisplay_Domain_Model_Resource $resource
	 * @return boolean
	 */
	public function render($event, $resource) {
		$result = '0';

		if ($event) {
			$bookings = $event->getBooking();
			foreach ($bookings as $booking) {
				$_resource = $booking->getResources()->current();

				if ($_resource->getUid() == $resource->getUid()) {
					$result = $booking->getNumber();
					break;
				}
			}
		}
		return $result;
	}
}