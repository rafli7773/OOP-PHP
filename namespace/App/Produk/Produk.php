<?php
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
