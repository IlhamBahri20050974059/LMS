@extends('layouts.app') {{-- Sesuaikan dengan layout utama --}}
@section('content')

<div class="container">
    <h1 class="mt-4">BAB 7: Pemrograman Berorientasi Objek (OOP) Dasar</h1>

    <h2 class="mt-3">A. Membuat dan Menggunakan Class serta Object</h2>
    <p>Dalam C++, pemrograman berorientasi objek (OOP) memungkinkan kita untuk membuat blueprint menggunakan class dan menciptakan objek dari class tersebut.</p>

    <h3>1. Contoh Class dan Object</h3>
    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

class Mobil {
public:
    string merk;
    int tahun;

    void tampilkanInfo() {
        cout << "Merk: " << merk << ", Tahun: " << tahun << endl;
    }
};

int main() {
    Mobil m1;
    m1.merk = "Toyota";
    m1.tahun = 2022;

    m1.tampilkanInfo();

    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">B. Memahami Konsep Enkapsulasi (private, public)</h2>
    <p>Enkapsulasi adalah konsep menyembunyikan data dalam class dengan menggunakan akses modifier `private` dan `public`.</p>

    <h3>1. Contoh Enkapsulasi</h3>
    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

class AkunBank {
private:
    double saldo;

public:
    AkunBank(double s) { saldo = s; }

    void setSaldo(double s) { saldo = s; }
    double getSaldo() { return saldo; }
};

int main() {
    AkunBank akun(1000);
    
    akun.setSaldo(500);
    cout << "Saldo saat ini: " << akun.getSaldo() << endl;

    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">C. Menggunakan Constructor dan Destructor</h2>
    <p>Constructor adalah fungsi khusus yang dipanggil saat objek dibuat. Destructor dipanggil saat objek dihancurkan.</p>

    <h3>1. Contoh Constructor dan Destructor</h3>
    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

class Mahasiswa {
public:
    string nama;

    Mahasiswa(string n) { 
        nama = n; 
        cout << "Mahasiswa " << nama << " dibuat." << endl;
    }

    ~Mahasiswa() { 
        cout << "Mahasiswa " << nama << " dihapus." << endl;
    }
};

int main() {
    Mahasiswa m1("Budi");

    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">Latihan</h2>
    <ol>
        <li>Buat class `Buku` dengan atribut `judul` dan `penulis`, serta fungsi untuk menampilkan informasinya.</li>
        <li>Tambahkan konstruktor dalam class `Buku` yang menerima parameter untuk mengisi nilai atribut.</li>
        <li>Buat class `Rekening` dengan saldo yang hanya bisa diubah dengan metode `setSaldo()` dan diakses dengan `getSaldo()`.</li>
    </ol>

    <hr>

    {{-- Tombol Navigasi --}}
    <div class="text-center mt-4">
        <a href="/materi6" class="btn btn-secondary">Kembali ke BAB 6</a>
        <a href="/materi8" class="btn btn-primary">Lanjut ke BAB 8</a>
    </div>

</div>

<style>
    .code-box {
        background-color: #222;
        color: #fff;
        padding: 15px;
        border-radius: 5px;
        font-family: monospace;
        overflow-x: auto;
    }
</style>

@endsection
