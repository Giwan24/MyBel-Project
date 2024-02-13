@extends('admin/layout.master')

@section('title','Laporan')
@section('title2','index')
@section('laporan','active')
@section('konten')

<div class="section-body">
  <div class="row">
    <div class="col-md-6 offset-md-3 mt-3">
    <center><div class="col-md-12 mb-3">
            <h3>REKAP LAPORAN</h3>
      </div></center>
      <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <div class="card-body">
          <form action="cetak" class="row" method="GET">
            <div class="form-group col-md-6">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                @if( request('dari') !='' )
                <input type="date" data-toggle="tooltip" data-placement="top" title="Dari Tanggal" name="dari" class="form-control datepicker" placeholder="Start date" tooltip="Dari Tanggal" required value="{{request('dari')}}">
                @else
                <input type="date" data-toggle="tooltip" data-placement="top" title="Dari Tanggal" name="dari" class="form-control datepicker" placeholder="Start date" tooltip="Dari Tanggal" value="<?php echo date('Y-m-d')?>" id="aktif" required>
                @endif
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                @if( request('ke') !='' )
                <input type="date" name="ke" data-toggle="tooltip" data-placement="top" title="Ke Tanggal" class="form-control datepicker" placeholder="Start date" tooltip="ke Tanggal" required value="{{request('ke')}}">
                @else
                <input type="date" name="ke" data-toggle="tooltip" data-placement="top" title="Ke Tanggal" class="form-control datepicker" placeholder="Start date" tooltip="ke Tanggal" value="<?php echo date('Y-m-d')?>" id="aktif" required>
                @endif              
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-success btn-sm btn-block">Rekap</button>
            </div> 
          </form>
          <div class="col-md-6 offset-md-3 mt-3">
        </div>
        <div class="col-md-12 mb-3">
              <br>
              <p> Note* : <br>Ini adalah rekap laporan keuangan SPP yang telah berhasil dibayar oleh siswa. Anda bisa merekap semua data keuangan SPP yang tersimpan dari waktu ke waktu.</P>
           </div>
      </div>
    </div>
  </div>    
</div>

@endsection

