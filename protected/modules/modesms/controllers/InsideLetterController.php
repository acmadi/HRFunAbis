<?php

class InsideLetterController extends RController
{
	
	public function init()
	{
		//$this->_authorizer = $this->module->getAuthorizer();
		$this->layout = $this->module->layout;
		$this->defaultAction = 'admin';

		// Register the scripts
		$this->module->registerScripts();
	}
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights',	
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionViewPdf($id)
	{
		$model = $this->loadModel($id);
		
		$mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
        $mPDF1->WriteHTML($this->renderPartial('viewpdf',array('model'=>$model,), true));
        $mPDF1->Output();
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$content = '
			<!--[if gte mso 9]><xml>
			 <o:OfficeDocumentSettings>
			  <o:AllowPNG/>
			 </o:OfficeDocumentSettings>
			</xml><![endif]-->

			<p class="MsoNormal"><span style="font-size:10.0pt;line-height:115%;font-family:
			&quot;Arial&quot;,&quot;sans-serif&quot;">Jakarta, '.date('d F Y', time()).'</p>

			<p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt"><span style="font-weight: bold;"><span style="font-size:10.0pt;line-height:115%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">No.<span style="mso-tab-count:2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>: <br></span></span></p><span style="font-weight: bold;">

			</span><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt"><span style="font-weight: bold;"><span style="font-size:10.0pt;line-height:115%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Lamp.<span style="mso-tab-count:2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>: 1 Berkas</span></span></p><span style="font-weight: bold;">

			</span><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt"><span style="font-weight: bold;"><span style="font-size:10.0pt;line-height:115%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Sifat<span style="mso-tab-count:2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>: Penting</span></span></p><span style="font-weight: bold;">

			</span><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt"><span style="font-weight: bold;"><span style="font-size:10.0pt;line-height:115%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Perihal<span style="mso-tab-count:1">&nbsp; </span></p>

			<p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt"><span style="font-size:10.0pt;line-height:115%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;</span></p>

			<p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt"><span style="font-size:10.0pt;line-height:115%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">Kepada
			Yth.</span></p><br><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><br>Untuk
			Perhatian :<span style="mso-spacerun:yes">&nbsp;&nbsp;</span></span><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;text-align:
			justify"><span style="font-size:10.0pt;line-height:115%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;">&nbsp;<span style="font-style: italic;">&lt;isi surat&gt;</span><br></span></p>

			<span style="font-size:10.0pt;line-height:115%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"> </span><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
			normal"><span style="font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"></span><span style="font-size:10.0pt;line-height:115%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
			mso-fareast-font-family:&quot;Times New Roman&quot;;mso-fareast-theme-font:minor-fareast;
			mso-ansi-language:EN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA"><br></span></p><p class="MsoNormal" style="margin-bottom:0in;margin-bottom:.0001pt;line-height:
			normal"><span style="font-size:10.0pt;line-height:115%;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
			mso-fareast-font-family:&quot;Times New Roman&quot;;mso-fareast-theme-font:minor-fareast;
			mso-ansi-language:EN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA">Tembusan:</span></p><!--[if gte mso 9]><xml>
			 <w:WordDocument>
			  <w:View>Normal</w:View>
			  <w:Zoom>0</w:Zoom>
			  <w:TrackMoves/>
			  <w:TrackFormatting/>
			  <w:PunctuationKerning/>
			  <w:ValidateAgainstSchemas/>
			  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
			  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
			  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
			  <w:DoNotPromoteQF/>
			  <w:LidThemeOther>EN-US</w:LidThemeOther>
			  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
			  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>
			  <w:Compatibility>
			   <w:BreakWrappedTables/>
			   <w:SnapToGridInCell/>
			   <w:WrapTextWithPunct/>
			   <w:UseAsianBreakRules/>
			   <w:DontGrowAutofit/>
			   <w:SplitPgBreakAndParaMark/>
			   <w:EnableOpenTypeKerning/>
			   <w:DontFlipMirrorIndents/>
			   <w:OverrideTableStyleHps/>
			  </w:Compatibility>
			  <m:mathPr>
			   <m:mathFont m:val="Cambria Math"/>
			   <m:brkBin m:val="before"/>
			   <m:brkBinSub m:val="&#45;-"/>
			   <m:smallFrac m:val="off"/>
			   <m:dispDef/>
			   <m:lMargin m:val="0"/>
			   <m:rMargin m:val="0"/>
			   <m:defJc m:val="centerGroup"/>
			   <m:wrapIndent m:val="1440"/>
			   <m:intLim m:val="subSup"/>
			   <m:naryLim m:val="undOvr"/>
			  </m:mathPr></w:WordDocument>
			</xml><![endif]--><!--[if gte mso 9]><xml>
			 <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"
			  DefSemiHidden="true" DefQFormat="false" DefPriority="99"
			  LatentStyleCount="267">
			  <w:LsdException Locked="false" Priority="0" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Normal"/>
			  <w:LsdException Locked="false" Priority="9" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="heading 1"/>
			  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"/>
			  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"/>
			  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"/>
			  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"/>
			  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"/>
			  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"/>
			  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"/>
			  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"/>
			  <w:LsdException Locked="false" Priority="39" Name="toc 1"/>
			  <w:LsdException Locked="false" Priority="39" Name="toc 2"/>
			  <w:LsdException Locked="false" Priority="39" Name="toc 3"/>
			  <w:LsdException Locked="false" Priority="39" Name="toc 4"/>
			  <w:LsdException Locked="false" Priority="39" Name="toc 5"/>
			  <w:LsdException Locked="false" Priority="39" Name="toc 6"/>
			  <w:LsdException Locked="false" Priority="39" Name="toc 7"/>
			  <w:LsdException Locked="false" Priority="39" Name="toc 8"/>
			  <w:LsdException Locked="false" Priority="39" Name="toc 9"/>
			  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"/>
			  <w:LsdException Locked="false" Priority="10" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Title"/>
			  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>
			  <w:LsdException Locked="false" Priority="11" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"/>
			  <w:LsdException Locked="false" Priority="22" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Strong"/>
			  <w:LsdException Locked="false" Priority="20" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"/>
			  <w:LsdException Locked="false" Priority="59" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Table Grid"/>
			  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"/>
			  <w:LsdException Locked="false" Priority="1" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"/>
			  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Shading"/>
			  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light List"/>
			  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Grid"/>
			  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 1"/>
			  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 2"/>
			  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 1"/>
			  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 2"/>
			  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 1"/>
			  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 2"/>
			  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 3"/>
			  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Dark List"/>
			  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Shading"/>
			  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful List"/>
			  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Grid"/>
			  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Shading Accent 1"/>
			  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light List Accent 1"/>
			  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Grid Accent 1"/>
			  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"/>
			  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"/>
			  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"/>
			  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"/>
			  <w:LsdException Locked="false" Priority="0" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"/>
			  <w:LsdException Locked="false" Priority="29" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Quote"/>
			  <w:LsdException Locked="false" Priority="30" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"/>
			  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"/>
			  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"/>
			  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"/>
			  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"/>
			  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Dark List Accent 1"/>
			  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"/>
			  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful List Accent 1"/>
			  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"/>
			  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Shading Accent 2"/>
			  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light List Accent 2"/>
			  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Grid Accent 2"/>
			  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"/>
			  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"/>
			  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"/>
			  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"/>
			  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"/>
			  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"/>
			  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"/>
			  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Dark List Accent 2"/>
			  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"/>
			  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful List Accent 2"/>
			  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"/>
			  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Shading Accent 3"/>
			  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light List Accent 3"/>
			  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Grid Accent 3"/>
			  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"/>
			  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"/>
			  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"/>
			  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"/>
			  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"/>
			  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"/>
			  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"/>
			  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Dark List Accent 3"/>
			  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"/>
			  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful List Accent 3"/>
			  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"/>
			  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Shading Accent 4"/>
			  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light List Accent 4"/>
			  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Grid Accent 4"/>
			  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"/>
			  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"/>
			  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"/>
			  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"/>
			  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"/>
			  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"/>
			  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"/>
			  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Dark List Accent 4"/>
			  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"/>
			  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful List Accent 4"/>
			  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"/>
			  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Shading Accent 5"/>
			  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light List Accent 5"/>
			  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Grid Accent 5"/>
			  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"/>
			  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"/>
			  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"/>
			  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"/>
			  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"/>
			  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"/>
			  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"/>
			  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Dark List Accent 5"/>
			  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"/>
			  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful List Accent 5"/>
			  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"/>
			  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Shading Accent 6"/>
			  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light List Accent 6"/>
			  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Grid Accent 6"/>
			  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"/>
			  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"/>
			  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"/>
			  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"/>
			  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"/>
			  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"/>
			  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"/>
			  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Dark List Accent 6"/>
			  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"/>
			  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful List Accent 6"/>
			  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"/>
			  <w:LsdException Locked="false" Priority="19" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"/>
			  <w:LsdException Locked="false" Priority="21" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"/>
			  <w:LsdException Locked="false" Priority="31" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"/>
			  <w:LsdException Locked="false" Priority="32" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"/>
			  <w:LsdException Locked="false" Priority="33" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Book Title"/>
			  <w:LsdException Locked="false" Priority="37" Name="Bibliography"/>
			  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"/>
			 </w:LatentStyles>
			</xml><![endif]--><!--[if gte mso 10]>
			<style>
			 /* Style Definitions */
			 table.MsoNormalTable
				{mso-style-name:"Table Normal";
				mso-tstyle-rowband-size:0;
				mso-tstyle-colband-size:0;
				mso-style-noshow:yes;
				mso-style-priority:99;
				mso-style-parent:"";
				mso-padding-alt:0in 5.4pt 0in 5.4pt;
				mso-para-margin-top:0in;
				mso-para-margin-right:0in;
				mso-para-margin-bottom:10.0pt;
				mso-para-margin-left:0in;
				line-height:115%;
				mso-pagination:widow-orphan;
				font-size:11.0pt;
				font-family:"Calibri","sans-serif";
				mso-ascii-font-family:Calibri;
				mso-ascii-theme-font:minor-latin;
				mso-hansi-font-family:Calibri;
				mso-hansi-theme-font:minor-latin;
				mso-bidi-font-family:"Times New Roman";
				mso-bidi-theme-font:minor-bidi;}
			table.MsoTableGrid
				{mso-style-name:"Table Grid";
				mso-tstyle-rowband-size:0;
				mso-tstyle-colband-size:0;
				mso-style-priority:59;
				mso-style-unhide:no;
				border:solid windowtext 1.0pt;
				mso-border-alt:solid windowtext .5pt;
				mso-padding-alt:0in 5.4pt 0in 5.4pt;
				mso-border-insideh:.5pt solid windowtext;
				mso-border-insidev:.5pt solid windowtext;
				mso-para-margin:0in;
				mso-para-margin-bottom:.0001pt;
				mso-pagination:widow-orphan;
				font-size:11.0pt;
				font-family:"Calibri","sans-serif";
				mso-ascii-font-family:Calibri;
				mso-ascii-theme-font:minor-latin;
				mso-hansi-font-family:Calibri;
				mso-hansi-theme-font:minor-latin;
				mso-bidi-font-family:"Times New Roman";
				mso-bidi-theme-font:minor-bidi;}
			</style>
			<![endif]--><!--[if gte mso 9]><xml>
			 <o:OfficeDocumentSettings>
			  <o:AllowPNG/>
			 </o:OfficeDocumentSettings>
			</xml><![endif]--><!--[if gte mso 9]><xml>
			 <w:WordDocument>
			  <w:View>Normal</w:View>
			  <w:Zoom>0</w:Zoom>
			  <w:TrackMoves/>
			  <w:TrackFormatting/>
			  <w:PunctuationKerning/>
			  <w:ValidateAgainstSchemas/>
			  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
			  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
			  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
			  <w:DoNotPromoteQF/>
			  <w:LidThemeOther>EN-US</w:LidThemeOther>
			  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
			  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>
			  <w:Compatibility>
			   <w:BreakWrappedTables/>
			   <w:SnapToGridInCell/>
			   <w:WrapTextWithPunct/>
			   <w:UseAsianBreakRules/>
			   <w:DontGrowAutofit/>
			   <w:SplitPgBreakAndParaMark/>
			   <w:EnableOpenTypeKerning/>
			   <w:DontFlipMirrorIndents/>
			   <w:OverrideTableStyleHps/>
			  </w:Compatibility>
			  <m:mathPr>
			   <m:mathFont m:val="Cambria Math"/>
			   <m:brkBin m:val="before"/>
			   <m:brkBinSub m:val="&#45;-"/>
			   <m:smallFrac m:val="off"/>
			   <m:dispDef/>
			   <m:lMargin m:val="0"/>
			   <m:rMargin m:val="0"/>
			   <m:defJc m:val="centerGroup"/>
			   <m:wrapIndent m:val="1440"/>
			   <m:intLim m:val="subSup"/>
			   <m:naryLim m:val="undOvr"/>
			  </m:mathPr></w:WordDocument>
			</xml><![endif]--><!--[if gte mso 9]><xml>
			 <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"
			  DefSemiHidden="true" DefQFormat="false" DefPriority="99"
			  LatentStyleCount="267">
			  <w:LsdException Locked="false" Priority="0" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Normal"/>
			  <w:LsdException Locked="false" Priority="9" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="heading 1"/>
			  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"/>
			  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"/>
			  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"/>
			  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"/>
			  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"/>
			  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"/>
			  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"/>
			  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"/>
			  <w:LsdException Locked="false" Priority="39" Name="toc 1"/>
			  <w:LsdException Locked="false" Priority="39" Name="toc 2"/>
			  <w:LsdException Locked="false" Priority="39" Name="toc 3"/>
			  <w:LsdException Locked="false" Priority="39" Name="toc 4"/>
			  <w:LsdException Locked="false" Priority="39" Name="toc 5"/>
			  <w:LsdException Locked="false" Priority="39" Name="toc 6"/>
			  <w:LsdException Locked="false" Priority="39" Name="toc 7"/>
			  <w:LsdException Locked="false" Priority="39" Name="toc 8"/>
			  <w:LsdException Locked="false" Priority="39" Name="toc 9"/>
			  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"/>
			  <w:LsdException Locked="false" Priority="10" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Title"/>
			  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>
			  <w:LsdException Locked="false" Priority="11" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"/>
			  <w:LsdException Locked="false" Priority="22" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Strong"/>
			  <w:LsdException Locked="false" Priority="20" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"/>
			  <w:LsdException Locked="false" Priority="59" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Table Grid"/>
			  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"/>
			  <w:LsdException Locked="false" Priority="1" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"/>
			  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Shading"/>
			  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light List"/>
			  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Grid"/>
			  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 1"/>
			  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 2"/>
			  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 1"/>
			  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 2"/>
			  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 1"/>
			  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 2"/>
			  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 3"/>
			  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Dark List"/>
			  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Shading"/>
			  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful List"/>
			  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Grid"/>
			  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Shading Accent 1"/>
			  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light List Accent 1"/>
			  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Grid Accent 1"/>
			  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"/>
			  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"/>
			  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"/>
			  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"/>
			  <w:LsdException Locked="false" Priority="0" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"/>
			  <w:LsdException Locked="false" Priority="29" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Quote"/>
			  <w:LsdException Locked="false" Priority="30" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"/>
			  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"/>
			  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"/>
			  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"/>
			  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"/>
			  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Dark List Accent 1"/>
			  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"/>
			  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful List Accent 1"/>
			  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"/>
			  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Shading Accent 2"/>
			  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light List Accent 2"/>
			  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Grid Accent 2"/>
			  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"/>
			  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"/>
			  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"/>
			  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"/>
			  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"/>
			  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"/>
			  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"/>
			  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Dark List Accent 2"/>
			  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"/>
			  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful List Accent 2"/>
			  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"/>
			  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Shading Accent 3"/>
			  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light List Accent 3"/>
			  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Grid Accent 3"/>
			  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"/>
			  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"/>
			  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"/>
			  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"/>
			  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"/>
			  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"/>
			  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"/>
			  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Dark List Accent 3"/>
			  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"/>
			  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful List Accent 3"/>
			  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"/>
			  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Shading Accent 4"/>
			  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light List Accent 4"/>
			  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Grid Accent 4"/>
			  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"/>
			  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"/>
			  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"/>
			  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"/>
			  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"/>
			  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"/>
			  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"/>
			  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Dark List Accent 4"/>
			  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"/>
			  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful List Accent 4"/>
			  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"/>
			  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Shading Accent 5"/>
			  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light List Accent 5"/>
			  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Grid Accent 5"/>
			  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"/>
			  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"/>
			  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"/>
			  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"/>
			  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"/>
			  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"/>
			  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"/>
			  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Dark List Accent 5"/>
			  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"/>
			  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful List Accent 5"/>
			  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"/>
			  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Shading Accent 6"/>
			  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light List Accent 6"/>
			  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Light Grid Accent 6"/>
			  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"/>
			  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"/>
			  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"/>
			  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"/>
			  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"/>
			  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"/>
			  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"/>
			  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Dark List Accent 6"/>
			  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"/>
			  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful List Accent 6"/>
			  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
			   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"/>
			  <w:LsdException Locked="false" Priority="19" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"/>
			  <w:LsdException Locked="false" Priority="21" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"/>
			  <w:LsdException Locked="false" Priority="31" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"/>
			  <w:LsdException Locked="false" Priority="32" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"/>
			  <w:LsdException Locked="false" Priority="33" SemiHidden="false"
			   UnhideWhenUsed="false" QFormat="true" Name="Book Title"/>
			  <w:LsdException Locked="false" Priority="37" Name="Bibliography"/>
			  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"/>
			 </w:LatentStyles>
			</xml><![endif]--><!--[if gte mso 10]>
			<style>
			 /* Style Definitions */
			 table.MsoNormalTable
				{mso-style-name:"Table Normal";
				mso-tstyle-rowband-size:0;
				mso-tstyle-colband-size:0;
				mso-style-noshow:yes;
				mso-style-priority:99;
				mso-style-parent:"";
				mso-padding-alt:0in 5.4pt 0in 5.4pt;
				mso-para-margin-top:0in;
				mso-para-margin-right:0in;
				mso-para-margin-bottom:10.0pt;
				mso-para-margin-left:0in;
				line-height:115%;
				mso-pagination:widow-orphan;
				font-size:11.0pt;
				font-family:"Calibri","sans-serif";
				mso-ascii-font-family:Calibri;
				mso-ascii-theme-font:minor-latin;
				mso-hansi-font-family:Calibri;
				mso-hansi-theme-font:minor-latin;
				mso-bidi-font-family:"Times New Roman";
				mso-bidi-theme-font:minor-bidi;}
			table.MsoTableGrid
				{mso-style-name:"Table Grid";
				mso-tstyle-rowband-size:0;
				mso-tstyle-colband-size:0;
				mso-style-priority:59;
				mso-style-unhide:no;
				border:solid windowtext 1.0pt;
				mso-border-alt:solid windowtext .5pt;
				mso-padding-alt:0in 5.4pt 0in 5.4pt;
				mso-border-insideh:.5pt solid windowtext;
				mso-border-insidev:.5pt solid windowtext;
				mso-para-margin:0in;
				mso-para-margin-bottom:.0001pt;
				mso-pagination:widow-orphan;
				font-size:11.0pt;
				font-family:"Calibri","sans-serif";
				mso-ascii-font-family:Calibri;
				mso-ascii-theme-font:minor-latin;
				mso-hansi-font-family:Calibri;
				mso-hansi-theme-font:minor-latin;
				mso-bidi-font-family:"Times New Roman";
				mso-bidi-theme-font:minor-bidi;}
			</style>
			<![endif]-->	
			';
		$model=new InsideLetter;
		$model->version = '1.0';
		$model->version_date = date('Y-m-d', time());
		$model->content = $content;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['InsideLetter']))
		{
			$model->attributes=$_POST['InsideLetter'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['InsideLetter']))
		{
			$model->attributes=$_POST['InsideLetter'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionAjaxupdate()
	{
		$es = new EditableSaver('InsideLetter');
		$es->update();
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	
	public function actionBatchDelete()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		 
		if(isset($_POST['id']) && $_POST['id']!=='')
		{
			foreach($_POST['id'] as $key=>$val)
				$this->loadModel($val)->delete();
		 
			Yii::app()->user->setFlash('success','<strong>Berhasil</strong> Anda berhasil menghapus.');
		}
		else
			Yii::app()->user->setFlash('error','<strong>Gagal</strong> Anda belum memilih data untuk di hapus.');
		$this->redirect(array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('InsideLetter');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new InsideLetter('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['InsideLetter']))
			$model->attributes=$_GET['InsideLetter'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=InsideLetter::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='inside-letter-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
