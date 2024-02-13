@extends('admin/layout.mastertrans')

@section('title','Pengelolaan Pembayaran SPP SMK PI')
@section('title2','index')
@section('transaksi','active')
@section('konten')
<style>
    body {
      background-image: linear-gradient(to left,#014280, #abd6ff)     
    }
  </style>
<div class="container-fluid">
	<div class="row">
        <div class="col-md-12 mb-5"></div>
		@if(session('message'))
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible show fade">
				<div class="alert-body">
				  <button class="close" data-dismiss="alert">
					<span>×</span>
				  </button>
				  {{ session('message') }}
				</div>
			</div>
		</div> 
        @endif
		@if ($data->count() != '')
        
		<div class="col-md-9" style="
            left:13%; border-radius:35px; 
            background-color:#edf4fc;
            background:transparent;
            background:rgba(255,255,255,0.4);
            backdrop-filter: blur(10px);">		
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3 text-center">
                                <h5 class="text-darkblue"><b>BAYAR SPP SISWA</b></h5> 
                                <br>
                                <div class="col-md-4">
                                    <form action="/transaksi_cari" method="GET" style="margin-left:400px; margin-right:-350px;">
                                        @csrf
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                            </div>
                                            <input autocomplete="off" name="keyword" type="text" class="form-control text-darkblue" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="CARI NISN  ..." style="background-color: rgba(255, 255, 255, 0.3); border:none; border-radius:50px 50px 50px 50px;">
                                            <div class="input-group-append">&nbsp&nbsp&nbsp
                                                <button class="btn btn-success px-3" type="submit" id="button-addon2" style="border-radius:50px 50px 50px 50px;"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <br>
                                <center>
                                <img class="mr-3 rounded-circle" width="150" src="../assets/img/avatar/student.png" alt="avatar"></center>
                               <br>
                            </div>
                            <div class="col-md-5 offset-md-1 text-darkblue" style="left:25%;"><b>
                                <span>NISN/NIS</span><br>
                                <span>Nama siswa</span><br>
                                <span>Kelas</span><br>
                                <span>Alamat</span><br>
                                <span>No Telepon</span></b>
                            </div>
                            <div class="col-md-6 text-darkblue" style="right:0%;"><b>
                                <span>:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{ $data_siswa->nisn }} / {{ $data_siswa->nis }}</span><br>
                                <span>:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{ $data_siswa->nama }}</span><br>
                                <span>:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{ $data_siswa->nama_kelas }}</span><br>
                                <span>:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{ $data_siswa->alamat }}</span><br>
                                <span>:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{ $data_siswa->no_telp }}</span></b>
                            </div>
                        </div>
                    </div>
            <br>
			<table class="table table-striped" width="100%" border="0" style="border-radius:20px;">
			  <thead style="background-color:#4e81ce; border-radius:20px;">
				<tr><b>
				    <th scope="col text-white" style="color:white;">Tahun SPP</th>
                    <th scope="col text-white" style="color:white;">Nama SPP</th>
				    <th scope="col text-white" style="color:white;">Nominal</th>
                    <th scope="col text-white" style="color:white;">Tanggal bayar</th>
                    <th scope="col text-white" style="color:white;">Bulan dibayar</th>
                    <th scope="col text-white" style="color:white;">Tahun dibayar</th>
				    <th scope="col text-white" style="color:white;">Status</th>
                    <th scope="col text-white" style="color:white;"><center>Konfirmasi bayar</center></th></b>
				</tr>
			  </thead>
			  <tbody style="border-radius:20px;">
				  @foreach ($data as $item)
				  <tr class="text-darkblue">
					<td><b>{{ $item->tahun }}</b></td>
                    <td><b>{{ $item->nama_spp }}</b></td>
					<td><b>Rp {{ number_format($item->nominal) }}</b></td>
                    <td><b>@if ($item->tanggal_bayar != '')
                        {{ $item->tanggal_bayar }}
                    @else
                        belum
                    @endif</b></td>
                    <td><b>@if ($item->bulan_bayar != '')
                        {{ $item->bulan_bayar }}
                    @else
                        belum
                    @endif</b></td>
                    <td><b>@if ($item->tahun_bayar != '')
                        {{ $item->tahun_bayar }}
                    @else
                        belum
                    @endif</b></td>
					<td><b>{{ $item->ket }}</b></td>
					<td><center>
                        @if ($item->ket == 'lunas')
                            <a href="{{ route('transaksi.pdf',$item->id_pembayaran) }}" class="btn btn-warning mr-2 mb-2">CETAK</a>
                            <a href="{{ route('transaksi.batal',$item->id_pembayaran) }}" class="btn btn-danger mb-2">BATAL</a>
                        @else
                            <a href="{{ route('transaksi.bayar',$item->id_pembayaran) }}" class="btn btn-success">Bayar</a>
                        @endif
                    </center></td>
				  </tr>
				  @endforeach	
			  </tbody>
			</table>
			<br><br><br>
		</div>
		@endif
		
	</div>		
</div>
@endsection
