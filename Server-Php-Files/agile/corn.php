<?php

	include "init.php";
	
	$sql1="UPDATE Employee_Position SET position_address='Sorry,Not in the network.' WHERE TIMESTAMPDIFF(MINUTE,last_updated,NOW())>30;";
	$result1 = mysqli_query($connection,$sql1);
	if(!$result1)
		{
                        echo "Failure";
			die('Invalid query or error: ' . mysql_error());
		}
		else{echo "value updated";}


?>	