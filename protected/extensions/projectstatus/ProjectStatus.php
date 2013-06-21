<?php
class ProjectStatus extends CWidget{
	public $number;
	private $quotes;

	public function init(){

		
		
		$this->quotes = array(
			'Jagalah tokomu dan tokomu akan menjagamu.',
			'Apa yang dimulai dengan amarah diakhiri dengan malu.',
			'Waktu adalah uang.'
		);
	}

	public function run(){
		$project = Project::model()->findAll();
		
		//ambil acak salah satu quote
		$i= rand(0, sizeof($this->quotes)-1);  
		$quote = $this->quotes[$i];

		//tampilkan
		$this->render('index', array('quote'=>$quote, 'project'=>$project));
	}
}
