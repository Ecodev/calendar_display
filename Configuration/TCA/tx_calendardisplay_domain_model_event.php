<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

return [
	'ctrl' => [
		'title' => 'LLL:EXT:calendar_display/Resources/Private/Language/locallang_db.xml:tx_calendardisplay_domain_model_event',
		'label' => 'time_begin',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'delete' => 'deleted',
		'enablecolumns' => [
			'disabled' => 'hidden'
		],
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('calendar_display') . 'Resources/Public/Icons/tx_calendardisplay_domain_model_event.gif'
	],
	'interface' => [
		'showRecordFieldList' => 'time_begin,time_end,note,purchaser,booking',
	],
	'types' => [
		'1' => ['showitem' => 'time_begin,time_end,note,purchaser,booking'],
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
				'foreign_table' => 'tx_calendardisplay_domain_model_event',
				'foreign_table_where' => 'AND tx_calendardisplay_domain_model_event.uid=###REC_FIELD_l18n_parent### AND tx_calendardisplay_domain_model_event.sys_language_uid IN (-1,0)',
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
		'time_begin' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:calendar_display/Resources/Private/Language/locallang_db.xml:tx_calendardisplay_domain_model_event.time_begin',
			'config' => [
				'type' => 'input',
				'size' => 10,
				'max' => 20,
				'eval' => 'datetime,required',
				'checkbox' => 0,
				'default' => 0
			],
		],
		'time_end' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:calendar_display/Resources/Private/Language/locallang_db.xml:tx_calendardisplay_domain_model_event.time_end',
			'config' => [
				'type' => 'input',
				'size' => 10,
				'max' => 20,
				'eval' => 'datetime,required',
				'checkbox' => 0,
				'default' => 0
			],
		],
		'note' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:calendar_display/Resources/Private/Language/locallang_db.xml:tx_calendardisplay_domain_model_event.note',
			'config' => [
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			],
		],
		'purchaser' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:calendar_display/Resources/Private/Language/locallang_db.xml:tx_calendardisplay_domain_model_event.purchaser',
			'config' => [
				'type' => 'select',
				'foreign_table' => 'fe_users',
				'foreign_table_where' => 'AND fe_users.deleted=0 ORDER BY fe_users.username ASC',
				'size' => 1,
				'minitems' => 1,
				'maxitems' => 1,
			]
		],
		'booking' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:calendar_display/Resources/Private/Language/locallang_db.xml:tx_calendardisplay_domain_model_event.booking',
			'config' => [
				'type' => 'inline',
				'foreign_table' => 'tx_calendardisplay_domain_model_booking',
				'foreign_field' => 'event',
				'maxitems' => 9999,
				'appearance' => [
					'collapse' => 0,
					'newRecordLinkPosition' => 'bottom',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				],
			],
		],
	],
];