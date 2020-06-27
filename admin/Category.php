<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>
<?  

require("../config.php");
require("../common_start.php");
require("../vn/module/module_func.php");
include("../Test/admin_func.php");
?>

<body>
<form name="form1" method="post" action="">
<select size="1" name="txtParent">
<?
		echo "<option value='0'>[Danh m&#7909;c g&#7889;c]</option>";
		$cats=GetListCategory();
		foreach ($cats as $cat)
		{
			if ($cat[0]==$parent)
				echo "<option value=".$cat[0]." selected>".$cat[1]."</option>";
			else
				echo "<option value=".$cat[0].">".$cat[1]."</option>";
		}
?>		
		</select>
</form>
</body>
</html>
<? require("../common_end.php") ?>