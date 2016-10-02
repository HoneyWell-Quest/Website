<?php

	include "init.php";
	/*
		input consists of mac and rmac
	*/
        $inputJSON = file_get_contents('php://input');
        $input= json_decode( $inputJSON, TRUE );
		$mac=$input['mac'];
		$rmac = $input['rmac'];
		$sql1 = "select emp_id,emp_name from Employee_mac where mac_1='$mac' ;";
		$result1 = mysqli_query($connection,$sql1);
		
		$num_rows1 = mysqli_num_rows($result1);
		echo $num_rows1;
		$sql2 = "select position_address from Router_Position where router_mac='$rmac' ;";
		$result2 = mysqli_query($connection,$sql2);
		
		$num_rows2 = mysqli_num_rows($result2);
		
		if($num_rows1 >0 )
		{
			$row1 = mysqli_fetch_assoc($result1);
			$empid=$row1["emp_id"];
			$empname=$row1["emp_name"];
                        
			$row2 = mysqli_fetch_assoc($result2);
			$pos=$row2["position_address"];
			
			$success = array(
						"status" => "success",
						"emp" =>
								array("empid" => $empid,
								"empname" => $empname,
								"pos" => $pos
								)
						);
						echo json_encode($success);
						
						
			$sql3 = "INSERT INTO Employee_Position(emp_id,emp_name,position_address) VALUES('$empid','$empname','$pos');";	
			$result3 = mysqli_query($connection,$sql3);
					if(!$result3)
					{
						//die('Invalid query: ' . mysql_error());
						$sql4 = "UPDATE Employee_Position SET position_address='$pos',last_updated=now() WHERE emp_id='$empid';";
						$result4 = mysqli_query($connection,$sql4);
						if(!$result4)
						{
							die('Invalid query or error: ' . mysql_error());
						}
						else{echo "value updated";}
					}
					if(mysqli_affected_rows($connection) > 0)
					{
						echo "affected";
					}
                                       else { echo "Not affected";  }
		}
		 else 
		 {
		$fail = array("status" => "failed");
		echo json_encode($fail);
		}
		
		

 
	
	
	
	
	
?>					