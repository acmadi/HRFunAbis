<?php
Yii::import('modhumanresources.controllers.*');

class FilePublicationDownloadController extends Controller
{
	public function actionDownload($id)
	{
		$model=FilePublication::model()->findByPk($id);
		$src = $model->file_upload; 
		if(@file_exists($src)) {
				$path_parts = @pathinfo($src);
				//$mime = $this->__get_mime($path_parts['extension']);
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				//header('Content-Type: '.$mime);
				header('Content-Disposition: attachment; filename='.basename($src));
				header('Content-Transfer-Encoding: binary');
				header('Expires: 0');
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Pragma: public');
				header('Content-Length: ' . filesize($src));
				ob_clean();
				flush();
				readfile($src);
		} else {
				header("HTTP/1.0 404 Not Found");
				exit();
		}

    }
}
