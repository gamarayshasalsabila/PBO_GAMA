<?php
class Mahasiswa {
    // Atribut
    public $nama;
    public $nim;
    public $prodi;

    // Constructor
    public function __construct($nama, $nim, $prodi) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->prodi = $prodi;
    }

    // Metode untuk menampilkan data mahasiswa
    public function tampilkanDataMahasiswa() {
        echo "Nama: " . $this->nama . "<br>";
        echo "NIM: " . $this->nim . "<br>";
        echo "Prodi: " . $this->prodi . "<br>";
    }
}

// Contoh penggunaan
$mahasiswa = new Mahasiswa("Maya Aulia permata", "21012395", "Teknik Informatika");
$mahasiswa->tampilkanDataMahasiswa();
echo "<br>";
$mahasiswa = new Mahasiswa("Cinta", "76543987", "Teknik Elektro");
$mahasiswa->tampilkanDataMahasiswa();

?>


