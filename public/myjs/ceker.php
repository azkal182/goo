<?php


//$token = trim(fgets(STDIN));
//$secret = ''.$token.'';
session_start();
$header = array();
$header[] = 'Content-Type: application/json';
$header[] = 'X-AppVersion: 3.46.2';
$header[] = "X-UniqueId: ".time()."57".mt_rand(1000,9999);
$header[] = 'X-Location: id_ID';
$header[] ='Authorization: Bearer '.$_SESSION['access_token'];
//$header[] = 'pin:'.$pin.'';



function curl($url, $fields = null, $headers = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if ($fields !== null) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        }
        if ($headers !== null) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        $result   = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return array(
            $result,
            $httpcode
        );
	}

// if (isset($_POST['data'])&&!empty($_POST['data'])){

  $detail_voucher = curl('https://api.gojekapi.com/gopoints/v3/wallet/vouchers?limit=10&page=1', null, $header);
       $vouchers = json_decode($detail_voucher[0]);
       // print_r($vouchers->data[0]->title);
       // print_r($vouchers->data[1]->title);
       // print_r($vouchers->data[2]->title);
       // print_r($vouchers->data[3]->title);
       // print_r($vouchers->voucher_stats->total_vouchers);
       //
       //
       // die();


       if ($vouchers->voucher_stats->total_vouchers == 0){
         echo "Anda tidak punya voucher aktif";
       } else {

         $total_voucher = $vouchers->voucher_stats->total_vouchers;
         $nama_voucher = $vouchers->data[0]->title;


         echo "Kamu Punya " . $total_voucher . " Voucher GOJEK \n\n";
         for ($i = 0; $i < $total_voucher; $i++) {

           echo "[" . $i . "] Voucher " . $vouchers->data[$i]->title . "\n";
           echo  "     kadaluarsa " . $vouchers->data[$i]->expiry_date . "\n\n";

         }
         //print_r($vouchers);
       }






































 ?>
