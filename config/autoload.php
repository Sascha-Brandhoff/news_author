<?php

ClassLoader::addNamespaces(array
(
	'Contao'
));

ClassLoader::addClasses(array
(
	'Contao\ModuleNewsAuthor' => 'system/modules/news_author/modules/ModuleNewsAuthor.php'
));

TemplateLoader::addFiles(array
(
	'mod_newsauthor'      => 'system/modules/news_author/templates/modules'
));