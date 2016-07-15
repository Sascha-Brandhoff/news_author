<?php

array_insert($GLOBALS['FE_MOD']['news'], 0, array
(
	'newsauthor'  => 'ModuleNewsAuthor'
));

$GLOBALS['TL_HOOKS']['parseArticles'][] = array('Contao\NewsAuthor', 'myParseArticles');