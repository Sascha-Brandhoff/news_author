<?php

$GLOBALS['TL_DCA']['tl_user']['fields']['userSRC'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user']['singleSRC'],
	'exclude'                 => true,
	'inputType'               => 'fileTree',
	'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio', 'mandatory'=>true, 'tl_class'=>'clr'),
	'sql'                     => "binary(16) NULL"
);

$GLOBALS['TL_DCA']['tl_user']['fields']['addImage'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user']['addImage'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_user']['fields']['text'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user']['text'],
	'exclude'                 => true,
	'inputType'               => 'textarea',
	'eval'                    => array(),
	'sql'                     => "mediumtext NULL"
);

foreach($GLOBALS['TL_DCA']['tl_user']['palettes'] as $k=>$v) {
	if(!is_array($GLOBALS['TL_DCA']['tl_user']['palettes'][$k])) {
		$GLOBALS['TL_DCA']['tl_user']['palettes'][$k] .= ';{author_legend},addImage,text';
	}
}

$GLOBALS['TL_DCA']['tl_user']['palettes']['__selector__'][] = 'addImage';
$GLOBALS['TL_DCA']['tl_user']['subpalettes']['addImage'] = 'userSRC';