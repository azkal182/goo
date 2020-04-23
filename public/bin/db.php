<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "gojek";
$koneksi = mysqli_connect("localhost","root","","gojek");

$data = mysqli_query($koneksi,"select * from tkp");




    echo '<div class="form-group">
      <label for="exampleFormControlTextarea1">Log</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"> ';

      while($d = mysqli_fetch_array($data)){
        echo $d['id'] . " - " . $d['tkp'] . "\n";
        sleep(1);

      }


      echo '</textarea>
    </div>';

 ?>
