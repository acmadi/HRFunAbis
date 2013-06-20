<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->layout = $this->module->layout;
		$this->render('index');
	}
}