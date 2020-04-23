<?php
include 'bin/init.php';
session_start();


if (isset($_POST['data'])&&!empty($_POST['data'])){
    $get = $_POST['data'];



    $_SESSION['otp_token'] = register($get);
    		if (  $_SESSION['otp_token'] == false)
    			{
            return false;
    			//echo "error";
    			}
    			else
    			{
    		echo $_SESSION['otp_token'];
    			}

  echo $_POST['data'];
} else {
  return false;
  //echo "error";
}

 ?>
