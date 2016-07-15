<?php

namespace Contao;

class NewsAuthor
{
	public function myParseArticles($objTemplate, $arrRow, $objModule)
	{
		$objUser = \UserModel::findById($arrRow['author']);

		$objTemplate->username  = $objUser->name;
		$objTemplate->signature = $objUser->text;

		if($objUser->addImage)
		{
			$objFile = \FilesModel::findByUuid($objUser->userSRC);
			$objTemplate->userSRC = $objFile->path;
		}
	}
}