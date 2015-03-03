<?php


 

if (isset($_POST["somename"])) {
  session_start();
  	error_reporting(E_ALL); ini_set('display_errors', 1);
  	include("EstablishAccess.php");
	$connctn = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
    if (!$connctn) {
        die('Not connected : ' . mysql_error());
    }
    // make foo the current db
    $db_selected = mysql_select_db('BetaPoints', $connctn);
    if (!$db_selected) {
        die ('Can\'t use foo : ' . mysql_error());
    }
 
 	$myvar = $_POST["somename"];
 
	$query="SELECT Etype FROM evets where EName='".$myvar."'";
	$result=mysql_query($query)
	or die("Could not execulte query");
	$row=mysql_fetch_array($result,MYSQL_ASSOC);
	
	$mychkvl = $row['Etype'];

		 
	 	
	
	
	//$uname=$_POST["username"];
	//$pwrd=$_POST["password"];
 if($mychkvl=="1"){
$queryz= "INSERT INTO userandevents(zeta,eID) VALUES('".$_SESSION['zeta']."','". $_POST['somename']."')";
	$result=mysql_query($queryz) 
	or die("ERROR");
	
				  
				echo "Added to database" ;
			//echo  $row['Etype'] ;
			  //include "testDone.html";
		 }else if ($mychkvl=="0"){
			 
				
				
				
			$myvar = $_POST["somename"];
 			$myzeta = $_SESSION["zeta"];
			
	 $query="SELECT * FROM userandevents where zeta='$myzeta' AND eID='$myvar'";
	
	
		//$query="SELECT * FROM login WHERE username='$uname' AND password='$pwrd'";
	$result=mysql_query($query)
	or die("Could not execulte query");
	
		if($row=mysql_fetch_array($result,MYSQL_ASSOC)) {
			
				echo "This is only single EVENT user already in" ;
			
			}else {
				
				$queryz= "INSERT INTO userandevents(zeta,eID) VALUES('".$_SESSION['zeta']."','". $_POST['somename']."')";
	$result=mysql_query($queryz) 
	or die("ERROR");
	
				  
				 echo "Added to database" ;
				 
				}
				
				
			 }else {}
		/*}else{
			 //header('Location:sign&log.html');
			  include "sign&log.html";
			 ?>
			 
			  <script type="text/javascript">
        		alert("Invalied Usename or Password");
        		</script>
			 
			 <?php

			 
			
	 		 
		} */

} else if (isset($_POST["usernamesignup"])) {

	$sgnname=$_POST["usernamesignup"];
	$sgnpwd= $_POST["passwordsignup"];
	$sgnemail=$_POST["emailsignup"];
	$gender= $_POST["gender"];
	
	//echo "$sgnname <br>";
	//echo "$sgnpwd <br>";
	//echo "$sgnemail<br>";
	//echo "$gender <br>";
	include("EstablishAccess.php");
	$connctn = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
    if (!$connctn) {
        die('Not connected : ' . mysql_error());
    }
    // make foo the current db
    $db_selected = mysql_select_db('BetaPoints', $connctn);
    if (!$db_selected) {
        die ('Can\'t use foo : ' . mysql_error());
    }
	
	//$uname=$_POST["username"];
	//$pwrd=$_POST["password"];
	$query= "INSERT INTO login(username,password,email,gender) VALUES('$sgnname','$sgnpwd','$sgnemail','$gender')";
	$result=mysql_query($query)
	or die("User Already Exist");
	
	 include 'sign&log.html';
}



 
?>