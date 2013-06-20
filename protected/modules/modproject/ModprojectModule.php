<?php

class ModprojectModule extends CWebModule
{
	/**
	* @property boolean whether to display authorization items description 
	* instead of name it is set.
	*/
	public $displayDescription = true;
	/**
	* @property string the flash message key to use for success messages.
	*/
	public $flashSuccessKey = 'ModprojectSuccess';
	/**
	* @property string the flash message key to use for error messages.
	*/
	public $flashErrorKey = 'ModprojectError';
	/**
	* @property boolean whether to install modadmin when accessed.
	*/
	public $install = false;
	/**
	* @property string the base url to modadmin. Override when module is nested.
	*/
	public $baseUrl = '/modproject';
	/**
	* @property string the path to the layout file to use for displaying modadmin.
	*/
	public $layout = 'modproject.views.layouts.main';
	/**
	* @property string the path to the application layout file.
	*/
	public $appLayout = 'application.views.layouts.main';
	/**
	* @property string the style sheet file to use for modadmin.
	*/
	public $cssFile;
	/**
	* @property boolean whether to enable debug mode.
	*/
	public $debug = false;

	private $_assetsUrl;
	
	public function init()
	{
		
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'modproject.models.*',
			'modproject.components.*',
		));
	}

	/**
	* Registers the necessary scripts.
	*/
	public function registerScripts()
	{
		// Get the url to the module assets
		$assetsUrl = $this->getAssetsUrl();

		// Register the necessary scripts
		$cs = Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		$cs->registerCoreScript('jquery.ui');
		$cs->registerScriptFile($assetsUrl.'/js/rights.js');
		
		$cs->registerCssFile($assetsUrl.'/css/core.css');
		
		// Make sure we want to register a style sheet.
		if( $this->cssFile!==false )
		{
			// Default style sheet is used unless one is provided.
			if( $this->cssFile===null )
				$this->cssFile = $assetsUrl.'/css/default.css';
			else
				$this->cssFile = Yii::app()->request->baseUrl.$this->cssFile;

			// Register the style sheet
			$cs->registerCssFile($this->cssFile);
		}
		
	}

	/**
	* Publishes the module assets path.
	* @return string the base URL that contains all published asset files of modadmin.
	*/
	public function getAssetsUrl()
	{
		if( $this->_assetsUrl===null )
		{
			$assetsPath = Yii::getPathOfAlias('modproject.assets');

			// We need to republish the assets if debug mode is enabled.
			if( $this->debug===true )
				$this->_assetsUrl = Yii::app()->getAssetManager()->publish($assetsPath, false, -1, true);
			else
				$this->_assetsUrl = Yii::app()->getAssetManager()->publish($assetsPath);
		}

		return $this->_assetsUrl;
	}

	
	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
