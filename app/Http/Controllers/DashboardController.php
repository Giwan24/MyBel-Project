<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Produk;

class DashboardController extends Controller
{
    

    public function index(Request $request)
    {
        $totalProduk = Produk::count();
        $totalpetugas = DB::table('tbl_petugas')->count();

        return view('admin/dashboard.index',[
            'totalProduk'=>$totalProduk,
            'totalpetugas'=>$totalpetugas,]);
    }
}
