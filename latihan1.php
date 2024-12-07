<?php
class produk{
public $nama= "Sabun" ;
public $harga= 3000;
public $merk= "harmoni";
public $stok= 12;
public function pemesanan(){
    return "pemesanan selesai...";
}
}
$tv = new produk();
echo $tv->nama;
echo "<br>";
echo $tv->harga;
echo "<br>";
echo $tv->merk;
echo "<br>";
echo $tv->stok;
echo "<br>";
echo $tv->pemesanan();
?>