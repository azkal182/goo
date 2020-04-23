<?php
include 'bin/init.php';
session_start();

if (isset($_POST['data'])&&!empty($_POST['data'])){
  $otp = $_POST['data'];
  $login = 	$_SESSION['otp_token'];
  $login = veriflogin($otp, $login);

  if($login == false){
    return false;
  } else {





    $data = file_get_contents('sukses_reg.txt');
    $json = json_decode($data,true);
    $save = $json["data"]["access_token"];


    $myfile = fopen("sessions.txt", "w") or die("Unable to open file!");
    $txt = $save;
    fwrite($myfile, $txt);

    fclose($myfile);


     $_SESSION['access_token'] = $save;
    echo ' <h5 class="modal-title" id="exampleModalLongTitle">Token :' . $_SESSION['access_token'] . '</h5>';

  }







}

 ?>
