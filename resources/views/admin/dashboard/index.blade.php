@extends('admin/layout.master')

@section('title','Dashboard')
@section('title2','index')
@section('dashboard','active')

@section('konten')
<div class="container-fluid">
    <br><br>
    @if (Auth::guard('admin')->user()->level == 'admin')
    <h1>HALLO. SELAMAT DATANG, <div class="text-primary">{{ Auth::guard('admin')->user()->nama_petugas }} 😄👋❕</div></h1>
    @endif
    @if (Auth::guard('admin')->user()->level == 'petugas')
    <h1>HALLO. SELAMAT DATANG, <div class="text-warning">{{ Auth::guard('admin')->user()->nama_petugas }} 😄👋❕</div></h1>
    @endif
    <br><br>
  
    <h4>DATA : </h4><BR>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1"  style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius:20px;">
            <div class="card-icon bg-primary" style="border-radius:20px;">
            <img width="80" src="../assets/img/avatar/student.png" alt="avatar" style="border-radius:20px;">
            </div>
            <div class="card-wrap">
              <div class="card-header">
                @if (Auth::guard('admin')->user()->level == 'admin')   
                <h4><a href="/siswa" class="text-dark"><b>SISWA TERDAFTAR</b></a></h4>
                @else
                <h4 class="text-dark"><b>SISWA TERDAFTAR</b></h4>
                @endif
              </div>
              <div class="card-body">
                  {{ $totalsiswa }}
              </div>
            </div>
            <br>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius:20px;">
            <div class="card-icon bg-warning" style="border-radius:20px;">
            <img width="80" src="../assets/img/avatar/avatar-2.png" alt="avatar" style="border-radius:20px;">
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

      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1"  style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);border-radius:20px;">
            <div class="card-icon bg-green" style="border-radius:10px;">
            <img width="80" src="../assets/img/invoice.png" alt="avatar" style="border-radius:20px;">
            </div>
            <div class="card-wrap">
              @if ($totalspp->sum('nominal') == $harapanspp->sum('nominal'))
              <div class="card-header">
                <h4>Target SPP YANG DIHARAPKAN</h4>
              </div>
              <div class="card-body text-primary">
                  Rp {{ number_format($harapanspp->sum('nominal')) }}
                  <div class="card-header-breadcrumb">
                    &nbsp
                  </div>
              </div>
              <div class="card-header">
                <h4>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  Total SPP YANG SEBENARNYA
                </h4>
              </div>
              <div class="card-body text-primary">
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  Rp {{ number_format($totalspp->sum('nominal')) }} ( Target SPP terpenuhi ✅ ) Rasio {{ $rasio }}%
                  <div class="card-header-breadcrumb">
                    &nbsp
                  </div>
                @else
                <div class="card-header">
                  <h4>TARGET SPP YANG DIHARAPKAN</h4>
                </div>
                <div class="card-body text-primary">
                    Rp {{ number_format($harapanspp->sum('nominal')) }}
                </div>
                <div class="card-header">
                  <h4>
                    TOTAL SPP YANG SEBENARNYA
                  </h4>
                </div>
                <div class="card-body text-danger">
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    Rp {{ number_format($totalspp->sum('nominal')) }} ( Target SPP belum terpenuhi ) Rasio {{ $rasio }}%
                </div>
                <div class="card-header">
                  <h4>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    TOTAL SISA SPP YANG MASIH HARUS DIBAYAR
                  </h4>
                <div class="card-body text-danger">
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    - Rp {{ number_format($harapanspp->sum('nominal') - $totalspp->sum('nominal')) }}
                </div>
                <div class="card-header">
                  <h4>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    JUMLAH SEMUA TUNGGAKAN PARA SISWA
                  </h4>
                <div class="card-body text-danger">
                    &nbsp&nbsp&nbsp&nbsp&nbsp
                    {{ $siswabelum }} Tunggakan <br><br>
                    &nbsp&nbsp&nbsp&nbsp&nbsp
                    <a href="/siswa_nunggak" class="btn btn-warning text-white"><h6>Lihat detail tunggakan</h6></a>
                </div>
                @endif             
            </div>
            <br>
          </div>
        </div>
      </div>
</div>
@endsection
