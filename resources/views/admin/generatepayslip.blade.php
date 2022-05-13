<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<!-- <meta content="utf-8" http-equiv="encoding"> -->
	<title>Salary slip</title>

    <style type="text/css">
		
		
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		div.page_break + div.page_break{
			page-break-before: always;
		}
		.wrapper{
			max-width: 800px;
			margin: 5px auto;
			padding: 15px;
		}
		.table_h {
			border: 1px solid #0070C0;
			padding: 12px;
		}
		.table_b {
			border: 1px solid #0070C0;
			border-collapse: collapse;
			border-top: 0;
		}
		.invoice-title {
				text-align:center;
				font-size:20px;
				color:#0070C0;
				padding:3px 0;
				font-weight:bold;
			 }
			td.customerdata_item_label, td.invoicedata_item_label {
              padding: 8px 4px;
             }
    </style>
  </head>

	<body>
		<div class="wrapper">
			<!-- ==================== header ========================= -->
			<table class="table_h" style="width:100%">
				<tr>
					<td align="center" >
						<img src="{{asset('images/logooDark.png')}}" width="100" height="30">
					</td>
				</tr>
				<tr>
					<td align="center">F-26, Second Floor, industrial Area, phase 8, Mohali (Punjab)</td>
				</tr>
					
			</table>
			<table class="table_h" style="width:100%; border-top:0;" >
				<tr>
					<td class="invoice-title" align="center" style="padding: 12px 0px;text-transform: uppercase;" >SALARY SLIP</td>
				</tr>
				<tr>
					<td align="center">For the Month of : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
						<?php 
							if($get_employee_slip!=""){
								foreach($get_employee_slip as $get_employee_slips){
									$year = date('Y', strtotime($get_employee_slips->created_at));
									$month = date('F', strtotime($get_employee_slips->created_at));
									echo $month." ".$year;
								}
							}
						?>
					
					</td>
				</tr>
			</table>
			<!-- =======================  body strting here  ========================= -->
				<table class="table_b" style="width:100%">
					<col style="width: 50%!important;">
					<col style="width: 50%!important;">
					<tr>
						<td style="border-bottom:1px solid #0070C0;border-right: 1px solid #0070C0;vertical-align: top;">
							<table cellspacing="0" class="customerdata"  >
								<col style="width: 50%!important;">
								<col style="width: 50%!important;">
								<tr>
									<td colspan="2" class="customerdata_label" align="left" style="font-size:14px; padding:8px 20px; font-weight:bold;">Employee Details
									</td>
								</tr>
								<?php
								if($generatepdf!=""){		
									foreach($generatepdf as $generatepdfs){
								?>
								<tr>
									<td class="customerdata_item_label" width="200px" style="padding-left:20px;">Employee ID:</td>
									<td style="overflow:hidden;"><?php echo $generatepdfs->uid; ?></td>
								</tr>
								<tr>
									<td class="customerdata_item_label" style="padding-left:20px;">Employee Name:</td>
									<td style=""><div style="overflow: hidden;"><?php echo $generatepdfs->name; ?> <?php echo $generatepdfs->last_name; ?></div></td>
								</tr>
								<tr>
									<td class="customerdata_item_label" style="padding-left:20px;">Designation</td>
									<td style=""><?php echo $generatepdfs->designation; ?></td>
								</tr>
								<?php		
									}
								}
								
								if($get_employee_slip!=""){
									foreach($get_employee_slip as $get_employee_slips){
									?>	
									<tr>
										<td class="customerdata_item_label" style="padding-left:20px;">
											Total Monthly Salary
										</td>
										<td style=""><?php echo $get_employee_slips->net_salary; ?></td>
									</tr>
									<?php 
									}
								}								
								?>
							</table>
						</td>
						<td style="border-bottom:1px solid #0070C0;vertical-align:top;">
							<table cellspacing="0" class="customerdata"  >
								<col style="width: 50%!important;">
								<col style="width: 50%!important;">
								<tr>
									<td colspan="2" class="customerdata_label" align="left" style="font-size:14px; padding:8px 20px; font-weight:bold;">Balance
									</td>
								</tr>
								<tr>
									<td class="customerdata_item_label" width="200px" style="padding-left:20px;">PL Balance:</td>
									<!-- <td style="overflow:hidden;"></td> -->
								</tr>
								<tr>
									<td class="customerdata_item_label" style="padding-left:20px;">CO Balance:</td>
									<!-- <td style="" style="overflow: hidden;"></td> -->
								</tr>
								<tr>
									<td class="customerdata_item_label" style="padding-left:20px;">CL/SL Balance</td>
									<!-- <td style="" style="overflow:hidden;"></td> -->
								</tr>
							</table>
						</td>
					</tr>
				</table>
					
				<!-- ===============  pay days ===================== -->
				<table class="table_b" style="width:100%">
					<col style="width: 50%!important;">
					<col style="width: 50%!important;">
					<tr>
						<td style="border-bottom:1px solid #0070C0;border-right: 1px solid #0070C0;vertical-align: top;">
							<table cellspacing="0" class="customerdata" style="width:100%;">
								<tr>
									<td class="customerdata_item_label" style="width: 50%!important; padding-left:20px;"><b>Paid Days:</b>
									</td>
									<td style="overflow:hidden;width: 50%!important;">30</td>
								</tr>
							</table>
						</td>
						<td style="border-bottom:1px solid #0070C0;vertical-align:top;">
							<table cellspacing="0" class="customerdata"  style="width:100%;">
								<tr>
									<td class="customerdata_item_label" style="width: 50%!important; padding-left:20px;"><b>Days in Month:</b></td>
									<td style="overflow:hidden; width: 50%!important;">30</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
					<?php 
						/* if($totalleave!=""){
							$leave = 0;
							foreach($totalleave as $totalleaves){ */
								//$leave = 2;
							/* }
							
						} */
						/* $one_day_salay = $generatepdfs->net_salary/30;
						$Total_leave_amount = $one_day_salay * $leave;
						
						$total_salary = $generatepdfs->net_salary - $Total_leave_amount;
						$Basic_salay = $total_salary * 0.6;
						$net_balance = $total_salary - $Basic_salay;
						$HRA = $net_balance*0.63;
						$RA = $net_balance*0.15;
						$TA = $net_balance*0.12;
						$OA = $net_balance*0.1;
						$count_total = $Basic_salay + $HRA + $RA + $TA + $OA; */
					?>
                <!-- ==================  Salary Details:       ======================= -->
               	<table class="table_b" style="width:100%">
					<col style="width: 50%!important;">
					<col style="width: 50%!important;">
					<tr>
						<td style="border-bottom:1px solid #0070C0;border-right: 1px solid #0070C0;vertical-align: top;">
							<table cellspacing="0" class="customerdata"  >
								<col style="width: 50%!important;">
								<col style="width: 50%!important;">
								<tr>
									<td colspan="2" class="customerdata_label" align="left" style="font-size:14px; padding:8px 20px; font-weight:bold;">Salary Details:
									</td>
								</tr>
								<?php 
									if($get_employee_slip!=""){	
									foreach($get_employee_slip as $get_employee_slips){
								?>
								<tr>
									<td class="customerdata_item_label" width="200px" style="padding-left:20px;">Basic:</td>
									<td style="overflow:hidden;"><?php echo $get_employee_slips->basic_amount; ?></td>
								</tr>
								<tr>
									<td class="customerdata_item_label" style="padding-left:20px;">HRA:</td>
									<td style=""><div style="overflow: hidden;"><?php echo $get_employee_slips->HRA; ?></div></td>
								</tr>
								<tr>
									<td class="customerdata_item_label" style="padding-left:20px;">Research Allowance</td>
									<td style=""><?php echo $get_employee_slips->RA; ?></td>
								</tr>
								<tr>
									<td class="customerdata_item_label" style="padding-left:20px;">
										Transport
									</td>
									<td style=""><?php echo $get_employee_slips->Transport; ?></td>
								</tr>
								<tr>
									<td class="customerdata_item_label" style="padding-left:20px;">
										Other Allowances
									</td>
									<td style=""><?php echo $get_employee_slips->OA; ?></td>
								</tr>
								<?php
									}
								}
								?>
							</table>
						</td>
						<td style="border-bottom:1px solid #0070C0;vertical-align:top;">
							<table cellspacing="0" class="customerdata"  >
								<col style="width: 50%!important;">
								<col style="width: 50%!important;">
								<tr>
									<td colspan="2" class="customerdata_label" align="left" style="font-size:14px; padding:8px 20px; font-weight:bold;">Deductions
									</td>
								</tr>
								<tr>
									<td class="customerdata_item_label" width="200px" style="padding-left:20px;">Phone Bills (If any):</td>
									<!-- <td style="overflow:hidden;"></td> -->
								</tr>
								<tr>
									<td class="customerdata_item_label" style="padding-left:20px;">Advance (FOOD EXPENSES):</td>
									<!-- <td style="" style="overflow: hidden;"></td> -->
								</tr>
								<tr>
									<td class="customerdata_item_label" style="padding-left:20px;">Loan</td>
									<!-- <td style="" style="overflow:hidden;"></td> -->
								</tr>
								<tr>
									<td class="customerdata_item_label" style="padding-left:20px;">Leaves</td>
									<td style="" style="overflow:hidden;">
									<?php 
										foreach($get_employee_slip as $get_employee_slips){
										$one_day_salary = $get_employee_slips->net_salary/30;		
										$total_leave_amount = $one_day_salary*$get_employee_slips->Total_leave;
										echo round($total_leave_amount);
									}
									?>
									</td>
								</tr>
								<tr>
									<td class="customerdata_item_label" style="padding-left:20px;">Others</td>
									<!-- <td style="" style="overflow:hidden;">0</td> -->
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<!-- =========================== Additions: ================= -->
				<table  cellspacing="0" style="width:100%; border:1px solid #0070C0; border-top:0;" >
					<tr>
						<td colspan="2" class="customerdata_label" align="left" style="font-size:14px; padding:8px 20px; font-weight:bold;">Additions:
						</td>
					</tr>
			  </table>
                <table class="table_b" style="width:100%">
					<col style="width: 50%!important;">
					<col style="width: 50%!important;">
					<tr>
						<td style="border-bottom:1px solid #0070C0;border-right: 1px solid #0070C0;vertical-align: top;">
							<table cellspacing="0" class="customerdata"  >
								<col style="width: 50%!important;">
								<col style="width: 50%!important;">
								<tr>
									<td colspan="2" class="customerdata_label" style="padding:8px 20px;">Others: </td>
								</tr>
								<tr>
									<td class="customerdata_item_label" width="200px" style="padding-left:20px;">TOTAL</td>
									<td style="overflow:hidden;"><?php 
									foreach($get_employee_slip as $get_employee_slips){
										echo $get_employee_slips->total;	
									} ?></td>
								</tr>
							</table>
						</td>
						<td style="border-bottom:1px solid #0070C0;vertical-align:top;">
							<table cellspacing="0" class="customerdata"  >
								<col style="width: 50%!important;">
								<col style="width: 50%!important;">
								<tr>
									<td class="customerdata_item_label" width="200px" style="padding-left:20px;">Total Deductions</td>
									<td style="overflow:hidden;"><?php echo round($total_leave_amount); ?></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<!-- ==============   NET SALARY CALCULATED  ====================        -->
				<table cellspacing="0" class="invoicedata" style="border-left:1px solid #0070C0; border-right: 1px solid #0070C0; border-bottom: 1px solid #0070C0;padding:10px 0px; width:100%;margin-top: -11px;" >
					<col style="width: 50%!important;">
					<col style="width: 50%!important;">
					<tr>
						<td class="invoicedata_item_label" style="padding-left:20px;">NET SALARY CALCULATED </td>
						<td ><?php foreach($get_employee_slip as $get_employee_slips){
										echo $get_employee_slips->total;		
									} ?></td>
					</tr>
					<tr>
						<td class="invoicedata_item_label" style="padding-left:20px;">NET SALARY TRANSFERRED AFTER ROUNDED OFF </td>
						<td ><?php foreach($get_employee_slip as $get_employee_slips){
										echo $get_employee_slips->total;		
									} ?> </td>
					</tr>
					<tr>
						<td class="invoicedata_item_label" style="padding-left:20px;">Note :Salary remitted to your IndusInd Bank Account. No</td>
						<td >159501852073</td>
					</tr>
				</table>

				<!-- =================== paid leaves ============================== -->
				<table class="table_h" style="width:100%; border-top:0; margin-top: -11px;" >
					<tr>
						<td  align="center">This is a computer generated document and hence no signature required</td>
					</tr>
				</table>
		</div> <!-- ===========  main wrapper    ========== -->
	</body>
</html>