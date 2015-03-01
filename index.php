<?php

session_start(); 

if(isset($_SESSION['userNM'])){
include 'main.php';
require ("EstablishAccess.php");

}else{
	 header('Location:sign&log.html') ;
	 
}



?>