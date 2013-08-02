<style type="text/css">
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>

<?php 
$this->widget('bootstrap.widgets.TbBox', array(
'title' => '',
'headerIcon' => 'icon-home',

'content'=> $this->renderPartial('report/_reportpdf', array('data' => $data, 'totalAmount' => $totalAmount, 'totalRemains' => $totalRemains), true),
));
?>
