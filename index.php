<?php

session_start(); 

if(isset($_SESSION['userNM'])){
include 'main.php';
}else{
	 header('Location:sign&log.html') ;
}



?>