<?php

use backend\models\ContactSetting;
use common\models\Option;

$model = ContactSetting::findOne('1');
$title = Option::get('sitetitle');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Email Sent</title>
	<style>
		table {
			width: 100%;
			overflow: auto;
			border: 1px solid #cdcdcd;
		}
		tr {
			background-color: #def;
			color: black;
		}
		tr:nth-child(odd) {
			background-color: #cde;      
		}
		th {
			background-color: #cba;
			color: white;
			height: 30px;
		}
		td {
			height: 30px;
			color: #3d3d3d;
			padding: 0px 10px;
			background: transparent;
		}
		.content {
			font-size: 18px;
			text-align: justify;
		}
	</style>
</head>
<body>
	<div style='padding: 2%;'>
		<div style='box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 5%; background: #F7F7F7;'>
			<?= $content ?>
			<p>
				<b><?= $title ?></b><br>
				<?= $model->address ?><br>
				<?= $model->email ?><br>
				<?= $model->contact ?><br>
			</p>
		</div>
	</div>
</body>
</html>