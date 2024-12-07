<?php

class BarangManager {
    private $dataFile = 'data.json';
    private $barangList = [];

    public function __construct(){
        if (file_exists($this->dataFile)) {
            $data = file_get_contents($this->dataFile);
            $this->barangList = json_decode($data, true) ?? []; // Menggunakan array asosiatif
        }
    }

    // Menambahkan barang
    public function tambahBarang($nama, $harga, $stok){
        $id = uniqid(); // Generate ID unik
        $barang = ['id' => $id, 'nama' => $nama, 'harga' => $harga, 'stok' => $stok]; // Menyimpan sebagai array
        $this->barangList[] = $barang;
        $this->simpanData();
    }

    // Mendapatkan semua barang
    public function getBarang(){
        return $this->barangList;
    }

    // Menghapus barang berdasarkan ID
    public function hapusBarang($id){
        // Menyaring barang berdasarkan ID
        $this->barangList = array_filter($this->barangList, function($barang) use ($id){
            return $barang['id'] !== $id; // Menghapus barang dengan ID yang sesuai
        });

        // Menyusun ulang indeks array
        $this->barangList = array_values($this->barangList);

        $this->simpanData();
    }

    // Menyimpan Data ke file JSON
    private function simpanData(){
        file_put_contents($this->dataFile, json_encode($this->barangList, JSON_PRETTY_PRINT));
    }
}
?>