<?php

date_default_timezone_set("Asia/Bangkok");

function request($url, $token = null, $data = null, $pin = null, $location = null){

$header[] = "Host: api.gojekapi.com";
$header[] = "User-Agent: okhttp/3.12.1";
$header[] = "Accept: application/json";
$header[] = "Accept-Language: en-ID";
$header[] = "Content-Type: application/json; charset=UTF-8";
$header[] = "X-AppVersion: 3.48.2";
$header[] = "X-UniqueId: ".time()."57".mt_rand(1000,9999);
$header[] = "Connection: keep-alive";
$header[] = "X-User-Locale: en_ID";
$header[] = "X-Location: -6.1937412,106.8205147";


// if ($location){
//   $header[] = "X-Location: $location";
// } else {
  if ($pin){
    $header[] = "pin: $pin";
  }

if ($token){
  $header[] = "Authorization: Bearer $token";
}
// if ($location):
// $header[] = "X-Location: $location";
// if ($pin):
// $header[] = "pin: $pin";
//     endif;
// if ($token):
// $header[] = "Authorization: Bearer $token";
// endif;
$c = curl_init("https://api.gojekapi.com".$url);
    curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    if ($data):
    curl_setopt($c, CURLOPT_POSTFIELDS, $data);
    curl_setopt($c, CURLOPT_POST, true);
    endif;
    curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_HEADER, true);
    curl_setopt($c, CURLOPT_HTTPHEADER, $header);
    $response = curl_exec($c);
    $httpcode = curl_getinfo($c);
    if (!$httpcode)
        return false;
    else {
        $header = substr($response, 0, curl_getinfo($c, CURLINFO_HEADER_SIZE));
        $body   = substr($response, curl_getinfo($c, CURLINFO_HEADER_SIZE));
    }
    $json = json_decode($body, true);
    return $json;
}
function save($filename, $content)
{
	$save = fopen($filename, "a");
	fputs($save, "$content\r\n");
	fclose($save);
}

function nama()
	{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://ninjaname.horseridersupply.com/indonesian_name.php");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$ex = curl_exec($ch);
	// $rand = json_decode($rnd_get, true);
	preg_match_all('~(&bull; (.*?)<br/>&bull; )~', $ex, $name);
	return $name[2][mt_rand(0, 14) ];
	}





  function verif($otp, $token)
	{
	$data = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $token . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
	$verif = request("/v5/customers/phone/verify", "", $data);
  $_SESSION['otp_token'] = request("/v4/customers/login/verify", "", $data);
	if ($verif['success'] == 1)
		{
      $myfile = fopen("sukses_reg.txt", "w") or die("Unable to open file!");
      $txt = json_encode($verif);
      fwrite($myfile, $txt);
      fclose($myfile);

		return $verif['data']['access_token'];
		}
	  else
		{
      $salah = date("h:i:sa") . " - " . json_encode($verif);
      save("error_reg.txt", $salah);
      //save("error_log.txt", json_encode($verif));
		return false;
		}
	}



session_start();

if (isset($_POST['data'])&&!empty($_POST['data'])){
  $otp = $_POST['data'];
  $login = 	$_SESSION['otp_token'];
  $login = verif($otp, $login);

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
