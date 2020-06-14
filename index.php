<?php
require_once 'App/init.php';

$produk1 = new Game("Ml", "none", "moonton", "free", "Unlimited");
$produk2 = new Komik("Naruto", "Mashasi", "shonen", "30000", "100");

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();
