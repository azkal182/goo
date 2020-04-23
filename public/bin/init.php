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
function register($no)
	{
	$nama = nama();
	$email = str_replace(" ", "", $nama) . mt_rand(100, 999);
	$data = '{"name":"' . $nama . '","email":"' . $email . '@gmail.com","phone":"+' . $no . '","signed_up_country":"ID"}';
	$register = request("/v5/customers", "", $data);
	//print_r($register);
	if ($register['success'] == 1)
		{
		return $register['data']['otp_token'];
		}
	  else
		{
      save("error_log.txt", json_encode($register));
		return false;
		}
	}
function verif($otp, $token)
	{
	$data = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $token . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
	$verif = request("/v5/customers/phone/verify", "", $data);
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
      save("error_log.txt", json_encode($verif));
		return false;
		}
	}
	function login($no)
	{
	$nama = nama();
	$email = str_replace(" ", "", $nama) . mt_rand(100, 999);
	$data = '{"phone":"+'.$no.'"}';
  // print_r($data);
  // die();
	$register = request("/v4/customers/login_with_phone", "", $data);

	//print_r($register);
	if ($register['success'] == 1)
		{
		return $register['data']['login_token'];
		}
	  else
		{
      save("error_log.txt", json_encode($register));
		return false;
		}
	}
function veriflogin($otp, $token)
	{
	$data = '{"client_name":"gojek:cons:android","client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e","data":{"otp":"'.$otp.'","otp_token":"'.$token.'"},"grant_type":"otp","scopes":"gojek:customer:transaction gojek:customer:readonly"}';
	$verif = request("/v4/customers/login/verify", "", $data);

    $_SESSION['otp_token'] = request("/v4/customers/login/verify", "", $data);

	if ($verif['success'] == 1)
		{

      $myfile = fopen("sukses_log.txt", "w") or die("Unable to open file!");
      $txt = json_encode($verif);
      fwrite($myfile, $txt);
      fclose($myfile);






      //save("sukses_log.txt", json_encode($verif));
      // $json = json_encode($verif)
      // $resulta = $verif->data->access_token;
      //
      // return $resulta;

		return $verif['data']['access_token'];
		}
	  else
		{
      $salah = date("h:i:sa") . " - " . json_encode($verif);
      save("error_log.txt", $salah);
      // save("error_log.txt", json_encode($verif));
		return false;
		}
	}
function claim($token, $voucher)
	{

    for ($i = 0; $i < count($voucher); $i++){
      $data = '{"promo_code":' . $voucher[$i] . '"}';
    	$claim = request("/go-promotions/v1/promotions/enrollments", $token, $data);
    	if ($claim['success'] == 1)
    		{
    		return $claim['data']['message'];
    		}
    	  else
    		{
          save("error_log.txt", json_encode($claim));
    		return false;
    		}
    }
	// $data = '{"promo_code":"GOFOODHEMAT1"}';
	// $claim = request("/go-promotions/v1/promotions/enrollments", $token, $data);
	// if ($claim['success'] == 1)
	// 	{
	// 	return $claim['data']['message'];
	// 	}
	//   else
	// 	{
  //     save("error_log.txt", json_encode($claim));
	// 	return false;
	// 	}
	}

// claim(array('1','2','3'), '20');


// function showUser($id, $user){
//   // print_r($user);
//   for ($i = 0; $i < count($user); $i++){
//     echo "ini id  $id  = ini user $user[$i] \n";
//     sleep(2);
//   }
//   //return "selesai";
// }
//
// $arra = ["azkal", "arif", "DKK"];
// showUser(90, $arra);
// $t = 'GOFOODHEMAT1';
// $data = '{"promo_code":"' . $t . '"}';
// echo $data;


//
// system('clear');
// echo " [1]. generate ( buat NIK & KK)\n";
// echo " [2]. cek (NIK & KK)\n";
// echo " [0]. home\n";
//
//
//
//
//
// $pilih = trim(fgets(STDIN));
// if ($pilih == "1"):
//
//     echo "generate KK \n";
// elseif ($pilih == "2"):
//      echo "nomor 2 \n";
// elseif ($pilih == "3"):
//
//    endif;
 ?>
