								<table id="example1" class="table table-hover table-bordered table-striped">
									<thead>
										<tr>
											<th>No.</th>
											<th>Order ID</th>
											<th>Layanan</th>
											<th>Target</th>
											<th>Jumlah</th>
											<th>Harga</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php
											require_once 'require/api.php';
											$api = new Api();
											$i = 1;
											$q1 = mysql_query("SELECT * FROM riwayat_order WHERE username = '$username' ORDER BY id DESC");
											while ($a1 = mysql_fetch_array($q1)) {
												$status_text = $api->status($a1['order_id'])->data->status;
												if ($api->status($a1['order_id'])->data->status == "Completed") {
						 								$status = "<label style='padding:2px 3px;font-size:12px;color:white;background-color:green;'>Completed</label>";
						 								mysql_query("UPDATE riwayat_order SET status = '$status_text' WHERE order_id = '$a1[order_id]'");
						 						} else if ($api->status($a1['order_id'])->data->status == "Processing") {
						 							$status = "<label style='padding:2px 3px;font-size:12px;color:white;background-color:lightblue'>Processing</label>";
						 								mysql_query("UPDATE riwayat_order SET status = '$status_text' WHERE order_id = '$a1[order_id]'");
						 						} else if ($api->status($a1['order_id'])->data->status == "Pending") {
						 							$status = "<label style='padding:2px 3px;font-size:12px;color:white;background-color:orange'>Pending</label>";
						 							mysql_query("UPDATE riwayat_order SET status = '$status_text' WHERE order_id = '$a1[order_id]'");
						 						} else {
													$status = "<label style='padding:2px 3px;font-size:12px;color:white;background-color:red;'>".$api->status($a1['order_id'])->data->status."</label>";
													mysql_query("UPDATE riwayat_order SET status = '$status_text' WHERE order_id = '$a1[order_id]'");
						 						}
						 						echo "
						 							<tr>
						 								<td>$i.</td>
						 								<td>$a1[order_id]</td>
						 								<td>$a1[layanan]</td>
						 								<td>$a1[link]</td>
						 								<td>$a1[jumlah]</td>
						 								<td>".number_format($a1['harga'])."</td>
						 								<td>$status</td>
						 							</tr>
						 						";
												$i++;
											}
										?>
									</tbody>
								</table>