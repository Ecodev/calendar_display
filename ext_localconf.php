<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'Event' => 'calendar, list, new, create, edit, update, delete, filterItems, filter'
	),
	array(
		'Event' => 'calendar, list, create, edit, update, delete, categoryFilter'
	)
);

?>