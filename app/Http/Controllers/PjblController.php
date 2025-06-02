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
        return redirect('/pjbl')->with('message', 'Pertanyaan telah dikirim.');
    }
    public function tahap2()
{
    $userId = Auth::id();

    // Cari kelompok siswa
    $kelompok = DB::table('kelompok')
        ->where(function($query) use ($userId) {
            $query->where('id_anggota1', $userId)
                  ->orWhere('id_anggota2', $userId)
                  ->orWhere('id_anggota3', $userId)
                  ->orWhere('id_anggota4', $userId);
        })
        ->first();

    // Kalau belum punya kelompok → redirect balik
    if (!$kelompok) {
        return redirect()->back()->with('error', 'Kamu belum tergabung dalam kelompok.');
    }

    // Cek apakah kelompoknya sudah ACC di tahap1
    $tahap1 = DB::table('tahap1')->where('id_siswa', $userId)->first();

    if (!$tahap1 || $tahap1->ACC != 1) {
        return redirect()->back()->with('error', 'Tahap 1 belum di-ACC untuk lanjut ke tahap 2.');
    }

    // Ambil data tahap2 (boleh kosong)
    $tahap2 = DB::table('kelompok')
        ->leftJoin('tahap2', 'kelompok.id', '=', 'tahap2.id_kelompok')
        ->where('kelompok.id', $kelompok->id)
        ->select('kelompok.*', 'tahap2.*')
        ->first();

    return view('tahap2', compact('tahap2'));
}



    public function tahap3()
    {

    $userId = Auth::id();

    // Cari kelompok siswa
    $kelompok = DB::table('kelompok')
        ->where(function($query) use ($userId) {
            $query->where('id_anggota1', $userId)
                  ->orWhere('id_anggota2', $userId)
                  ->orWhere('id_anggota3', $userId)
                  ->orWhere('id_anggota4', $userId);
        })
        ->first();

    // Kalau belum punya kelompok → redirect balik
    if (!$kelompok) {
        return redirect()->back()->with('error', 'Kamu belum tergabung dalam kelompok.');
    }

    // Cek apakah kelompoknya sudah ACC di tahap2
    $tahap2 = DB::table('tahap2')->where('id_kelompok', $kelompok->id)->first();

    if (!$tahap2 || $tahap2->ACC != 1) {
        return redirect()->back()->with('error', 'Tahap 2 belum di-ACC untuk lanjut ke tahap 3.');
    }

    return view('tahap3');
    }
    public function tahap4()
    {

    $userId = Auth::id();

    // Cari kelompok siswa
    $kelompok = DB::table('kelompok')
        ->where(function($query) use ($userId) {
            $query->where('id_anggota1', $userId)
                  ->orWhere('id_anggota2', $userId)
                  ->orWhere('id_anggota3', $userId)
                  ->orWhere('id_anggota4', $userId);
        })
        ->first();

    // Kalau belum punya kelompok → redirect balik
    if (!$kelompok) {
        return redirect()->back()->with('error', 'Kamu belum tergabung dalam kelompok.');
    }

    // Cek apakah kelompoknya sudah ACC di tahap2
    $tahap3 = DB::table('tahap3')->where('id_kelompok', $kelompok->id)->first();

    if (!$tahap3 || $tahap3->ACC != 1) {
        return redirect()->back()->with('error', 'Tahap 3 belum di-ACC untuk lanjut ke tahap 4.');
    }
        return view('tahap4');
    }
    public function tahap5()
    {

    $userId = Auth::id();


    // Cek apakah kelompoknya sudah ACC di tahap2
    $tahap4 = DB::table('tahap4')->where('id_siswa', $userId)->first();

    if (!$tahap4 || $tahap4->ACC != 1) {
        return redirect()->back()->with('error', 'Tahap 4 belum di-ACC untuk lanjut ke tahap 5.');
    }
        return view('tahap5');
    }
    public function tahap6()
    {

    $userId = Auth::id();

    // Cari kelompok siswa
    $kelompok = DB::table('kelompok')
        ->where(function($query) use ($userId) {
            $query->where('id_anggota1', $userId)
                  ->orWhere('id_anggota2', $userId)
                  ->orWhere('id_anggota3', $userId)
                  ->orWhere('id_anggota4', $userId);
        })
        ->first();

    // Kalau belum punya kelompok → redirect balik
    if (!$kelompok) {
        return redirect()->back()->with('error', 'Kamu belum tergabung dalam kelompok.');
    }

    // Cek apakah kelompoknya sudah ACC di tahap2
    $tahap5 = DB::table('tahap5')->where('id_kelompok', $kelompok->id)->first();

    if (!$tahap5 || $tahap5->nilai < 1) {
        return redirect()->back()->with('error', 'Tahap 5 belum di Nilai untuk lanjut ke tahap 6.');
    }
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
    $validatedData = $request->validate([
        'user_id' => 'required',
        'file' => 'required|file|mimes:pdf|max:2048',
    ]);

    if ($request->file('file')->isValid()) {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public', $fileName);

        $id_kelompok = DB::table('kelompok')
            ->where('id_anggota1', $validatedData['user_id'])
            ->orWhere('id_anggota2', $validatedData['user_id'])
            ->orWhere('id_anggota3', $validatedData['user_id'])
            ->orWhere('id_anggota4', $validatedData['user_id'])
            ->value('id');

        $existing = DB::table('tahap3')->where('id_kelompok', $id_kelompok)->first();
        if ($existing && $existing->file_jadwal && Storage::exists('public/' . $existing->file_jadwal)) {
            Storage::delete('public/' . $existing->file_jadwal);
        }

        DB::table('tahap3')->updateOrInsert(
            ['id_kelompok' => $id_kelompok],
            ['file_jadwal' => $fileName]
        );

        return redirect()->back()->with('success', 'File berhasil diupload.');
    }

    return redirect()->back()->with('error', 'Gagal mengupload file.');
}


public function submitTahap4ke1(Request $request)
{
    $validatedData = $request->validate([
        'user_id' => 'required',
        'file' => 'required|file|mimes:pdf|max:2048',
    ]);

    if ($request->file('file')->isValid()) {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public', $fileName);

        $existing = DB::table('tahap4')->where('id_siswa', $validatedData['user_id'])->first();
        if ($existing && $existing->proyek1 && Storage::exists('public/' . $existing->proyek1)) {
            Storage::delete('public/' . $existing->proyek1);
        }

        DB::table('tahap4')->updateOrInsert(
            ['id_siswa' => $validatedData['user_id']],
            ['proyek1' => $fileName]
        );

        return redirect()->back()->with('success', 'File berhasil diupload.');
    }

    return redirect()->back()->with('error', 'Gagal mengupload file.');
}

public function submitTahap4ke2(Request $request)
{
    $validatedData = $request->validate([
        'user_id' => 'required',
        'file' => 'required|file|mimes:pdf|max:2048',
    ]);

    if ($request->file('file')->isValid()) {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public', $fileName);

        $existing = DB::table('tahap4')->where('id_siswa', $validatedData['user_id'])->first();
        if ($existing && $existing->proyek2 && Storage::exists('public/' . $existing->proyek2)) {
            Storage::delete('public/' . $existing->proyek2);
        }

        DB::table('tahap4')->updateOrInsert(
            ['id_siswa' => $validatedData['user_id']],
            ['proyek2' => $fileName]
        );

        return redirect()->back()->with('success', 'File berhasil diupload.');
    }

    return redirect()->back()->with('error', 'Gagal mengupload file.');
}

public function submitTahap5(Request $request)
{
    $validatedData = $request->validate([
        'user_id' => 'required',
        'file' => 'required|file|mimes:pdf|max:2048',
    ]);

    if ($request->file('file')->isValid()) {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public', $fileName);

        $id_kelompok = DB::table('kelompok')
            ->where('id_anggota1', $validatedData['user_id'])
            ->orWhere('id_anggota2', $validatedData['user_id'])
            ->orWhere('id_anggota3', $validatedData['user_id'])
            ->orWhere('id_anggota4', $validatedData['user_id'])
            ->value('id');

        $existing = DB::table('tahap5')->where('id_kelompok', $id_kelompok)->first();
        if ($existing && $existing->proyek && Storage::exists('public/' . $existing->proyek)) {
            Storage::delete('public/' . $existing->proyek);
        }

        DB::table('tahap5')->updateOrInsert(
            ['id_kelompok' => $id_kelompok],
            ['proyek' => $fileName, 'nilai' => 0]
        );

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
    public function downloadTahap4ke1($userId)
    {
        // Cari file berdasarkan ID pengguna (user ID) dan ID file
        $file = DB::table('tahap4')->where('id_siswa', $userId)->value('proyek1');

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
    public function downloadTahap4ke2($userId)
    {
        // Cari file berdasarkan ID pengguna (user ID) dan ID file
        $file = DB::table('tahap4')->where('id_siswa', $userId)->value('proyek2');

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
