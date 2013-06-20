<?php

Yii::setPathOfAlias('editable', dirname(__FILE__).'/../extensions/x-editable');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
if(isset($_COOKIE['haveFunLang']))
{
	$lang = $_COOKIE['haveFunLang'];
}else{
	$lang = 'en';
}


return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'PGN Solution',

	// preloading 'log' component
	'preload'=>array('log','bootstrap'),

	'sourceLanguage'=>'xx',
    'language'=>$lang,
		
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		
		'application.modules.rights.*', //rights
		'application.modules.rights.components.*', //rights
		
		'application.modules.modadmin.*', //modadmin
		'application.modules.modadmin.components.*', //modadmin
		
		'application.modules.modservices.*', //modservice
		'application.modules.modservices.components.*', //modservice
		
		'application.modules.modhumanreources.*', //modhumanreources
		'application.modules.modhumanreources.components.*', //modhumanreources
		
		'application.modules.modfinance.*', //modfinance
		'application.modules.modfinance.components.*', //modfinance
		
		
		'application.modules.modesms.*', //modesms
		'application.modules.modesms.components.*', //modesms
		
		'application.modules.modproject.*', //modproject
		'application.modules.modproject.components.*', //modproject
		
		'editable.*',
		'application.extensions.yii-mail.*',//email
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
	
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'keindahancinta',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array('bootstrap.gii'),
		),
	
		//rights
		'rights'=>array(
			'debug'=>true,
			//'install'=>true,
			'enableBizRuleData'=>true,
		),
		//custom module
		'modadmin'=>array(),
		'modhumanresources'=>array(),
		'modfinance'=>array(),
		
		'modservices'=>array(
			'import'=>array(
				'application.modules.modhumanreources.models.*',
			),
		),
		
		'modesms'=>array(
			'import'=>array(
				'application.modules.modhumanreources.models.*',
			),
		),
		
		'modproject'=>array(),
		
		'importcsv'=>array(
            'path'=>'upload/', // path to folder for saving csv file and file with import params
        ),
		
	),

	// application components
	'components'=>array(
		'bootstrap' => array(
		    'class' => 'ext.bootstrap.components.Bootstrap',
		    'responsiveCss' => true,
		),
		// 'user'=>array(
			// // enable cookie-based authentication
			// 'allowAutoLogin'=>true,
		// ),
		
		//rights
		'user'=>array(
			'class'=>'RWebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		
		'authManager'=>array(
            'class'=>'RDbAuthManager',
            'connectionID'=>'db',
            'itemTable'=>'rbac_authitem',
			'itemChildTable'=>'rbac_authitemchild',
			'assignmentTable'=>'rbac_authassignment',
			'rightsTable'=>'rbac_rights',
        ),
		
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		// 'db'=>array(
			// 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		// ),
		// uncomment the following to use a MySQL database
	
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=hr2fun',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		// 'db'=>array(
			// 'connectionString' => 'mysql:host=localhost;dbname=apps',
			// 'emulatePrepare' => true,
			// 'username' => 'root',
			// 'password' => 'b15m1ll4h',
			// 'charset' => 'utf8',
		// ),
	
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				
				// array(
					// 'class'=>'CWebLogRoute',
				// ),
				
			),
		),
		
		'editable' => array(
            'class'     => 'editable.EditableConfig',
            'form'      => 'bootstrap',        //form style: 'bootstrap', 'jqueryui', 'plain' 
            'mode'      => 'popup',            //mode: 'popup' or 'inline'  
            'defaults'  => array(              //default settings for all editable elements
               'emptytext' => 'Click to edit'
            )
        ),

		/////pdf
		'ePdf' => array(
            'class'         => 'ext.yii-pdf.EYiiPdf',
            'params'        => array(
                'mpdf'     => array(
                    'librarySourcePath' => 'application.vendors.mpdf.*',
                    'constants'         => array(
                        '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                    ),
                    'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder.
                    /*'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                        'mode'              => '', //  This parameter specifies the mode of the new document.
                        'format'            => 'A4', // format A4, A5, ...
                        'default_font_size' => 0, // Sets the default document font size in points (pt)
                        'default_font'      => '', // Sets the default font-family for the new document.
                        'mgl'               => 15, // margin_left. Sets the page margins for the new document.
                        'mgr'               => 15, // margin_right
                        'mgt'               => 16, // margin_top
                        'mgb'               => 16, // margin_bottom
                        'mgh'               => 9, // margin_header
                        'mgf'               => 9, // margin_footer
                        'orientation'       => 'P', // landscape or portrait orientation
                    )*/
                ),
                'HTML2PDF' => array(
                    'librarySourcePath' => 'application.vendors.html2pdf.*',
                    'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
                    /*'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                        'orientation' => 'P', // landscape or portrait orientation
                        'format'      => 'A4', // format A4, A5, ...
                        'language'    => 'en', // language: fr, en, it ...
                        'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                        'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                        'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                    )*/
                )
            ),
		),	
		/////		
		//email
		// 'mail' => array(
            // 'class' => 'application.extensions.yii-mail.YiiMail',
                    // 'transportType'=>'smtp', /// case sensitive!
                    // 'transportOptions'=>array(
                        // 'host'=>'smtp.gmail.com',
                        // 'username'=>'keindahan120288@gmail.com',
                    // // or email@googleappsdomain.com
                    // 'password'=>'hidupbaruyangindah',
                    // 'port'=>'465',
                    // 'encryption'=>'ssl',
                    // ),
                // 'viewPath' => 'application.views.mail',
                // 'logging' => true,
                // 'dryRun' => false
            // ),
		
		'mail' => array(
            'class' => 'application.extensions.yii-mail.YiiMail',
                    'transportType'=>'smtp', /// case sensitive!
                    'transportOptions'=>array(
                        'host'=>'mail.pgas-solution.co.id',
                        'username'=>'automail@pgas-solution.co.id',
                    // or email@googleappsdomain.com
                    'password'=>'123456',
                    'port'=>'465',
                    'encryption'=>'ssl',
                    ),
                'viewPath' => 'application.views.mail',
                'logging' => true,
                'dryRun' => false
            ),	
		
		//end email
		
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);