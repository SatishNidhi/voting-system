<?php

namespace backend\widgets;

use yii\helpers\ArrayHelper;

use iutbay\yii2kcfinder\KCFinderAsset;

class CKEditor extends \dosamigos\ckeditor\CKEditor
{

	public $enableKCFinder = true;

	/**
	 * Registers CKEditor plugin
	 */
	protected function registerPlugin()
	{
		if ($this->enableKCFinder)
		{
			$this->registerKCFinder();
		}

		parent::registerPlugin();
	}

	/**
	 * Registers KCFinder
	 */
	protected function registerKCFinder()
	{
		$register = KCFinderAsset::register($this->view);
		$kcfinderUrl = $register->baseUrl;

		$browseOptions = [
			'filebrowserBrowseUrl' => $kcfinderUrl . '/browse.php?opener=ckeditor&type=files',
			'filebrowserUploadUrl' => $kcfinderUrl . '/upload.php?opener=ckeditor&type=files',
		];
		// $browseOptions = [
		// 	'filebrowserBrowseUrl' => 'http://'. $_SERVER["HTTP_HOST"] . '/backend/web/browse.php?opener=ckeditor&type=files',
		// 	'filebrowserUploadUrl' => 'http://'. $_SERVER["HTTP_HOST"] . '/backend/web/upload.php?opener=ckeditor&type=files',
		// ];

		$this->clientOptions = ArrayHelper::merge($browseOptions, $this->clientOptions);
	}

}

?>