<?php
	$province_id=$_POST["province_id"];
	
	require("../library/config.php");
	mysql_set_charset("utf8");
	$result=mysql_query("select district_id,district_name from districts where province_id='$province_id'");
	while($data=mysql_fetch_array($result)){
		echo"<option value='$data[district_id]'>$data[district_name]</option>";	
	}
?>