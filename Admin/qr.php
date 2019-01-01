<?php
    include "phpqrcode/qrlib.php";
    // $isi_teks = $_GET['id'];
    // define('BASE_DIR', dirname(__FILE__).'/');
    // $namafile = BASE_DIR."coba.png";
    // $quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
    // $ukuran = 5; //batasan 1 paling kecil, 10 paling besar
    // $padding = 0;
    
    // QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
    QRCode::png($_GET['id'],false,"L",5,0);
?>