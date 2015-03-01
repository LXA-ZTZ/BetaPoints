<?php
require ("EstablishAccess.php");
session_start();
if(isset($_SESSION['userNM'])){
 
}else{
	 header('Location:sign&log.html') ;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a  class="nav navbar-nav" href="main.php">Add Beta Points</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul>
                    <li>
                        <a href="#"  class="nav navbar-nav">View Events</a>
                    </li>
                    <li>
                        <a href="viewBeta.php" class="navbar-brand">View Beta Points</a>
                    </li>
                    <li>
                        <a href="#"  class="nav navbar-nav" >Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
    	<div class="center-block">
 
      
   <?php
   $connctn=mysql_connect('localhost','root','root')
	or die("cnnot connect to database");
	mysql_selectdb('BetaPoints')
	or die('cannot select database');
	
 
		$query = "SELECT zeta,eID FROM userandevents";
		$result=mysql_query($query)
	or die("Could not execulte query");

 
     echo "<table><tr><th>zeta &nbsp; &nbsp;  </th><th>Event Name</th></tr>";
     // output data of each row
     while($row = mysql_fetch_assoc($result)) {
         echo "<tr><td>" . $row["zeta"]. "</td><td>" . $row["eID"]. "  </td></tr>";
     }
     echo "</table>";
 

?>

    	 
    	</div>
    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
