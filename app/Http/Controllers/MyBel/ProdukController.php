<?php

namespace App\Http\Controllers\MyBel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use DB;

class ProdukController extends Controller
{
    private function _validation(Request $request){
	    $validation = $request->validate([
	        'id_produuct' => 'required|max:100',
            'jenis' => 'required|max:100',
            'nama_produk' => 'required|max:100',
            'material' => 'required',
            'dimensi' => 'required',
            'warna_tersedia' => 'required',
            'harga' => 'required',
	    ],
	    [
            'id_produuct.required' => 'Harus diisi',
            'jenis.required' => 'Harus diisi',
            'nama_produk.required' => 'Harus diisi',
            'material.required' => 'Harus diisi',
            'dimensi.required' => 'Harus diisi',
            'warna_tersedia.required' => 'Harus diisi',
            'harga.required' => 'Harus diisi',
	    ]
	);
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Produk::latest()->orderBy('id','asc')->latest()
                                ->where('nama_produk','like',"%{$request->keyword}%")
                                ->orWhere('jenis','like',"%{$request->keyword}%")
                                ->orWhere('id_product','like',"%{$request->keyword}%")
                                ->orWhere('brand','like',"%{$request->keyword}%")
                                ->orderBy('brand','asc')
                                ->orderBy('id_product','asc')
                                ->orderBy('jenis','asc')
                                ->orderBy('nama_produk','asc')
                                ->paginate(10);

        return view('admin/mybel.index',['data'=>$data]);
    }

    public function home_index(Request $request)
    {
        $dataIndex = Produk::latest()->orderBy('id','asc')->latest()
                            ->where('nama_produk','like',"%{$request->keyword}%")
                            ->orWhere('jenis','like',"%{$request->keyword}%")
                            ->orWhere('id_product','like',"%{$request->keyword}%")
                            ->orWhere('brand','like',"%{$request->keyword}%")
                            ->orderBy('brand','asc')
                            ->orderBy('id_product','asc')
                            ->orderBy('jenis','asc')
                            ->orderBy('nama_produk','asc')
                            ->paginate(3);
                                
        return view('admin.index', ['data' => $dataIndex]);
    }

    public function marketplace(Request $request)
    {
        $dataIndex = Produk::latest()->orderBy('id','asc')->latest()
                            ->where('nama_produk','like',"%{$request->keyword}%")
                            ->orWhere('jenis','like',"%{$request->keyword}%")
                            ->orWhere('id_product','like',"%{$request->keyword}%")
                            ->orWhere('brand','like',"%{$request->keyword}%")
                            ->orderBy('brand','asc')
                            ->orderBy('id_product','asc')
                            ->orderBy('jenis','asc')
                            ->orderBy('nama_produk','asc')
                            ->paginate(10);
                                
        return view('admin.marketplace', ['data' => $dataIndex]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/mybel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Produk(); // Instantiate a new Produk model

        $data->id_product = $request->id_product;
        $data->brand = $request->brand;
        $data->jenis = $request->jenis;
        $data->nama_produk = $request->nama_produk;
        $data->material = $request->material;
        $data->dimensi = $request->dimensi;
        $data->warna_tersedia = $request->warna_tersedia;
        $data->harga = $request->harga;
    
        $data->save(); // Save the data to the database

        return redirect('mybel')->with('message','Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Produk::where('id', $id)->first();
        return view('admin/mybel.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Produk::where('id', $id)->update([
            'id_product'=>$request->id_product,
            'brand'=>$request->brand,
            'jenis'=>$request->jenis,
            'nama_produk'=>$request->nama_produk,
            'material'=>$request->material,
            'dimensi'=>$request->dimensi,
            'warna_tersedia'=>$request->warna_tersedia,
            'harga'=>$request->harga,
        ]);

        return redirect('mybel')->with('message','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_product)
    {
        Produk::where('id_product', $id_product)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

    public function history($id)
    {
        $data = DB::table('tbl_mybel')->where('nisn',$id)
        ->join('tbl_kelas', function($join){
            $join->on('tbl_mybel.kelas_id','=','tbl_kelas.id_kelas');
        })->join('tbl_pembayaran', function($join){
            $join->on('tbl_mybel.nisn','=','tbl_pembayaran.nisn_mybel');
        })->join('tbl_spp', function($join){
            $join->on('tbl_pembayaran.spp_id','=','tbl_spp.id_spp');
        })->where('ket','lunas')
        ->get();
        return view('admin/mybel.history',['data'=>$data]);
   
    }

    public function depan()
    {
        return view('mybel.index');
    }
}
