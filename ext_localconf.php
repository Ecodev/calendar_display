<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'Event' => 'list, calendar ,new, create, edit, update, delete, filterResources, filter'
	),
	array(
		'Event' => 'list, calendar, new, create, edit, update, delete, categoryFilter'
	)
);
