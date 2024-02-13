<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    

    public function index(Request $request)
    {
        $totalsiswa = DB::table('tbl_siswa')->count();
        $totalpetugas = DB::table('tbl_petugas')->count();
        $totalkelas = DB::table('tbl_kelas')->count();
        $petugas = DB::table('tbl_petugas')->where('level','petugas')->get();
        $admin = DB::table('tbl_petugas')->where('level','admin')->get();

        $totalspp = DB::table('tbl_siswa')
        ->join('tbl_pembayaran', function($join){
            $join->on('tbl_siswa.nisn','=','tbl_pembayaran.nisn_siswa');
        })->join('tbl_spp', function($join){
            $join->on('tbl_pembayaran.spp_id','=','tbl_spp.id_spp');
        })->join('tbl_petugas', function($join){
            $join->on('tbl_pembayaran.petugas_id','=','tbl_petugas.id_petugas');
        })->join('tbl_kelas', function($join){
            $join->on('tbl_siswa.kelas_id','=','tbl_kelas.id_kelas');
        })
        ->where('ket','lunas')
        ->get();
        
        $harapanspp = DB::table('tbl_siswa')
        ->join('tbl_pembayaran', function($join){
            $join->on('tbl_siswa.nisn','=','tbl_pembayaran.nisn_siswa');
        })->join('tbl_spp', function($join){
            $join->on('tbl_pembayaran.spp_id','=','tbl_spp.id_spp');
        })->join('tbl_petugas', function($join){
            $join->on('tbl_pembayaran.petugas_id','=','tbl_petugas.id_petugas');
        })->join('tbl_kelas', function($join){
            $join->on('tbl_siswa.kelas_id','=','tbl_kelas.id_kelas');
        })->get();

        $rasio = ($totalspp->sum('nominal') / $harapanspp->sum('nominal')) * 100;

        $siswabelum = DB::table('tbl_siswa')
        ->join('tbl_pembayaran', function($join){
            $join->on('tbl_siswa.nisn','=','tbl_pembayaran.nisn_siswa');
        })->join('tbl_spp', function($join){
            $join->on('tbl_pembayaran.spp_id','=','tbl_spp.id_spp');
        })->join('tbl_petugas', function($join){
            $join->on('tbl_pembayaran.petugas_id','=','tbl_petugas.id_petugas');
        })->join('tbl_kelas', function($join){
            $join->on('tbl_siswa.kelas_id','=','tbl_kelas.id_kelas');
        })
        ->where('ket','belum')
        ->count();

        return view('admin/dashboard.index',[
            'totalsiswa'=>$totalsiswa,
            'totalpetugas'=>$totalpetugas,
            'petugas'=>$petugas,
            'admin'=>$admin,
            'totalkelas'=>$totalkelas,
            'harapanspp'=>$harapanspp,
            'totalspp'=>$totalspp,
            'siswabelum'=>$siswabelum,
            'rasio'=>$rasio]);
    }
}
