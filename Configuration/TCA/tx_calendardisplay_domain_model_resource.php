<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

return [
	'ctrl' => [
		'title' => 'LLL:EXT:calendar_display/Resources/Private/Language/locallang_db.xml:tx_calendardisplay_domain_model_resource',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l18n_parent',
		'transOrigDiffSourceField' => 'l18n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => [
			'disabled' => 'hidden'
		],
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('calendar_display') . 'Resources/Public/Icons/tx_calendardisplay_domain_model_resource.gif'
	],
	'interface' => [
		'showRecordFieldList' => 'name,number,image,category',
	],
	'types' => [
		'1' => ['showitem' => 'name,number,image,category'],
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
				'foreign_table' => 'tx_calendardisplay_domain_model_resource',
				'foreign_table_where' => 'AND tx_calendardisplay_domain_model_resource.uid=###REC_FIELD_l18n_parent### AND tx_calendardisplay_domain_model_resource.sys_language_uid IN (-1,0)',
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
		'name' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:calendar_display/Resources/Private/Language/locallang_db.xml:tx_calendardisplay_domain_model_resource.name',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			],
		],
		'number' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:calendar_display/Resources/Private/Language/locallang_db.xml:tx_calendardisplay_domain_model_resource.number',
			'config' => [
				'type' => 'input',
				'size' => 4,
				'eval' => 'int,required'
			],
		],
		'image' => [
			'exclude' => 1,
			'label' => 'LLL:EXT:calendar_display/Resources/Private/Language/locallang_db.xml:tx_calendardisplay_domain_model_resource.image',
			'config' => [
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_calendardisplay',
				'show_thumbs' => 1,
				'size' => 5,
				'allowed' => 'gif,jpg,jpeg,png',
				'disallowed' => '',
			],
		],
		'category' => [
			'exclude' => 0,
			'label' => 'LLL:EXT:calendar_display/Resources/Private/Language/locallang_db.xml:tx_calendardisplay_domain_model_resource.category',
			'config' => [
				'type' => 'select',
				'foreign_table' => 'tx_calendardisplay_domain_model_resourcecategory',
				'minitems' => 0,
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
							'table' => 'tx_tttt_domain_model_resourcecategory',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						],
						'script' => 'wizard_add.php',
					],
				],
			],
		],
	],
];
?>