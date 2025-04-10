<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;

class PjblController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guru/pjbl');
    }
    public function tahap1()
    {
        $siswa = DB::table('users')
            ->join('tahap1', 'users.id', '=', 'tahap1.id_siswa')
            ->select('tahap1.*', 'users.name')
            ->get();
        return view('guru/tahap1', compact('siswa'));
    }
    public function tahap1form($idsiswa)
    {
       // Ambil data tahap1 berdasarkan user_id yang sedang login
       $tahap1 = DB::table('tahap1')->where('id_siswa', $idsiswa)->first();
        
       return view('guru/tahap1form', compact('tahap1'));
    }
    public function submittahap1(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required',
            'jawaban' => 'required|string',
        ]);

            DB::table('tahap1')->where('id_siswa', $request->input('id_siswa'))->update(['jawaban' => $request->input('jawaban')]);
       
        return redirect()->route('tahap1')->with('success', 'Jawaban telah dikirim!');
    }
    public function tahap2()
    {
        $siswa = DB::table('tahap2')
    ->join('kelompok', 'tahap2.id_kelompok', '=', 'kelompok.id')
    ->join('users as siswa', 'tahap2.id_siswa', '=', 'siswa.id') // Tambahkan join untuk id_siswa
    ->leftJoin('users as u1', 'tahap2.id_anggota1', '=', 'u1.id')
    ->leftJoin('users as u2', 'tahap2.id_anggota2', '=', 'u2.id')
    ->leftJoin('users as u3', 'tahap2.id_anggota3', '=', 'u3.id')
    ->leftJoin('users as u4', 'tahap2.id_anggota4', '=', 'u4.id')
    ->select(
        'tahap2.*',
        'siswa.name as siswa_name', // Nama siswa utama dari tabel users
        'u1.name as anggota1_name',
        'u2.name as anggota2_name',
        'u3.name as anggota3_name',
        'u4.name as anggota4_name'
    )
    ->get();

        return view('guru/tahap2', compact('siswa'));
    }
    public function tahap3()
    {
        return view('tahap3');
    }
    public function tahap4()
    {
        return view('tahap4');
    }
    public function tahap5()
    {
        return view('tahap5');
    }
    public function tahap6()
    {
        $siswa = DB::table('users')
            ->join('tahap6', 'users.id', '=', 'tahap6.id_siswa')
            ->select('tahap6.*', 'users.name')
            ->get();
        return view('guru/tahap6', compact('siswa'));
    }
    public function tahap6form($idsiswa)
    {
       // Ambil data tahap6 berdasarkan user_id yang sedang login
       $tahap6 = DB::table('tahap6')->where('id_siswa', $idsiswa)->first();
        
       return view('guru/tahap6form', compact('tahap6'));
    }
    public function submittahap6(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required',
            'umpanbalikguru' => 'required|string',
        ]);

            DB::table('tahap6')->where('id_siswa', $request->input('id_siswa'))->update(['umpan_balik_guru' => $request->input('umpanbalikguru')]);
       
        return redirect()->route('tahap6')->with('success', 'Umpan Balik Guru telah dikirim!');
    }
    
    public function submitTahap2(Request $request) 
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'user_id' => 'required',
            'judul' => 'required', 
            'deskripsi' => 'required', 
        ]);

        $id_kelompok =  DB::table('kelompok')
        ->where('id_anggota1', $validatedData['user_id'])
        ->orWhere('id_anggota2', $validatedData['user_id'])
        ->orWhere('id_anggota3', $validatedData['user_id'])
        ->orWhere('id_anggota4', $validatedData['user_id'])
        ->value('id');

        ///  berdasarkan id_siswa
        DB::table('tahap2')->insert([
            'id_kelompok' => $id_kelompok,
            'judul' => $validatedData['judul'],
            'deskripsi' => $validatedData['deskripsi']
        ]);
        return redirect('/pjbl')->with('message', 'Jawaban Anda berhasil disimpan.');
    }
    public function showUploadForm()
    {
        return view('upload');
    }

    public function submitTahap3(Request $request)
    {
        // Validasi form upload file
        $validatedData = $request->validate([
            'user_id' => 'required',
            'file' => 'required|file|mimes:pdf|max:2048', // Contoh: hanya menerima file PDF dengan maksimal ukuran 2MB
        ]);

        // Proses upload file
        if ($request->file('file')->isValid()) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Simpan file ke dalam folder storage/app/public
            $file->storeAs('public', $fileName);

            $id_kelompok =  DB::table('kelompok')
        ->where('id_anggota1', $validatedData['user_id'])
        ->orWhere('id_anggota2', $validatedData['user_id'])
        ->orWhere('id_anggota3', $validatedData['user_id'])
        ->orWhere('id_anggota4', $validatedData['user_id'])
        ->value('id');

            DB::table('tahap3')->insert([
                'id_kelompok' => $id_kelompok,
                'file_jadwal' => $fileName
            ]);

            return redirect()->back()->with('success', 'File berhasil diupload.');
        }

        return redirect()->back()->with('error', 'Gagal mengupload file.');
    }
    public function submitTahap4ke1(Request $request)
    {
        // Validasi form upload file
        $validatedData = $request->validate([
            'user_id' => 'required',
            'file' => 'required|file|mimes:pdf|max:2048', // Contoh: hanya menerima file PDF dengan maksimal ukuran 2MB
        ]);

        // Proses upload file
        if ($request->file('file')->isValid()) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Simpan file ke dalam folder storage/app/public
            $file->storeAs('public', $fileName);

            // Simpan informasi file ke dalam database jika diperlukan
            // Contoh: menyimpan nama file ke dalam tabel file_records
            
            DB::table('tahap4')->insert([
                'id_siswa' => $validatedData['user_id'],
                'proyek1' => $fileName,
                'proyek2' => 0
            ]);

            return redirect()->back()->with('success', 'File berhasil diupload.');
        }

        return redirect()->back()->with('error', 'Gagal mengupload file.');
    }
    public function submitTahap4ke2(Request $request)
    {
        // Validasi form upload file
        $validatedData = $request->validate([
            'user_id' => 'required',
            'file' => 'required|file|mimes:pdf|max:2048', // Contoh: hanya menerima file PDF dengan maksimal ukuran 2MB
        ]);

        // Proses upload file
        if ($request->file('file')->isValid()) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Simpan file ke dalam folder storage/app/public
            $file->storeAs('public', $fileName);

            // Simpan informasi file ke dalam database jika diperlukan
            // Contoh: menyimpan nama file ke dalam tabel file_records
            
            DB::table('tahap4')
            ->where('id_siswa', $validatedData['user_id'])
            ->update(['proyek2' => $fileName]);
            return redirect()->back()->with('success', 'File berhasil diupload.');
        }

        return redirect()->back()->with('error', 'Gagal mengupload file.');
    }
    public function submitTahap5(Request $request)
    {
        // Validasi form upload file
        $validatedData = $request->validate([
            'user_id' => 'required',
            'file' => 'required|file|mimes:pdf|max:2048', // Contoh: hanya menerima file PDF dengan maksimal ukuran 2MB
        ]);

        // Proses upload file
        if ($request->file('file')->isValid()) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Simpan file ke dalam folder storage/app/public
            $file->storeAs('public', $fileName);

            $id_kelompok =  DB::table('kelompok')
        ->where('id_anggota1', $validatedData['user_id'])
        ->orWhere('id_anggota2', $validatedData['user_id'])
        ->orWhere('id_anggota3', $validatedData['user_id'])
        ->orWhere('id_anggota4', $validatedData['user_id'])
        ->value('id');
            
            DB::table('tahap5')->insert([
                'id_kelompok' => $id_kelompok,
                'proyek' => $fileName,
                'nilai' => 0
            ]);

            return redirect()->back()->with('success', 'File berhasil diupload.');
        }

        return redirect()->back()->with('error', 'Gagal mengupload file.');
    }
    
    public function downloadTahap3($userId)
    {
        $id_kelompok =  DB::table('kelompok')
        ->where('id_anggota1', $userId)
        ->orWhere('id_anggota2', $userId)
        ->orWhere('id_anggota3', $userId)
        ->orWhere('id_anggota4', $userId)
        ->value('id');
        // Cari file berdasarkan ID pengguna (user ID) dan ID file
        $file = DB::table('tahap3')->where('id_kelompok', $id_kelompok)->value('file_jadwal');

        // Pastikan file ditemukan
        if ($file) {
            // Cek apakah file ada di storage
            if (Storage::exists('public/' . $file)) {
                // Mendownload file
                return response()->download(storage_path('app/public/' . $file));
            } else {
                return redirect()->back()->with('error', 'File tidak ditemukan.');
            }
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan untuk pengguna ini.');
        }
    }
    public function downloadTahap5($userId)
    {
        $id_kelompok =  DB::table('kelompok')
        ->where('id_anggota1', $userId)
        ->orWhere('id_anggota2', $userId)
        ->orWhere('id_anggota3', $userId)
        ->orWhere('id_anggota4', $userId)
        ->value('id');
        // Cari file berdasarkan ID pengguna (user ID) dan ID file
        $file = DB::table('tahap5')->where('id_kelompok', $id_kelompok)->value('proyek');

        // Pastikan file ditemukan
        if ($file) {
            // Cek apakah file ada di storage
            if (Storage::exists('public/' . $file)) {
                // Mendownload file
                return response()->download(storage_path('app/public/' . $file));
            } else {
                return redirect()->back()->with('error', 'File tidak ditemukan.');
            }
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan untuk pengguna ini.');
        }
    }
}
