<?php

namespace Contao;

class ModuleNewsAuthor extends \ModuleNews
{
	protected $strTemplate = 'mod_newsauthor';

	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['newsauthor'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		if (!isset($_GET['items']) && \Config::get('useAutoItem') && isset($_GET['auto_item']))
		{
			\Input::setGet('items', \Input::get('auto_item'));
		}

		// Do not index or cache the page if no news item has been specified
		if (!\Input::get('items'))
		{
			global $objPage;

			$objPage->noSearch = 1;
			$objPage->cache = 0;

			return '';
		}

		$this->news_archives = $this->sortOutProtected(deserialize($this->news_archives));

		if (!is_array($this->news_archives) || empty($this->news_archives))
		{
			global $objPage;

			$objPage->noSearch = 1;
			$objPage->cache = 0;

			return '';
		}

		return parent::generate();
	}

	protected function compile()
	{
		$objArticle = \NewsModel::findPublishedByParentAndIdOrAlias(\Input::get('items'), $this->news_archives);
		$objAuthor = \UserModel::findById($objArticle->author);

		if($objAuthor->addImage) {
			$objFile = \FilesModel::findByUuid($objAuthor->userSRC);
			$this->addImageToTemplate($this->Template, array(
				'singleSRC'=>$objFile->path, 
				'alt'=>'Screenshot of Music Academy', 
				'size'=>$this->imgSize
			));
		}

		foreach($objAuthor->row() as $k=>$v) {
			$this->Template->$k = $v;
		}
	}
}