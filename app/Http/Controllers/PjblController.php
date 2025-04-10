<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


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
        return view('pjbl');
    }
    public function tahap1()
    {
       // Ambil data tahap1 berdasarkan user_id yang sedang login
       $tahap1 = DB::table('tahap1')->where('id_siswa', Auth::id())->first();
        
       return view('tahap1', compact('tahap1'));
    }
    public function submittahap1(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
        ]);

        // Simpan atau update pertanyaan di database
        $existingTahap1 = DB::table('tahap1')->where('id_siswa', Auth::id())->first();
        if ($existingTahap1) {
            DB::table('tahap1')->where('id_siswa', Auth::id())->update(['pertanyaan' => $request->input('pertanyaan')]);
        } else {
            DB::table('tahap1')->insert([
                'id_siswa' => Auth::id(),
                'pertanyaan' => $request->input('pertanyaan'),
                'jawaban' => ''
            ]);
        }

        return redirect()->route('tahap1')->with('success', 'Pertanyaan telah dikirim!');
    }
    public function tahap2()
    {
        return view('tahap2');
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
        // Ambil data tahap1 berdasarkan user_id yang sedang login
       $tahap6 = DB::table('tahap6')->where('id_siswa', Auth::id())->first();
        
       return view('tahap6', compact('tahap6'));
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
    public function submitTahap6(Request $request) 
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'user_id' => 'required',
            'umpanbaliksiswa' => 'required', 
        ]);

        // Simpan atau update pertanyaan di database
        $existingTahap1 = DB::table('tahap6')->where('id_siswa', Auth::id())->first();
        if ($existingTahap1) {
            DB::table('tahap6')->where('id_siswa', Auth::id())->update(['umpan_balik_siswa' => $request->input('umpanbaliksiswa')]);
        } else {
            DB::table('tahap6')->insert([
                'id_siswa' => Auth::id(),
                'umpan_balik_siswa' => $request->input('umpanbaliksiswa'),
                'umpan_balik_guru' => ''
            ]);
        }
        return redirect('/pjbl')->with('message', 'Jawaban Anda berhasil disimpan.');
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
