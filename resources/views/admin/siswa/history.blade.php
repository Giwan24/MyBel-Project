@extends('admin/layout.master')

@section('title','Siswa')
@section('title2','index')
@section('siswa','active')
@section('konten')

<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8 mb-2">
        <div class="col-md-12 mb-3">
            <h3>RIWAYAT PEMBAYARAN</h3>
        </div>
      </div>
       
        @foreach ($data as $item)      
        <div class="col-md-8 mb-2">
            <div class="card" id="card-cart" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                <div class="card-body">
                    <h5 class="text-success">{{ $item->nama }} | sudah {{ $item->ket }}</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <span>Pembayaran spp : <b style="color:green;">{{ $item->nama_spp }} {{ $item->tahun_bayar }}</b></span><br>
                            <span>Tahun : {{ $item->tahun }}</span>
                        </div>
                        <div class="col-md-6 text-right">
                            <span class="text-danger"><b>Nominal : Rp {{ number_format($item->nominal) }}</b></span><br>
                            <span>Tanggal bayar :   {{ $item->tanggal_bayar }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

