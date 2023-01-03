<?php
session_start();

function AdminSession(){
	if(!isset($_SESSION['ValidAdmin'])){
		header("Location:ADMIN_LOGIN_FORM(1).php");
		return;
	}
	return TRUE;


}

?>