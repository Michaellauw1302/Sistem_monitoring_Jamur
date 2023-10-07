<?php
error_reporting();
//koneksi database
$konek = mysqli_connect("localhost", "root", "", "dbmultisensor");

//baca data dari tabel datasensor
$sql = mysqli_query($konek, "select * from multisensor order by id desc"); //data terbaru yang tampil
$data = mysqli_fetch_array($sql);
$kel_tanah = $data['kel_tanah'];

//uji apabila nilai suhu belum ada, maka anggap suhu itu = 0
if ($kel_tanah == "") $tanah = 0;
echo $kel_tanah;

if ($kel_tanah <= 100) {
  echo "
             %<br>
         <div class='alert alert-primary' role='alert' style='width: 100%; margin-top:2%;'>
              <div style='font-size: 12px;'>
             Tanah masih basah...
              </div>
            </div>
                  
            ";
} else if ($kel_tanah <= 60) {
  echo "
            %<br>
         <div class='alert alert-primary' role='alert' style='width: 100%; margin-top:2%;'>
              <div style='font-size: 12px;'>
             Kelembaban tanah masih cukup...
              </div>
            </div>";
} else
  echo "
          RH<br>
         <div class='alert alert-danger' role='alert' style='width: 100%; margin-top:2%;'>
              <div style='font-size: 12px;'>
             Tanah kering, nyalakan pompa...
              </div>
            </div>
    ";
