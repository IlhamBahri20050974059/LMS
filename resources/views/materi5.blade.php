@extends('layouts.app') {{-- Sesuaikan dengan layout utama --}}
@section('content')

<div class="container">
    <h1 class="mt-4">BAB 5: Array dan String</h1>

    <h2 class="mt-3">A. Mendeklarasikan dan Mengakses Elemen Array Satu Dimensi</h2>
    <p>Array adalah kumpulan elemen yang memiliki tipe data yang sama.</p>

    <h3>1. Contoh Deklarasi dan Akses Array</h3>
    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    int angka[5] = {10, 20, 30, 40, 50};

    cout << "Elemen pertama: " << angka[0] << endl;
    cout << "Elemen terakhir: " << angka[4] << endl;

    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">B. Menggunakan Array Dua Dimensi untuk Tabel/Data Sederhana</h2>
    <p>Array dua dimensi digunakan untuk menyimpan data dalam bentuk tabel.</p>

    <h3>1. Contoh Deklarasi dan Akses Array 2D</h3>
    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    int matriks[2][3] = { {1, 2, 3}, {4, 5, 6} };

    cout << "Elemen di baris ke-2, kolom ke-3: " << matriks[1][2] << endl;

    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">C. Operasi Dasar pada String</h2>
    <p>String dalam C++ dapat digunakan untuk menyimpan teks.</p>

    <h3>1. Menggunakan <code>getline()</code> untuk Input String</h3>
    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
#include &lt;string&gt;
using namespace std;

int main() {
    string nama;
    cout << "Masukkan nama lengkap: ";
    getline(cin, nama);

    cout << "Nama Anda: " << nama << endl;

    return 0;
}</code></pre>
    </div>

    <h3>2. Menggunakan <code>.length()</code> untuk Menghitung Panjang String</h3>
    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
#include &lt;string&gt;
using namespace std;

int main() {
    string teks = "Halo, dunia!";
    cout << "Panjang teks: " << teks.length() << " karakter" << endl;

    return 0;
}</code></pre>
    </div>

    <h3>3. Menggunakan <code>.substr()</code> untuk Memotong String</h3>
    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
#include &lt;string&gt;
using namespace std;

int main() {
    string kalimat = "Pemrograman C++ sangat menarik!";
    string potongan = kalimat.substr(14, 3);

    cout << "Hasil substr: " << potongan << endl;

    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">Latihan</h2>
    <ol>
        <li>Buat program yang meminta pengguna memasukkan 5 angka dan menyimpannya dalam array, lalu mencetaknya.</li>
        <li>Buat program yang menyimpan tabel nilai siswa dalam array dua dimensi dan menampilkan semua nilai.</li>
        <li>Buat program yang meminta pengguna memasukkan teks, lalu menampilkan panjang teks dan potongan dari teks tersebut.</li>
    </ol>

    <hr>

    {{-- Tombol Navigasi --}}
    <div class="text-center mt-4">
        <a href="/materi4" class="btn btn-secondary">Kembali ke BAB 4</a>
        <a href="/materi6" class="btn btn-primary">Lanjut ke BAB 6</a>
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
