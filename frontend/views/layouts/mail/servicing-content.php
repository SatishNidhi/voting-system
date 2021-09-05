<?php

use yii\helpers\Url;

?>

<div style='background: #333333; padding: 3px 0px;' align='center'>
	<img src="<?= Url::base(true) . '/themes/mgmotor/assets/img/mg-logo.jpg' ?>" height="50px">
</div>

<div>
	<br>
	<p align="center">MG Vehicle Servicing</p>
	<table>
		<tr>
			<td>Customer Full Name</td>
			<td>:</td>
			<td><?= $servicing->name ?></td>
		</tr>
		<tr>
			<td>Customer Contact</td>
			<td>:</td>
			<td><?= $servicing->mobile ?></td>
		</tr>
		<tr>
			<td>Customer Email</td>
			<td>:</td>
			<td><?= $servicing->email ?></td>
		</tr>
	</table>

	<br><b>Thank You !!!</b><br>
	
</div>