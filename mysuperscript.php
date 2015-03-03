<?php

 
if (isset($_POST["username"])) {
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
	
	$uname=$_POST["username"];
	$pwrd=$_POST["password"];
	$query="SELECT * FROM login WHERE username='$uname' AND password='$pwrd'";
	$result=mysql_query($query)
	or die("Could not execulte query");
	
		if($row=mysql_fetch_array($result,MYSQL_ASSOC)){
			 //echo "{$row['username']}";
			 session_start();
			 $_SESSION['userNM']=$_POST["username"] ;
			 $_SESSION['zeta']=$_POST["password"] ;
			// header('Location:main.html');
 			include 'main.php';
			
			
			$queryz = "SELECT EName FROM evets" ;
			$resultz = mysql_query($queryz);
			echo '<form  action="action_page1.php" method="POST"  >';
			echo'<select name="somename" class="center-block" style="float:left; margin: 20px 0 0 112px; " >';
				while($row = mysql_fetch_assoc( $resultz )) { 
        		echo '<option value="'.$row['EName'].'">' . $row['EName'] . '</option>';   
				}
			echo '</select>';
				echo '</br>';
			echo '.   .';
			 
			 
			echo '<input type="submit" class="btn btn-default" value="Submit">';
			echo '</form>';
			
		}else{
			 //header('Location:sign&log.html');
			  include "sign&log.html";
			 ?>
			 
			  <script type="text/javascript">
        		alert("Invalied Usename or Password");
        		</script>
			 
			 <?php

			 
			
	 		 
		}

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