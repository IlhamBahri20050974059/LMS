@extends('layouts.app') {{-- Sesuaikan dengan layout utama --}}
@section('content')

<div class="container">
    <h1 class="mt-4">BAB 6: Pointer dan Referensi (Dasar)</h1>

    <h2 class="mt-3">A. Memahami Konsep Dasar Pointer dan Alamat Memori</h2>
    <p>Pointer adalah variabel yang menyimpan alamat memori dari variabel lain.</p>

    <h3>1. Contoh Penggunaan Pointer</h3>
    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    int angka = 10;
    int* ptr = &angka; // Pointer menyimpan alamat memori angka

    cout << "Nilai angka: " << angka << endl;
    cout << "Alamat memori angka: " << &angka << endl;
    cout << "Nilai yang disimpan di pointer: " << ptr << endl;
    cout << "Nilai yang ditunjuk pointer: " << *ptr << endl;

    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">B. Menggunakan Pointer untuk Mengakses Nilai Variabel</h2>
    <p>Kita bisa menggunakan pointer untuk mengubah nilai variabel yang ditunjuk.</p>

    <h3>1. Contoh Manipulasi Variabel dengan Pointer</h3>
    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    int angka = 5;
    int* ptr = &angka;

    cout << "Sebelum diubah: " << angka << endl;
    
    *ptr = 20; // Mengubah nilai angka melalui pointer

    cout << "Setelah diubah: " << angka << endl;

    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">C. Memahami Hubungan antara Array dan Pointer</h2>
    <p>Array sebenarnya adalah pointer ke elemen pertama dalam blok memori.</p>

    <h3>1. Contoh Penggunaan Pointer dengan Array</h3>
    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    int angka[] = {10, 20, 30, 40, 50};
    int* ptr = angka; // Pointer menunjuk ke array

    cout << "Elemen pertama: " << *ptr << endl;
    cout << "Elemen kedua: " << *(ptr + 1) << endl;

    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">Latihan</h2>
    <ol>
        <li>Buat program yang menampilkan alamat memori dari variabel integer menggunakan pointer.</li>
        <li>Buat pointer yang mengubah nilai variabel float.</li>
        <li>Buat program yang mengakses elemen array menggunakan pointer.</li>
    </ol>

    <hr>

    {{-- Tombol Navigasi --}}
    <div class="text-center mt-4">
        <a href="/materi5" class="btn btn-secondary">Kembali ke BAB 5</a>
        <a href="/materi7" class="btn btn-primary">Lanjut ke BAB 7</a>
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
