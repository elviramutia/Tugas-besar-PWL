<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Jadwal;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDosen = Dosen::count();
        $totalMahasiswa = Mahasiswa::count();
        $totalMatakuliah = Matakuliah::count();

        // Chart 1: Jadwal per hari
        $jadwalPerHari = Jadwal::select('hari', DB::raw('count(*) as total'))
            ->groupBy('hari')
            ->pluck('total', 'hari')->toArray();
        
        $hariLabels = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $jadwalData = [];
        foreach ($hariLabels as $hari) {
            $jadwalData[] = $jadwalPerHari[$hari] ?? 0;
        }

        // Chart 2: Mahasiswa per Dosen Wali
        $mhsPerDosen = Mahasiswa::select('dosen.nama', DB::raw('count(mahasiswa.npm) as total'))
            ->join('dosen', 'mahasiswa.nidn', '=', 'dosen.nidn')
            ->groupBy('dosen.nama')
            ->limit(5)
            ->pluck('total', 'nama')->toArray();
        
        $dosenLabels = array_keys($mhsPerDosen);
        $dosenData = array_values($mhsPerDosen);

        return view("admin.dashboard", compact(
            "totalDosen", "totalMahasiswa", "totalMatakuliah", 
            "hariLabels", "jadwalData", 
            "dosenLabels", "dosenData"
        ));
    }
}
