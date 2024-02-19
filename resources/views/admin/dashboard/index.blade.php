@extends('admin/layout.master')

@section('title','Dashboard')
@section('title2','index')
@section('dashboard','active')

@section('konten')
<div class="container-fluid">
    <br><br>
    @if (Auth::guard('admin')->user()->level == 'admin')
    <h1 style="color:white;">HALLO. SELAMAT DATANG DI MYBEL, <div >{{ Auth::guard('admin')->user()->nama_petugas }} 😄👋❕</div></h1>
    @endif
    <br><br>
  
    <h4 style="color:white;"><b>DATA : </b></h4><BR>
    <div class="row">
    <a href="/mybel">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1"  style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius:20px;">
            <div class="card-icon bg-warning" style="border-radius:20px;">
            <img width="80" src="../assets/img/barang.png" alt="avatar" style="border-radius:20px;">
            </div>
            <div class="card-wrap">
              <div class="card-header">
                @if (Auth::guard('admin')->user()->level == 'admin')   
                <h4><a href="/siswa" class="text-dark"><b>PRODUK TERDAFTAR</b></a></h4>
                @else
                <h4 class="text-dark"><b>PRODUK TERDAFTAR</b></h4>
                @endif
              </div>
              <div class="card-body">
                  {{ $totalProduk }}
              </div>
            </div>
            <br>
          </div>
        </div>
    </a>
    <a href="/mybel">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius:20px;">
            <div class="card-icon bg-secondary" style="border-radius:20px;">
            <img width="80" src="../assets/img/avatar/avatar-1.png" alt="avatar" style="border-radius:20px;">
            </div>
            <div class="card-wrap">
              <div class="card-header">
                @if (Auth::guard('admin')->user()->level == 'admin')   
                <h4><a href="/petugas" class="text-dark"><b>PETUGAS ADMIN</b></a></h4>
                @else
                <h4 class="text-dark"><b>PETUGAS / ADMIN</b></h4>
                @endif
              </div>
              <div class="card-body">
                  {{ $totalpetugas }}       
              </div>
            </div>
            <br>
          </div>
        </div>
        </div>
</div>
</a>
@endsection
