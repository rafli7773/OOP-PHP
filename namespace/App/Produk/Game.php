<?php
class Game extends Produk implements InfoProduk
{
    public $waktuMain;
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0)
    {
        parent::__construct($judul, $penerbit, $penulis, $harga);
        $this->waktuMain = $waktuMain;
    }
    public function getInfoProduk()
    {
        $str = "Game: " . $this->getInfo() . " {$this->waktuMain}";
        return $str;
    }
    public function getInfo()
    {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
}
