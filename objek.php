<?php
interface InfoProduk
{
    public function getInfoProduk();
}
abstract class Produk
{
    protected $judul, $penulis, $penerbit, $harga;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function setJudul($judul)
    {
        $this->judul = $judul;
    }
    public function getJudul()
    {
        return $this->judul;
    }
    public function setPenulus($penulis)
    {
        $this->penulis = $penulis;
    }
    public function getPenulis()
    {
        return $this->penulis;
    }

    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }
    abstract public function getInfo();
}

class Komik extends Produk implements InfoProduk
{
    public $jmlHalaman;
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk()
    {
        $str = "Komik : " . $this->getInfo() . " {$this->jmlHalaman} Halaman";
        return $str;
    }
    public function getInfo()
    {
        $str = "{$this->judul}  | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
}
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
        $str = "{$this->judul}  | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
}
class CetakInfoProduk
{
    public $daftarProduk = array();

    public function tambahProduk(Produk $produk)
    {
        $this->daftarProduk[] = $produk;
    }

    public function cetak()
    {
        $str = "DAFTAR PRODUK: <br>";

        foreach ($this->daftarProduk as $p) {
            $str .= "-{$p->getInfoProduk()}<br>";
        }
        return $str;
    }
}
$produk1 = new Game("Ml", "none", "moonton", "free", "Unlimited");
$produk2 = new Komik("Naruto", "Mashasi", "shonen", "30000", "100");

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();
