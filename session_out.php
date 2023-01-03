<?php
session_start();
session_destroy();
header("Location:ADMIN_LOGIN_FORM(1).php");
?>