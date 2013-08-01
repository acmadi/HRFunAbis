<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <a class="brand" href="#">PGN SOLUTION</a>
          
        <div class="nav-collapse">
			<?php 
		$display = 'none';
		if(Yii::app()->user->isGuest) $display = 'yes';
		
		$this->widget('bootstrap.widgets.TbNavbar', array(
			'type' => 'primary',
			'brand' => Yii::app()->name,//CHtml::image( Yii::app()->baseUrl ."/images/pgn_solution.jpg","PGN SOLUTION",array("width"=>150,"height"=>30)),//Yii::app()->name,
			'items' => array(
				'<ul class="nav pull-right" style="display: '.$display.';">
                   <li class="divider-vertical"></li>
                   <li class="dropdown">
                       <a class="dropdown-toggle" href="#" data-toggle="dropdown">Log In<strong class="caret"></strong></a>
                       <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
							<form action="'.Yii::app()->request->baseUrl.'/index.php?r=site/login" method="post" accept-charset="UTF-8">
							  <input id="LoginForm_username" style="margin-bottom: 15px;" type="text" name="LoginForm[username]" size="30" />
							  <input id="LoginForm_password" style="margin-bottom: 15px;" type="password" name="LoginForm[password]" size="30" />
							  <input id="LoginForm_rememberMe" style="float: left; margin-right: 10px;" type="checkbox" name="LoginForm[rememberMe]" value="1" />
							  <label class="string optional" for="user_remember_me"> Remember me</label>
							  <input class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Sign In" />
							</form>
                       </div>
                   </li>
                 </ul>',
				//modadmin
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'htmlOptions'=>array('class'=>'pull-right'),
					'items' => array(
						array('label'=>Yii::t("app","Rights"), 'url'=>array('/rights'), 'visible'=>(!Yii::app()->user->isGuest) && (Yii::app()->user->checkAccess(Rights::module()->superuserName))),
						
						array('label'=>Yii::t("app","User"), 'url'=>array('/modadmin/user/admin'), 'visible'=>(!Yii::app()->user->isGuest) && (Yii::app()->user->checkAccess(Rights::module()->superuserName))),
						
						array('label'=>'Import CSV', 'url'=>array('/importcsv'), 'visible'=>(!Yii::app()->user->isGuest) && (Yii::app()->user->checkAccess(Rights::module()->superuserName))),
						
						
						//array('label'=>Yii::t("app","Login"), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
					
						array('label'=>'logout('.Yii::app()->user->name.')','url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					)
				),
				
				//mod services
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'htmlOptions'=>array('class'=>'pull-right'),
					'items' => array(
						
						array('label'=>Yii::t("app","Master"), 'url'=>'#', 'items'=>array(
							array('label'=>'Service Type', 'url'=>array('modservices/serviceType/admin')),
						 ),
						 'visible'=>(Yii::app()->user->isRole('Super->Super->Services') && (!Yii::app()->user->isGuest))	
						),
						
						
						array('label'=>Yii::t("app","Service"), 'url'=>array('/modservices/DataRequest/admin'), 
						 'visible'=>(Yii::app()->user->isRole('Super->Super->Services') && (!Yii::app()->user->isGuest))
						),
					),
					
				),
				
				//mod hr
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'htmlOptions'=>array('class'=>'pull-right'),
					'items' => array(
										
						array('label'=>'Publication','url'=>'#','items'=>array(
							array('label'=>'File', 'url'=>array('/modhumanresources/filePublication/admin')),
						 ),
						 'visible'=>(Yii::app()->user->isRole('Super->Super->HR') && (!Yii::app()->user->isGuest)),
						),
						
						array('label'=>'Master','url'=>'#','items'=>array(
							array('label'=>'Level Jabatan', 'url'=>array('/modhumanresources/LevelPosition/admin')),
							array('label'=>'Department', 'url'=>array('/modhumanresources/department/admin')),
							array('label'=>'Employee Status', 'url'=>array('/modhumanresources/EmployeeStatus/admin')),
						 ),
						 'visible'=>(Yii::app()->user->isRole('Super->Super->HR') && (!Yii::app()->user->isGuest)),
						),
						
						array('label'=>'Employee', 'url'=>array('/modhumanresources/Employee/admin'), 'visible'=>((Yii::app()->user->isRole('Super->Super->HR')) || Yii::app()->user->checkAccess(Rights::module()->superuserName)) && (!Yii::app()->user->isGuest)),
						
						array('label'=>'Cuti(next)', 'url'=>'#', 'visible'=>(!Yii::app()->user->isGuest && (Yii::app()->user->isRole('hr->profile')))),
						
						array('label'=>'Slip(next)', 'url'=>'#', 'visible'=>(!Yii::app()->user->isGuest && (Yii::app()->user->isRole('hr->profile')))),	
						
						array('label'=>'Profile', 'icon'=>'user', 'url'=>array('/modhumanresources/Employee/view/', 'id'=>Yii::app()->user->getEmployeeID()), 
							'items'=>array(
								array('label'=>'Update Password', 'url'=>array('/modhumanresources/Employee/updatePassword/', 'id'=>Yii::app()->user->getEmployeeID()),
							 )),
							'visible'=>(!Yii::app()->user->isGuest && (Yii::app()->user->isRole('hr->profile')))
							),	
						
					),
					
				),
				
				//mod finance
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'htmlOptions'=>array('class'=>'pull-right'),
					'items' => array(
										
						array('label'=>'Setup','url'=>'#','items'=>array(
							array('label'=>'User-Kas', 'url'=>array('/modfinance/setupUserKas/admin')),
							array('label'=>'User-Bank', 'url'=>array('/modfinance/setupUserBank/admin')),
						 ),
						 'visible'=>(Yii::app()->user->isRole('Super->Super->Finance') && (!Yii::app()->user->isGuest)),
						),
						
						array('label'=>'Master','url'=>'#','items'=>array(
							array('label'=>'Period', 'url'=>array('/modfinance/Period/admin')),
							array('label'=>'Kode Elbi', 'url'=>array('/modfinance/elbicode/admin')),
							array('label'=>'Rekening', 'url'=>array('/modfinance/rekening/admin')),
							array('label'=>'Kas', 'url'=>array('/modfinance/kas/admin')),
						 ),
						 'visible'=>(Yii::app()->user->isRole('Super->Super->Finance') && (!Yii::app()->user->isGuest)),
						),
						
						array('label'=>'|', 'url'=>array('#'), 
						 'visible'=>(Yii::app()->user->isRole('Super->Super->Finance') && (!Yii::app()->user->isGuest))
						),
						
						//finance->super->finance
						array('label'=>'Bank','url'=>'#','items'=>array(
							array('label'=>'Transaksi Bank', 'url'=>array('/modfinance/rekeningDc/admin')),
							array('label'=>'Saldo Bank', 'url'=>array('/modfinance/rekeningSaldo/admin')),
						 ),
						 'visible'=>(Yii::app()->user->isRole('Super->Super->Finance') && (!Yii::app()->user->isGuest)),
						),
						
						array('label'=>'Kas','url'=>'#','items'=>array(
							array('label'=>'Transaksi Kas', 'url'=>array('/modfinance/KasDc/admin')),
							
							array('label'=>'Saldo Kas', 'url'=>array('/modfinance/kasSaldo/admin')),
						 ),
						  'visible'=>(Yii::app()->user->isRole('Super->Super->Finance') && (!Yii::app()->user->isGuest)),
						),
						
						array('label'=>'Expense','url'=>array('/modfinance/kasExpense/admin'),
						  'visible'=>(Yii::app()->user->isRole('Super->Super->Finance') && (!Yii::app()->user->isGuest)),
						),
						
						// array('label'=>'Pusat','url'=>'#','items'=>array(
							// array('label'=>'Transaksi', 'url'=>array('/modfinance/rekeningDc/admin')),
							// array('label'=>'Saldo Rekening', 'url'=>array('/modfinance/rekeningSaldo/admin')),
						 // ),
						 // 'visible'=>(Yii::app()->user->isRole('Super->Super->Finance') && (!Yii::app()->user->isGuest)),
						// ),
						
						// array('label'=>'Input','url'=>'#','items'=>array(
							// array('label'=>'Pengeluaran Kas', 'url'=>array('/modfinance/kasExpense/admin')),
							
							// array('label'=>'Penambahan Kas', 'url'=>array('/modfinance/KasDc/create')),
							
							// array('label'=>'Transaksi Kas', 'url'=>array('/modfinance/KasDc/admin')),
							
							// array('label'=>'Saldo Kas', 'url'=>array('/modfinance/kasSaldo/admin')),
							
							// array('label'=>'Pengeluaran Bank', 'url'=>array('/modfinance/rekeningDc/tarikBank')),
						
						 // ),
						 // 'visible'=>(Yii::app()->user->isRole('Super->Super->Finance') && (!Yii::app()->user->isGuest)),
						// ),
						
						array('label'=>'Laporan','url'=>'#','items'=>array(
							array('label'=>'Laporan Kas', 'url'=>array('/modfinance/KasDc/laporanKas')),
							array('label'=>'Laporan Bank', 'url'=>array('/modfinance/rekeningDc/laporanBank')),
							array('label'=>'Buku Bank', 'url'=>array('/modfinance/rekeningDc/bukuBank')),
						 ),
						 'visible'=>(Yii::app()->user->isRole('Super->Super->Finance') && (!Yii::app()->user->isGuest)),
						),
						//end super->finance
						
						//finance->wilayah
						
						array('label'=>'Bank','url'=>'#','items'=>array(
							array('label'=>'Transaksi Bank', 'url'=>array('/modfinance/rekeningDc/admin')),
							array('label'=>'Saldo Bank', 'url'=>array('/modfinance/rekeningSaldo/admin')),
						 ),
						 'visible'=>(Yii::app()->user->isRole('finance->wilayah') && (!Yii::app()->user->isGuest) && (isset(Yii::app()->session['bank']))),
						),
						
						array('label'=>'Kas','url'=>'#','items'=>array(
							array('label'=>'Transaksi Kas', 'url'=>array('/modfinance/KasDc/admin')),
							
							array('label'=>'Saldo Kas', 'url'=>array('/modfinance/kasSaldo/admin')),
						 ),
						  'visible'=>(Yii::app()->user->isRole('finance->wilayah') && (!Yii::app()->user->isGuest) && (isset(Yii::app()->session['kas']))),
						),
						
						array('label'=>'Expense','url'=>array('/modfinance/kasExpense/admin'),
						  'visible'=>(Yii::app()->user->isRole('finance->wilayah') && (!Yii::app()->user->isGuest)  && (isset(Yii::app()->session['kas']))),
						),
						
						array('label'=>'Laporan','url'=>'#','items'=>array(
							array('label'=>'Laporan Kas', 'url'=>array('/modfinance/KasDc/laporanKas')),
							array('label'=>'Laporan Bank', 'url'=>array('/modfinance/rekeningDc/laporanBank')),
							array('label'=>'Buku Bank', 'url'=>array('/modfinance/rekeningDc/bukuBank')),
						 ),
						  'visible'=>(Yii::app()->user->isRole('finance->wilayah') && (!Yii::app()->user->isGuest)),
						),
						//end finance->wilayah
					),
					
				),
				
				//mod emsm
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'htmlOptions'=>array('class'=>'pull-right'),
					'items' => array(
						//super e-sms
						array('label'=>Yii::t("app","Setup"), 'url'=>'#', 'items'=>array(
							array('label'=>'Disposisi Tree', 'url'=>array('/modesms/disposisiTree/admin')),
						 ),
						 'visible'=>(Yii::app()->user->isRole('Super->Super->Esms') && (!Yii::app()->user->isGuest))	
						),
						
						array('label'=>Yii::t("app","Surat Masuk"), 'url'=>'#', 'items'=>array(
							array('label'=>'Data Surat Masuk', 'url'=>array('/modesms/OutsideLetter/admin')),
							array('label'=>'Tree', 'url'=>array('/modesms/OutsideDisposisi/tree')),
						 ),
						 'visible'=>(Yii::app()->user->isRole('Super->Super->Esms') && (!Yii::app()->user->isGuest))	
						),
						
						array('label'=>Yii::t("app","Surat Keluar"), 'url'=>'#', 'items'=>array(
							array('label'=>'Data Surat Keluar', 'url'=>array('/modesms/InsideLetter/admin')),
						 ),
						 'visible'=>(Yii::app()->user->isRole('Super->Super->Esms') && (!Yii::app()->user->isGuest))	
						),
						
						//e-sms user 
						array('label'=>Yii::t("app","Surat Masuk"), 'url'=>'#', 'items'=>array(
							array('label'=>'Data Surat Masuk', 'url'=>array('/modesms/OutsideDisposisi/admin')),
						 ),
						 'visible'=>(Yii::app()->user->isRole('Esms-user') && (!Yii::app()->user->isGuest))	
						),
						
						array('label'=>Yii::t("app","Surat Keluar"), 'url'=>'#', 'items'=>array(
							array('label'=>'Data Surat Keluar', 'url'=>array('/modesms/InsideLetter/admin')),
						 ),
						 'visible'=>(Yii::app()->user->isRole('Esms-user') && (!Yii::app()->user->isGuest))	
						),
						
					),
					
				),
				
				
				//modproject
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'htmlOptions'=>array('class'=>'pull-right'),
					'items' => array(
						
						array('label'=>Yii::t("app","Project"), 'url'=>array('/modproject/project/admin'), 'visible'=>(!Yii::app()->user->isGuest) && (Yii::app()->user->isRole('Super->Super->Project') || Yii::app()->user->isRole('Super->Project->PIC') || Yii::app()->user->isRole('Super->Project->Finance') || Yii::app()->user->isRole('Super->Project->Procurement'))),
					)
				),
				
				
				//mod sppd
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'htmlOptions'=>array('class'=>'pull-right'),
					'items' => array(
						//super sppd
						array('label'=>Yii::t("app","Master Data"), 'url'=>'#', 'items'=>array(
							array('label'=>'Kota Tujuan', 'url'=>array('/modsppd/MasterDestination/admin')),
							array('label'=>'Satuan Biaya', 'url'=>array('/modsppd/MasterCost/admin')),
						 ),
						 'visible'=>(Yii::app()->user->isRole('Super->Super->Sppd') && (!Yii::app()->user->isGuest))	
						),
						
						array('label'=>Yii::t("app","SPPD"), 'url'=>'#', 'items'=>array(
							array('label'=>'Data SPPD', 'url'=>array('/modsppd/Form/admin')),
							array('label'=>'[Manager] Data Pengajuan SPPD', 'url'=>array('/modsppd/Form/managerAdmin'),
								'visible'=>(Yii::app()->user->isRole('Super->Sppd->Manager') && (!Yii::app()->user->isGuest))
								),
							array('label'=>'[Finance] Data Pengajuan SPPD', 'url'=>array('/modsppd/Form/financeAdmin'),
								'visible'=>(Yii::app()->user->isRole('Super->Sppd->Finance') && (!Yii::app()->user->isGuest))
								),
							array('label'=>'Report', 'url'=>array('/modsppd/Form/report'),
								'visible'=>(Yii::app()->user->isRole('Super->Super->Sppd') && (!Yii::app()->user->isGuest))
								),
						 ),
						 'visible'=>(Yii::app()->user->isRole('Super->Super->Sppd') && (!Yii::app()->user->isGuest))	
						),						
					),
					
				),
				
				
			)
		));
		
		?>
				
    	</div>
    </div>
	</div>
</div>

<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
    	<div class="container">
        	<div class="style-switcher pull-left">
                <?php 
					$this->widget('ext.bbcnewsticker.EBBCNewsTicker',
					array('items'=>array(
								   'This Is just A Sample Ticker Message',
								   'This Is just A Sample Ticker Message'=>'http://pgas-solution.co.id/',
									    )
								)
					);?>
					
				<!--a href="javascript:chooseStyle('none', 60)" checked="checked"><span class="style" style="background-color:#0088CC;"></span></a>
                <a href="javascript:chooseStyle('style2', 60)"><span class="style" style="background-color:#7c5706;"></span></a>
                <a href="javascript:chooseStyle('style3', 60)"><span class="style" style="background-color:#468847;"></span></a>
                <a href="javascript:chooseStyle('style4', 60)"><span class="style" style="background-color:#4e4e4e;"></span></a>
                <a href="javascript:chooseStyle('style5', 60)"><span class="style" style="background-color:#d85515;"></span></a>
                <a href="javascript:chooseStyle('style6', 60)"><span class="style" style="background-color:#a00a69;"></span></a>
                <a href="javascript:chooseStyle('style7', 60)"><span class="style" style="background-color:#a30c22;"></span></a-->
				
				
			<?php //$this->widget('zii.widgets.CBreadcrumbs', array(
					//'links'=>$this->breadcrumbs,
				//)); ?>
				
          	</div>
           <form class="navbar-search pull-right" action="">
           	 
           <input type="text" class="search-query span2" placeholder="Search">
           
           </form>
    	</div><!-- container -->
    </div><!-- navbar-inner -->
</div><!-- subnav -->