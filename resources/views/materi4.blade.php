@extends('layouts.app') {{-- Sesuaikan dengan layout utama --}}
@section('content')

<div class="container">
    <h1 class="mt-4">BAB 4: Fungsi dan Modularisasi</h1>

    <h2 class="mt-3">A. Membuat dan Memanggil Fungsi dengan Parameter dan Return Value</h2>
    <p>Fungsi adalah blok kode yang dapat dipanggil berulang kali untuk menghindari pengulangan kode.</p>

    <h3>1. Contoh Fungsi dengan Parameter dan Return Value</h3>
    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int tambah(int a, int b) {
    return a + b;
}

int main() {
    int hasil = tambah(5, 7);
    cout << "Hasil penjumlahan: " << hasil << endl;
    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">B. Menggunakan Fungsi Void dan Fungsi dengan Nilai Balik</h2>

    <h3>1. Fungsi Void (Tanpa Nilai Balik)</h3>
    <p>Fungsi `void` tidak mengembalikan nilai tetapi tetap dapat menerima parameter.</p>

    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

void sapa(string nama) {
    cout << "Halo, " << nama << "!" << endl;
}

int main() {
    sapa("Budi");
    return 0;
}</code></pre>
    </div>

    <h3>2. Fungsi dengan Nilai Balik</h3>
    <p>Fungsi yang mengembalikan nilai menggunakan `return`.</p>

    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

double luasLingkaran(double r) {
    return 3.14 * r * r;
}

int main() {
    double hasil = luasLingkaran(10);
    cout << "Luas lingkaran: " << hasil << endl;
    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">C. Memahami Konsep Rekursi dalam Fungsi</h2>

    <h3>1. Rekursi Dasar</h3>
    <p>Fungsi rekursif adalah fungsi yang memanggil dirinya sendiri untuk menyelesaikan suatu tugas.</p>

    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int faktorial(int n) {
    if (n == 0) return 1;
    return n * faktorial(n - 1);
}

int main() {
    cout << "Faktorial dari 5: " << faktorial(5) << endl;
    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">Latihan</h2>
    <ol>
        <li>Buat fungsi yang menghitung pangkat dua dari suatu angka.</li>
        <li>Buat fungsi `void` yang menampilkan pesan selamat datang.</li>
        <li>Buat fungsi rekursif untuk menghitung deret Fibonacci.</li>
    </ol>

    <hr>

    {{-- Tombol Navigasi --}}
    <div class="text-center mt-4">
        <a href="/materi3" class="btn btn-secondary">Kembali ke BAB 3</a>
        <a href="/materi5" class="btn btn-primary">Lanjut ke BAB 5</a>
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
