<?php


 require ("EstablishAccess.php");

if (isset($_POST["somename"])) {
  session_start();
  	

	$connctn=mysql_connect($DB_HOST,$DB_USER,$DB_PASSWORD)
	or die("cnnot connect to database");
	mysql_selectdb('social')
	or die('cannot select database');
 
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
	
	$connctn=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD)
	or die("cnnot connect to database");
	mysql_selectdb('social')
	or die('cannot select database');
	
	//$uname=$_POST["username"];
	//$pwrd=$_POST["password"];
	$query= "INSERT INTO login(username,password,email,gender) VALUES('$sgnname','$sgnpwd','$sgnemail','$gender')";
	$result=mysql_query($query)
	or die("User Already Exist");
	
	 include 'sign&log.html';
}



 
?>