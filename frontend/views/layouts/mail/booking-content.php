<div style='background: #E01C28; color: white; padding: 1px 0px;' align='center'><h3>MG Car Booking</h3></div>
			<div>
				<br>
				<b>Message:</b><br>
				<span class="content"><?= $bkDetail->comment ?></span>
				<br><br>
				<div style="overflow: auto;">
				<table>
					<tr>
						<th>Booking Details</th>
						<th>Car Model Deails</th>
					</tr>
					<tr>
						<td>
							<br>
							<table>
								<tr>
									<td><b>Fullname:</b></td>
									<td><?= $bkDetail->name ?></td>
								</tr>
								<tr>
									<td><b>Address:</b></td>
									<td><?= $bkDetail->address ?></td>
								</tr>
								<tr>
									<td><b>Email:</b></td>
									<td><?= $bkDetail->email ?></td>
								</tr>
								<tr>
									<td><b>Contact:</b></td>
									<td><?= $bkDetail->contact ?></td>
								</tr>
							</table>
							<br>
						</td>
						<td>
							<table>
								<tr>
									<td><b>Model Name :</b></td>
									<td><?= $pdDetail->title ?></td>
								</tr>
								<tr>
									<td><b>Model Price :</b></td>
									<td>Rs. - </td>
								</tr>
								<tr>
									<td><b>Model Campany :</b></td>
									<td>Voting System</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			</div>