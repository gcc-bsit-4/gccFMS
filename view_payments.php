<?php 
include 'conn.php';
session_start();
$msc_id = $_POST['id'];
$id = $_SESSION['student_id'];
$paid_amount = 0;
$msc_amount = 0;
$curr_bal = 0;
      echo '<input class="form-control" type="number" name="id" required="" style="font-weight:bold; font-size:17px; display:none;" value='.$id.'>';
      echo '<input class="form-control" type="number" name="msc_id" required="" style="font-weight:bold; font-size:17px; display:none;" value='.$msc_id.'>';
			echo '
			<table class="table table-hover table-borderless" id="sampleTable" style= "border-bottom:1px solid black;">';

   echo ' <thead >
                  <tr style="background-color: #009688; color:white; text-align:center;">
                    <th colspan=2>STUDENT PAYMENT DETAILS</th>
                  </tr>
                </thead>
                <tbody>';
  
  $sql = "SELECT * FROM `miscellaneous` WHERE msc_id = '$msc_id'";
     $result = $conn->query($sql);
        if($result-> num_rows > 0){
            $row = $result-> fetch_assoc();
            $msc_amount = $row['amount'];
			echo '<tr>
              <td style="font-size:17px;"><label style="font-weight:bold;color:">DESCRIPTION</label></td>	
              <td style="font-size:17px;"><label style="font-weight:bold;color:">'.$row['description'].'</label></td>
            </tr>
            <tr>
              <td style="font-size:17px;"><label style="font-weight:bold;color:">AMOUNT</label></td> 
              <td style="font-size:17px;"><label style="font-weight:bold;color:">'.$row['amount'].'</label></td>
            </tr>';
        }
 $sql = "SELECT * FROM `payments` WHERE msc_id = '$msc_id' AND st_id = '$id'";
     $result = $conn->query($sql);
        if($result-> num_rows > 0){
            $row = $result-> fetch_assoc();
            $paid_amount = $row['amount'];
        }
  $curr_bal = $msc_amount - $paid_amount;
    		echo ' <tr style="border-top:1px solid black;">
                      <td style="font-size:17px;"><label style="font-weight:bold;color:">PAID AMOUNT</label></td>	
                      <td style="font-size:17px;"><label style="font-weight:bold;color:">'.$paid_amount.'.00</label></td>
                   </tr>
                   <tr>
                      <td style="font-size:17px;"><label style="font-weight:bold;color:">CURRENT BALANCE</label></td>	
                      <td style="font-size:17px;"><label style="font-weight:bold;color:">'.$curr_bal.'.00</label></td>
                   </tr>
                   <tr>
                      <td style="font-size:17px;"><label style="font-weight:bold;color:">CASH RENDERED</label></td>	
                      <td style="font-size:17px;"><input class="form-control" type="number" name="payment_st" required="" style="font-weight:bold; font-size:17px;"></td>
                   </tr>
    		</tbody >
            </table>';
 ?>