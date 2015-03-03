<?php
session_start();
if(isset($_SESSION['userNM'])){
    include("EstablishAccess.php");
}else{
	 header('Location:sign&log.html') ;
     include("EstablishAccess.php");
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
                <a class="navbar-brand" href="#">Beta Points</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Add Beta Points</a>
                    </li>
                    <li>
                        <a href="viewBeta.php">View Beta Points</a>
                    </li>
                    <li>
                        <a href="logout.php">logout</a>
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
 
 		$myzeta = $_SESSION["zeta"];
		echo "</br>";
		echo "</br>";
		echo "<b>results for  user zeta : $myzeta </b>";
		echo "</br>";
		echo "</br>";
		//$query = "SELECT eID as EventNames,COUNT(*) as Eventcounts FROM userandevents GROUP BY eID";
		$query = "SELECT t1.eID as EventNames,t2.EValue as EventValue,COUNT(*) as EventOccurence FROM userandevents t1,evets t2 WHERE t1.eID=t2.EName  AND t1.zeta=". $myzeta . " GROUP BY t1.eID";
		$result=mysql_query($query)
	or die("Could not execulte query");

 
     echo "<table><tr><th>EventNames  &nbsp; &nbsp;  </th><th>   EventValue &nbsp; &nbsp;   </th>   &nbsp; &nbsp;  </th><th>   EventOccurence</th></tr>";
     // output data of each row
	 $mytCnt=0;
     while($row = mysql_fetch_assoc($result)) {
        echo "<tr><td>" . $row["EventNames"]. "</td><td>" . $row["EventValue"]."</td><td>" . $row["EventOccurence"]. "  </td></tr>";
		  $mytCnt+=$row["EventValue"] * $row["EventOccurence"] ;
		 
     }
	  echo "<tr><td> <b> Total :  </b> </td><td> <b>" . $mytCnt. " </b> </td></tr>";
	 
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
