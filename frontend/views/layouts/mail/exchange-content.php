<?php

use yii\helpers\Url;

?>

<div style='background: #333333; padding: 3px 0px;' align='center'>
	<img src="<?= Url::base(true) . '/themes/mgmotor/assets/img/mg-logo.jpg' ?>" height="50px">
</div>

<div>
    <br><p>Dear Admin,</p>
	<p align="center">MG Exchange Notification</p>
	<!--<table>-->
	<!--<p>-->
	<!--	Customer Full Name : <b><?= $model->fullname ?></b><br>-->
	<!--	Customer Contact : <b><?= $model->contact ?></b><br>-->
	<!--	Customer Email : <b><?= $model->email ?></b><br>-->
	<!--	Current Model : <b><?= $model->current_model ?></b><br>-->
	<!--	Made Year                    :  <b><?= $model->made_year ?></b><br>-->
	<!--	Vehicle Registration Number  :  <b><?= $model->vec_reg_number ?></b><br>-->
	<!--	kilometer Reading            :  <b><?= $model->kilometer_reading ?></b><br>-->
	<!--	Expected Price (NRs.) : <b><?= $model->expected_price ?></b><br>-->
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
			<td>Current Model</td>
			<td>:</td>
			<td><?= $model->current_model ?></td>
		</tr>
		<tr>
			<td>Made Year</td>
			<td>:</td>
			<td><?= $model->made_year ?></td>
		</tr>
		<tr>
			<td>Vehicle Registration Number</td>
			<td>:</td>
			<td><?= $model->vec_reg_number ?></td>
		</tr>
		<tr>
			<td>kilometer Reading</td>
			<td>:</td>
			<td><?= $model->kilometer_reading ?></td>
		</tr>
		<tr>
			<td>Expected Price (NRs.)</td>
			<td>:</td>
			<td><?= $model->expected_price ?></td>
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