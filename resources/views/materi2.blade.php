@extends('layouts.app') {{-- Sesuaikan dengan layout utama --}}
@section('content')

<div class="container">
    <h1 class="mt-4">BAB 2: Struktur Dasar dan Tipe Data</h1>

    <h2 class="mt-3">A. Memahami Struktur Dasar Program C++</h2>
    <p>Setiap program C++ memiliki struktur dasar yang terdiri dari:</p>
    
    <ul>
        <li>**Header File**: Menggunakan `#include` untuk mengimpor pustaka.</li>
        <li>**Fungsi Utama**: `main()` adalah titik awal eksekusi program.</li>
        <li>**Blok Kode**: Ditandai dengan `{ }`, tempat perintah ditulis.</li>
    </ul>

    <p>Contoh program dasar C++:</p>
    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    cout << "Halo, C++!" << endl;
    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">B. Menggunakan Variabel dan Tipe Data Dasar</h2>
    <p>Variabel digunakan untuk menyimpan data dalam program. Tipe data dasar dalam C++ meliputi:</p>
    <ul>
        <li><b>int</b>: Bilangan bulat (contoh: `int umur = 22;`)</li>
        <li><b>float</b>: Bilangan desimal (contoh: `float suhu = 36.5;`)</li>
        <li><b>char</b>: Karakter tunggal (contoh: `char huruf = 'A';`)</li>
        <li><b>bool</b>: Nilai benar atau salah (contoh: `bool isValid = true;`)</li>
        <li><b>string</b>: Kumpulan karakter (contoh: `string nama = "Ali";`)</li>
    </ul>

    <p>Contoh penggunaan variabel:</p>
    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    int umur = 22;
    float suhu = 36.5;
    char huruf = 'A';
    bool isValid = true;
    string nama = "Ali";

    cout << "Nama: " << nama << endl;
    cout << "Umur: " << umur << endl;
    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">C. Menggunakan Operator Aritmetika, Logika, dan Perbandingan</h2>

    <h3>1. Operator Aritmetika</h3>
    <p>Digunakan untuk operasi matematika dasar:</p>
    <ul>
        <li><code>+</code> (penjumlahan)</li>
        <li><code>-</code> (pengurangan)</li>
        <li><code>*</code> (perkalian)</li>
        <li><code>/</code> (pembagian)</li>
        <li><code>%</code> (modulus/sisa bagi)</li>
    </ul>

    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    int a = 10, b = 3;
    cout << "a + b = " << (a + b) << endl;
    cout << "a - b = " << (a - b) << endl;
    cout << "a * b = " << (a * b) << endl;
    cout << "a / b = " << (a / b) << endl;
    cout << "a % b = " << (a % b) << endl;
    return 0;
}</code></pre>
    </div>

    <h3>2. Operator Perbandingan</h3>
    <p>Digunakan untuk membandingkan dua nilai:</p>
    <ul>
        <li><code>==</code> (sama dengan)</li>
        <li><code>!=</code> (tidak sama dengan)</li>
        <li><code>&gt;</code> (lebih besar)</li>
        <li><code>&lt;</code> (lebih kecil)</li>
        <li><code>&gt;=</code> (lebih besar atau sama dengan)</li>
        <li><code>&lt;=</code> (lebih kecil atau sama dengan)</li>
    </ul>

    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    int x = 5, y = 10;
    cout << "x == y: " << (x == y) << endl;
    cout << "x > y: " << (x > y) << endl;
    return 0;
}</code></pre>
    </div>

    <h3>3. Operator Logika</h3>
    <p>Digunakan dalam kondisi boolean:</p>
    <ul>
        <li><code>&&</code> (AND) – bernilai true jika kedua kondisi benar.</li>
        <li><code>||</code> (OR) – bernilai true jika salah satu kondisi benar.</li>
        <li><code>!</code> (NOT) – membalikkan nilai boolean.</li>
    </ul>

    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    bool a = true, b = false;
    cout << "a && b: " << (a && b) << endl;
    cout << "a || b: " << (a || b) << endl;
    cout << "!a: " << !a << endl;
    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">Latihan</h2>
    <ol>
        <li>Buatlah program yang meminta pengguna memasukkan dua angka, lalu mencetak hasil penjumlahan, pengurangan, perkalian, dan pembagian dari kedua angka tersebut.</li>
        <li>Jelaskan perbedaan antara operator `==` dan `=` dalam C++.</li>
        <li>Buat program yang meminta pengguna memasukkan nilai suhu, lalu mengevaluasi apakah suhu tersebut lebih tinggi dari 37 derajat atau tidak.</li>
    </ol>

    <hr>

    {{-- Tombol Navigasi --}}
    <div class="text-center mt-4">
        <a href="/materi" class="btn btn-secondary">Kembali ke BAB 1</a>
        <a href="/materi3" class="btn btn-primary">Lanjut ke BAB 3</a>
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
