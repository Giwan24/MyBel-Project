@extends('admin/layout.master')

@section('title','Tunggakan SPP Siswa')
@section('title2','index')
@section('siswa','active')
@section('konten')

<div class="section-body">
  <div class="row">
    <div class="col-md-12">
      <div class="card mt-3" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <div class="card-body">
            
          {{-- Form search --}}
          <div class="float-right">
            <form action="?" method="GET">
              <div class="input-group mb-3">
                <input name="keyword" id="caribuku" type="text" class="form-control" placeholder="Cari..." aria-label="Cari" aria-describedby="button-addon2" value="{{ Request()->keyword }}" autocomplete="off">
                <div class="input-group-append">
                  <button id="btncaribuku" class="btn btn-outline-success bg-success" type="submit" id="button-addon2"><i class="fas fa-search text-light"></i></button>
                </div>
              </div>
            </form>
          </div>
          {{-- Alert --}}
          @if(session('message'))
          <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">
                <span>×</span>
              </button>
              {{ session('message') }}
            </div>
          </div>
          @endif

          {{-- tabel --}}
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th>NISN  /  NIS</th>
                <th scope="col">Nama siswa</th>
                <th>Kelas</th>
                <th>Tunggakan SPP</th>
                <th>Nominal</th>
                <th>Pelunasan</th>
                
              </tr>
            </thead>
            <tbody class="mt-2">
                @php
                    $no = 1
                @endphp
              @foreach ($data as $item)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td><b>{{ $item->nisn }}</b>  /  {{ $item->nis }}</td>
                <td><b>{{ $item->nama }}</b></td>
                <td>{{ $item->nama_kelas }}</td>
                <td><b class="text-danger">{{ $item->nama_spp }} {{ $item->tahun }}</b></td>
                <td><b>Rp {{ number_format($item->nominal) }}</b></td>
                <td>
                  <a href="/transaksi_cari?_token=JEehRkjvZW9nwyjlvHo72kxQNKG5Co1uZdg9F8o8&keyword={{ $item->nisn }}" class="btn btn-danger mt-2"> <b>Lunasi</b> </a>
                </td>
            </tr>
            @push('page-scripts')

<script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>

@endpush

@push('after-scripts')

<script>
$(".confirm_script-{{$item->nisn}}").click(function(e) {
  // id = e.target.dataset.id;
  swal({
      title: 'Yakin hapus data?',
      text: 'Data yang dihapus tidak bisa di kembalikan',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $('.delete_form-{{$item->nisn}}').submit();
      } else {
      swal('Hapus data telah di batalkan');
      }
    });
});
</script>
@endpush
@endforeach
                  
            </tbody>
          </table>
          {{$data->links()}}
        </div>
      </div>
    </div>
  </div>    
</div>

@endsection

