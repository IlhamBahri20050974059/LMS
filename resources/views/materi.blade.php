@extends('layouts.app') {{-- Sesuaikan dengan layout utama --}}
@section('content')

<div class="container">
    <h1 class="mt-4">BAB 1: Pemahaman Dasar C++</h1>

    <h2 class="mt-3">A. Sejarah dan Kegunaan C++</h2>

    <h3>1. Sejarah Singkat C++</h3>
    <p>C++ dikembangkan oleh <b>Bjarne Stroustrup</b> di AT&T Bell Labs pada awal 1980-an sebagai perluasan dari bahasa C. Awalnya, bahasa ini dikenal sebagai <b>"C dengan Kelas"</b>, sebelum akhirnya diberi nama C++ pada tahun 1983. C++ dirancang untuk mendukung pemrograman berorientasi objek (OOP) serta mempertahankan efisiensi bahasa C.</p>

    <h3>2. Kegunaan C++</h3>
    <ul>
        <li><b>Sistem Operasi</b>: Digunakan dalam pengembangan OS seperti Windows dan Linux.</li>
        <li><b>Software Aplikasi</b>: Contoh seperti Microsoft Office dan Adobe Photoshop.</li>
        <li><b>Game Development</b>: Banyak game populer dikembangkan dengan C++.</li>
        <li><b>Embedded Systems</b>: Digunakan dalam pengembangan firmware dan perangkat keras.</li>
        <li><b>Keamanan Siber dan Kecerdasan Buatan</b>: C++ sering digunakan dalam pengembangan alat keamanan dan sistem AI.</li>
    </ul>

    <h2 class="mt-3">B. Menginstal dan Menggunakan IDE serta Compiler C++</h2>

    <h3>1. Menginstal IDE dan Compiler C++</h3>
    <p>Untuk mulai menulis kode C++, kita memerlukan <b>Integrated Development Environment (IDE)</b> dan <b>compiler</b>. Beberapa pilihan IDE yang populer untuk C++ adalah:</p>
    <ul>
        <li><b>Code::Blocks</b> (cocok untuk pemula)</li>
        <li><b>Dev-C++</b> (ringan dan mudah digunakan)</li>
        <li><b>Visual Studio Code</b> (fleksibel dan dapat dikonfigurasi sesuai kebutuhan)</li>
        <li><b>Microsoft Visual Studio</b> (fitur lengkap untuk pengembangan skala besar)</li>
    </ul>

    <h3>2. Menggunakan IDE untuk Menulis Program C++</h3>
    <p>Langkah-langkah menginstal <b>Code::Blocks dengan MinGW</b>:</p>
    <ol>
        <li>Unduh <b>Code::Blocks with MinGW</b> dari situs resminya.</li>
        <li>Instal dengan memilih opsi <b>default settings</b>.</li>
        <li>Pastikan compiler MinGW sudah terpasang dengan membuka <b>Settings > Compiler</b>.</li>
    </ol>

    <h2 class="mt-3">C. Menjalankan Program Sederhana</h2>
    <p>Berikut adalah contoh program sederhana dalam C++:</p>

    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    cout << "Hello, dunia!" << endl;
    return 0;
}</code></pre>
    </div>

    <h3>1. Penjelasan Program</h3>
    <ul>
        <li><code>#include &lt;iostream&gt;</code>: Mengimpor pustaka untuk input/output standar.</li>
        <li><code>using namespace std;</code>: Mempermudah penggunaan fungsi dari pustaka standar.</li>
        <li><code>int main() { ... }</code>: Fungsi utama yang dijalankan pertama kali oleh program.</li>
        <li><code>cout << "Hello, dunia!" << endl;</code>: Menampilkan teks ke layar.</li>
        <li><code>return 0;</code>: Menandakan bahwa program berjalan dengan sukses.</li>
    </ul>

    <h3>2. Menjalankan Program</h3>
    <p>Ikuti langkah berikut untuk menjalankan program:</p>
    <ol>
        <li>Buka <b>Code::Blocks</b>.</li>
        <li>Salin dan tempelkan kode di atas ke dalam editor.</li>
        <li>Klik <b>Build and Run</b>.</li>
        <li>Jika berhasil, akan muncul output: <b>Hello, dunia!</b></li>
    </ol>

    <h2 class="mt-3">Latihan</h2>
    <ol>
        <li>Jelaskan perbedaan utama antara bahasa C dan C++.</li>
        <li>Sebutkan tiga contoh aplikasi yang dikembangkan menggunakan C++.</li>
        <li>Buatlah program C++ yang menampilkan nama dan umur Anda.</li>
    </ol>

    <hr>

    {{-- Tombol ke BAB 2 --}}
    <div class="text-center mt-4">
        <a href="/materi2" class="btn btn-primary">Lanjut ke BAB 2</a>
    </div>

</div>

<style>
    /* Styling untuk kotak kode */
    .code-box {
        background-color: #222; /* Warna hitam */
        color: #fff; /* Warna putih */
        padding: 15px;
        border-radius: 5px;
        font-family: monospace;
        overflow-x: auto;
    }
</style>

@endsection
