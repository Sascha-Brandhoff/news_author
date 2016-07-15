<?php

ClassLoader::addNamespaces(array
(
	'Contao'
));

ClassLoader::addClasses(array
(
	'Contao\NewsAuthor'       => 'system/modules/news_author/classes/NewsAuthor.php',
	'Contao\ModuleNewsAuthor' => 'system/modules/news_author/modules/ModuleNewsAuthor.php'
));

TemplateLoader::addFiles(array
(
	'mod_newsauthor'      => 'system/modules/news_author/templates/modules',
	'news_teaser_author'  => 'system/modules/news_author/templates/news'
));