<?

function chuanhoa($s)

{

	//return trim(htmlspecialchars($s));

	return str_replace("<","&lt;",trim($s));

}



function breakline($s)

{

	return str_replace("\n","<br>",$s);

}



function GetFileExtention($filename) 

{  

    return strrchr($filename, ".");

}  



function CheckUpload($f,$ext="",$maxsize=0,$req=0)

{

	$fname=strtolower(basename($f['name']));

	$ftemp=$f["tmp_name"];

	$fsize=$f["size"];

	$fext=GetFileExtention($fname);

	if($fsize==0) 

	{

		if ($req!=0) return "B&#7841;n ch&#432;a ch&#7885;n file";

		return "";

	} 

	else

	{

		if ($ext!="") if (strpos($ext, $fext)===false) return "T&#7853;p tin không &#273;úng &#273;&#7883;nh d&#7841;ng : $fname";

		//if(($f["type"] != "image/gif" ) && ($f["type"] != "image/pjpeg")) return "&#272;&#7883;nh d&#7841;ng file không h&#7907;p l&#7879;";

		if ($maxsize>0) if ($fsize > $maxsize) return "Kích th&#432;&#7899;c hình ph&#7843;i nh&#7887; h&#417;n ".$maxsize." byte";

	}

	return "";

}



function MakeUpload($f,$newfile)

{
  //if (file_exists($newfile)) return false;

  if (move_uploaded_file($f["tmp_name"], $newfile))	return $newfile;

  return false;

}

function GetMedia($link,$w,$h)
{
if (!isset($link)) return;

if ($w) $w="width=".$w;
if ($h) $h="height=".$h;

		$ext=GetFileExtention($link);
		switch ($ext)
		{
			case ".swf":
?>			
				<object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj5" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" <? echo $w; ?> <? echo $h; ?>>
				<param name="movie" value="<? echo $link; ?>">
				<param name="quality" value="High">
				<embed src="'.$link.'" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj5" <? echo $w; ?> <? echo $h; ?> quality="High"></object>
<?
				break;
			case ".gif":
			case ".jpg":
			case ".bmp":
			case ".png":
?>
                        <img <? echo $w; ?> <? echo $h; ?> border="0" src="<? echo $link; ?>">
<?
				break;		
			default:
				break; 
		}
}

function GetMediao($link)

	{

		$ret="";

		$ext=GetFileExtention($link);

		switch ($ext)

		{

			case ".swf":

				$ret='<object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj5" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="468" height="90">';

				$ret.='<param name="movie" value="'.$link.'">';

				$ret.='<param name="quality" value="High">';

				$ret.='<embed src="'.$link.'" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj5" width="468" height="90" quality="High"></object>';

				break;

			case ".gif":

			case ".jpg":

			case ".bmp":

			case ".png":

				$ret='<img border="0" src="'.$link.'">';

				break;		

			default:

				break; 

		}

		return $ret;

	}

function GetMedia1($link)

	{

		$ret="";

		$ext=GetFileExtention($link);

		switch ($ext)

		{

			case ".swf":

				$ret='<object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj5" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="440" height="80">';

				$ret.='<param name="movie" value="'.$link.'">';

				$ret.='<param name="quality" value="High">';

				$ret.='<embed src="'.$link.'" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj5" width="440" height="80" quality="High"></object>';

				break;

			case ".gif":

			case ".jpg":

			case ".bmp":

			case ".png":

				$ret='<img border="0" src="'.$link.'">';

				break;		

			default:

				break; 

		}

		return $ret;

	}



function checkemail($email)

{

	if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) 

		return false;

	return true;

}



function sendmail1($from,$to,$subject,$body)

{

	/*

	return mail_smtp($from,$to,$subject,$body,1);

	*/

		$mailheaders = "MIME-Version: 1.0\r\n";

		$mailheaders .= "Content-type: text/html; charset=windows-1252\r\n";

		$mailheaders .= "From: <".$from."> \n";

		$mailheaders .= "Reply-To: ".$from;

		return mail($to, $subject, $body, $mailheaders,"-fwebmaster@{$_SERVER['SERVER_NAME']}");

}

function sendmail($from,$to,$subject,$body)

{
	return mail_smtp($from,$to,$subject,$body,1);
}


function mail_smtp($from,$to,$subject,$body,$html=0)

{

	require_once("smtp.php");



	/* Uncomment when using SASL authentication mechanisms */

	/*

	require("sasl.php");

	*/



	//$from=""; /* Change this to your address like "me@mydomain.com"; */

	//$to="";                        /* Change this to your test recipient address */



	$smtp=new smtp_class;



	$smtp->host_name="localhost";       /* Change this variable to the address of the SMTP server to relay, like "smtp.myisp.com" */

	$smtp->localhost="localhost";       /* Your computer address */

	$smtp->direct_delivery=0;           /* Set to 1 to deliver directly to the recepient SMTP server */

	$smtp->timeout=10;                  /* Set to the number of seconds wait for a successful connection to the SMTP server */

	$smtp->data_timeout=0;              /* Set to the number seconds wait for sending or retrieving data from the SMTP server.

	                                       Set to 0 to use the same defined in the timeout variable */

	$smtp->debug=0;                     /* Set to 1 to output the communication with the SMTP server */

	$smtp->html_debug=1;                /* Set to 1 to format the debug output as HTML */

	$smtp->pop3_auth_host="";           /* Set to the POP3 authentication host if your SMTP server requires prior POP3 authentication */

	$smtp->user="";                     /* Set to the user name if the server requires authetication */

	$smtp->realm="";                    /* Set to the authetication realm, usually the authentication user e-mail domain */

	$smtp->password="";                 /* Set to the authetication password */

	$smtp->workstation="";              /* Workstation name for NTLM authentication */

	$smtp->authentication_mechanism=""; /* Specify a SASL authentication method like LOGIN, PLAIN, CRAM-MD5, NTLM, etc..

	                                       Leave it empty to make the class negotiate if necessary */



	/*

	 * If you need to use the direct delivery mode and this is running under

	 * Windows or any other platform that does not have enabled the MX

	 * resolution function GetMXRR() , you need to include code that emulates

	 * that function so the class knows which SMTP server it should connect

	 * to deliver the message directly to the recipient SMTP server.

	 */

	if($smtp->direct_delivery)

	{

		if(!function_exists("GetMXRR"))

		{

			/*

			* If possible specify in this array the address of at least on local

			* DNS that may be queried from your network.

			*/

			$_NAMESERVERS=array();

			include("getmxrr.php");

		}

		/*

		* If GetMXRR function is available but it is not functional, to use

		* the direct delivery mode, you may use a replacement function.

		*/

		/*

		else

		{

			$_NAMESERVERS=array();

			if(count($_NAMESERVERS)==0)

				Unset($_NAMESERVERS);

			include("rrcompat.php");

			$smtp->getmxrr="_getmxrr";

		}

		*/

	}



	$header="";

	if ($html==0)

		$header=array(

			"From: $from",

			"To: $to",

			"Subject: $subject",

			"Date: ".strftime("%a, %d %b %Y %H:%M:%S %Z"));

	else

		$header=array(

			"MIME-Version: 1.0",

			"Content-type: text/html; charset=iso-8859-1",

			"From: $from",

			"To: $to",

			"Subject: $subject",

			"Date: ".strftime("%a, %d %b %Y %H:%M:%S %Z"));

	$ret=$smtp->SendMessage($from,array($to),$header,$body);

	return $ret;

}



function insert($table,$fields_arr) {

  global $con;

  if (!$con) { return false; }

  $strfields="";

  $strvalues="";

  list($key, $val) = each($fields_arr);

  if(is_string($key))

	{

	$strfields = " ($key";

	$strvalues= $val;

	while(list($key, $val) = each($fields_arr))

		{

		$strfields.= ", $key";

		$strvalues.= ",". $val;

		}

	$strfields.=")";

	}

  else

	{

	$strvalues=$fields_arr[0];

    for($i=1;$i<(count($fields_arr));$i++)

		{

	      $strvalues .= ", $fields_arr[$i]";

		}

  	}



  $query = "INSERT INTO $table $strfields VALUES ($strvalues)";

  //echo $query;

  return mysql_query($query, $con);

}



function update($table,$id,$valueid,$fields_arr,$where_ext="",$ischangepassword = 0) {

  global $con;

  if (!$con) { return false; }

  list($key, $val) = each($fields_arr);

  $strset=" $key = $val";

  while(list($key, $val) = each($fields_arr)){

    $strset .= ", $key = $val";

  }



  $query = "UPDATE $table SET

            $strset

           WHERE $id='$valueid' $where_ext"; 

  #echo $query."<br>";

  $result = mysql_db_query($query, $con);

  if (!$result) { return false; }

  else 

  	if($ischangepassword ==1 && mysql_affected_rows() == 0) return false;

	 else return true;

}



function delete_rows($table,$fields_arr,$where_ext="") {

  global $con;

  if (!$con) { return false; }

  if(count($fields_arr)>0){

     list($key, $val) = each($fields_arr);

     $strwhere=" $key = $val";

     while(list($key, $val) = each($fields_arr)){

       $strwhere .= "OR $key = $val";

     }

  }



  $query = "DELETE FROM $table

            WHERE $strwhere $where_ext";      

	#echo $query;#exit;

  $result = mysql_query($query, $con);

  if (!$result) {

    return false;

  }

  return true;

}



function count_record($table,$where_ext = ""){

  global $con;

  if (!$con) { return false; }

  $query = "SELECT count(*) FROM $table ";

  if($where_ext != "")

	  $query.= " WHERE " . $where_ext;

  //echo $query,"<br>"; 

  $result = mysql_query($query, $con);

  if ($result) {

    $rows = mysql_fetch_row($result);

    return $rows[0];

  } else {

    return false;

  }



}



function query_get($query) {

  global $con;

  if (!$con) { return false; }

  $result = mysql_query($query, $con);

  if ($result) {

    while ($rows = mysql_fetch_array($result)) {

      $return[] = $rows;

    }

    return $return;

  } else {

    return false;

  }

}



function query_get_list($query, $begin, $limit,$where_ext="",$orderby="") {

  global $con;

  if (!$con) { return false; }

  $return=array();

  $query1 = $query;

  if($where_ext<>"")

	$query1 .= " WHERE " .$where_ext;

  

  $query1.= $orderby;



  if($begin >=0 && $limit > 0)

	 $query1 .=" LIMIT $begin, $limit ";

echo $quety1;

  $result = mysql_query($query1, $con);

  if ($result) {

    while ($rows = mysql_fetch_array($result)) {

      $return[] = $rows;

    }



    return $return;

  } else {

    return false;

  }

}

?>