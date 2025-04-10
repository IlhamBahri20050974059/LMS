@extends('layouts.app') {{-- Sesuaikan dengan layout utama --}}
@section('content')

<div class="container">
    <h1 class="mt-4">BAB 3: Kontrol Alur Program</h1>

    <h2 class="mt-3">A. Menggunakan Percabangan (if-else, switch-case)</h2>
    
    <h3>1. Percabangan If-Else</h3>
    <p>Percabangan `if-else` digunakan untuk mengambil keputusan berdasarkan kondisi tertentu.</p>

    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    int angka;
    cout << "Masukkan angka: ";
    cin >> angka;
    
    if (angka > 0) {
        cout << "Angka positif" << endl;
    } else if (angka < 0) {
        cout << "Angka negatif" << endl;
    } else {
        cout << "Angka nol" << endl;
    }
    return 0;
}</code></pre>
    </div>

    <h3>2. Percabangan Switch-Case</h3>
    <p>`switch-case` digunakan untuk menangani banyak kondisi dengan nilai tetap.</p>

    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    int pilihan;
    cout << "Pilih menu (1-3): ";
    cin >> pilihan;
    
    switch (pilihan) {
        case 1:
            cout << "Anda memilih menu 1" << endl;
            break;
        case 2:
            cout << "Anda memilih menu 2" << endl;
            break;
        case 3:
            cout << "Anda memilih menu 3" << endl;
            break;
        default:
            cout << "Pilihan tidak valid" << endl;
    }
    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">B. Menggunakan Perulangan (for, while, do-while)</h2>

    <h3>1. Perulangan For</h3>
    <p>Digunakan ketika jumlah iterasi sudah diketahui.</p>

    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    for(int i = 1; i <= 5; i++) {
        cout << "Iterasi ke-" << i << endl;
    }
    return 0;
}</code></pre>
    </div>

    <h3>2. Perulangan While</h3>
    <p>Digunakan ketika jumlah iterasi tidak diketahui secara pasti.</p>

    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    int i = 1;
    while (i <= 5) {
        cout << "Iterasi ke-" << i << endl;
        i++;
    }
    return 0;
}</code></pre>
    </div>

    <h3>3. Perulangan Do-While</h3>
    <p>Mirip dengan `while`, tetapi kode dijalankan minimal sekali.</p>

    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    int i = 1;
    do {
        cout << "Iterasi ke-" << i << endl;
        i++;
    } while (i <= 5);
    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">C. Menggunakan Pernyataan Break dan Continue</h2>

    <h3>1. Pernyataan Break</h3>
    <p>`break` digunakan untuk menghentikan perulangan secara paksa.</p>

    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    for (int i = 1; i <= 10; i++) {
        if (i == 5) {
            break;
        }
        cout << i << " ";
    }
    return 0;
}</code></pre>
    </div>

    <h3>2. Pernyataan Continue</h3>
    <p>`continue` digunakan untuk melewati iterasi saat ini dan lanjut ke iterasi berikutnya.</p>

    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    for (int i = 1; i <= 10; i++) {
        if (i == 5) {
            continue;
        }
        cout << i << " ";
    }
    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">Latihan</h2>
    <ol>
        <li>Buat program yang meminta pengguna memasukkan angka, lalu menentukan apakah angka tersebut ganjil atau genap.</li>
        <li>Buat program yang menampilkan deret angka dari 1 hingga 20, tetapi melewatkan angka kelipatan 3.</li>
        <li>Buat program yang menggunakan `do-while` untuk meminta pengguna memasukkan angka hingga angka tersebut lebih besar dari 10.</li>
    </ol>

    <hr>

    {{-- Tombol Navigasi --}}
    <div class="text-center mt-4">
        <a href="/materi2" class="btn btn-secondary">Kembali ke BAB 2</a>
        <a href="/materi4" class="btn btn-primary">Lanjut ke BAB 4</a>
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
