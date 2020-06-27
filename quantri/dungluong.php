<?
//this code can now count directories too
//and armed with a new function to format the size in bytes,KB,Mb or GB accordingly
//Enjoy
//Updated by Pradeep pradeep[AT]go4expert[DOT]com
//http://myslambook.co.nr

function getDirectorySize($path)
{
  $totalsize = 0;
  $totalcount = 0;
  $dircount = 0;
  if ($handle = opendir ($path))
  {
    while (false !== ($file = readdir($handle)))
    {
      $nextpath = $path . '/' . $file;
      if ($file != '.' && $file != '..' && !is_link ($nextpath))
      {
        if (is_dir ($nextpath))
        {
          $dircount++;
          $result = getDirectorySize($nextpath);
          $totalsize += $result['size'];
          $totalcount += $result['count'];
          $dircount += $result['dircount'];
        }
        elseif (is_file ($nextpath))
        {
          $totalsize += filesize ($nextpath);
          $totalcount++;
        }
      }
    }
  }
  closedir ($handle);
  $total['size'] = $totalsize;
  $total['count'] = $totalcount;
  $total['dircount'] = $dircount;
  return $total;
}

function sizeFormat($size)
{
    $sizeStr='';
    if($size<1024)
    {
        return $size." bytes";
    }
    else if($size<(1024*1024))
    {
        $size=round($size/1024,1);
        return $size." KB";
    }
    else if($size<(1024*1024*1024))
    {
        $size=round($size/(1024*1024),1);
        return $size." MB";
    }
    else
    {
        $size=round($size/(1024*1024*1024),1);
        return $size." GB";
    }

}
$sql3111 = "select * from user_shop where user='".$_SESSION['log']."'";
		if ($result = mysql_query($sql3111,$con)) {
			$row=mysql_fetch_array($result);
			$dungluong=$row['dungluong'];
		}




$path="../thanhvien/".$_SESSION['log']."/";

$ar=getDirectorySize($path);
echo "Đã dùng : ".sizeFormat($ar['size'])."/".sizeFormat($row['dungluong'])."";

//print_r($ar);
?>



<!--
<?php if($ar['size']<'104900000')
{?>

111111111111


<?}else{?><font color=blue>Gian Hàng Miễn Phí</font><?}?>
-->
