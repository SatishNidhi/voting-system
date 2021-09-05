<?php

use yii\helpers\Url;

?>

<div style='background: #333333; padding: 3px 0px;' align='center'>
	<img src="<?= Url::base(true) . '/themes/mgmotor/assets/img/mg-logo.jpg' ?>" height="50px">
</div>

<div>
	<br><p>Dear Admin,</p>
	<p align="center">MG Finance Notification</p>
	<!--<table>-->
	<!--<p>-->
	<!--	Customer Full Name : <b><?= $model->fullname ?></b><br>-->
	<!--	Customer Contact : <b><?= $model->contact ?></b><br>-->
	<!--	Customer Email : <b><?= $model->email ?></b><br>-->
	<!--	Finance Through : <b><?= $model->source_from ?></b><br>-->
	<!--	Interested Model : <b><?= $product->title ?></b><br>-->
	<!--	Remark : <b><?= $model->remark ?></b>-->
	<!--</p>-->
	<!--</table>-->
	<table>
		<tr>
			<td>Customer Full Name</td>
			<td>:</td>
			<td><?= $model->fullname ?></td>
		</tr>
		<tr>
			<td>Customer Contact</td>
			<td>:</td>
			<td><?= $model->contact ?></td>
		</tr>
		<tr>
			<td>Customer Email</td>
			<td>:</td>
			<td><?= $model->email ?></td>
		</tr>
		<tr>
			<td>Finance Through</td>
			<td>:</td>
			<td><?= $model->source_from ?></td>
		</tr>
		<tr>
			<td>Interested Model</td>
			<td>:</td>
			<td><?= $product->title ?></td>
		</tr>
		<tr>
			<td>Remark</td>
			<td>:</td>
			<td><?= $model->remark ?></td>
		</tr>
	</table>

	<br><b>Thank You !!!</b><br>
	
</div>