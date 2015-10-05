<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

return [
	'ctrl' => [
		'title' => 'LLL:EXT:calendar_display/Resources/Private/Language/locallang_db.xml:tx_calendardisplay_domain_model_booking',
		'label' => 'event',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'delete' => 'deleted',
		'enablecolumns' => [
			'disabled' => 'hidden'
		],
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('calendar_display') . 'Resources/Public/Icons/tx_calendardisplay_domain_model_booking.gif'
	],
	'interface' => [
		'showRecordFieldList' => 'resources,number',
	],
	'types' => [
		'1' => ['showitem' => 'resources,number'],
	],
	'palettes' => [
		'1' => ['showitem' => ''],
	],
	'columns' => [
		'sys_language_uid' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => [
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => [
					['LLL:EXT:lang/locallang_general.php:LGL.allLanguages', -1],
					['LLL:EXT:lang/locallang_general.php:LGL.default_value', 0]
				],
			]
		],
		'l18n_parent' => [
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => [
				'type' => 'select',
				'items' => [
					['', 0],
				],
				'foreign_table' => 'tx_calendardisplay_domain_model_booking',
				'foreign_table_where' => 'AND tx_calendardisplay_domain_model_booking.uid=###REC_FIELD_l18n_parent### AND tx_calendardisplay_domain_model_booking.sys_language_uid IN (-1,0)',
			]
		],
		'l18n_diffsource' => [
			'config' => [
				'type' => 'passthrough',
			]
		],
		't3ver_label' => [
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => [
				'type' => 'none',
				'cols' => 27,
			]
		],
		'hidden' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => [
				'type' => 'check',
			]
		],
		'resources' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:calendar_display/Resources/Private/Language/locallang_db.xml:tx_calendardisplay_domain_model_booking.resources',
			'config' => [
				'type' => 'select',
				'foreign_table' => 'tx_calendardisplay_domain_model_resource',
				'MM' => 'tx_calendardisplay_booking_resource_mm',
				'size' => 1,
				'minitems' => 1,
				'maxitems' => 1,
				'wizards' => [
					'_PADDING' => 1,
					'_VERTICAL' => 0,
					'edit' => [
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
					],
					'add' => [
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => [
							'table' => 'tx_calendardisplay_domain_model_resource',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						],
						'script' => 'wizard_add.php',
					],
				],
			],
		],
		'number' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:calendar_display/Resources/Private/Language/locallang_db.xml:tx_calendardisplay_domain_model_booking.number',
			'config' => [
				'type' => 'input',
				'size' => 4,
				'eval' => 'int,required',
			],
		],
		'event' => [
			'config' => [
				'type' => 'passthrough',
			],
		],
	],
];