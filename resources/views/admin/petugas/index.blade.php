@extends('admin/layout.master')

@section('title','Petugas')
@section('title2','index')
@section('Petugas','active')
@section('konten')

<div class="section-body" >
  <div class="row">
    <div class="col-md-12">
      
        <div class="card-body">
            
          {{-- Button tambah --}}
          <a href="{{ route('petugas.create') }}" class="btn btn-icon icon-left btn-success mb-3 px-3 text-white"><h6><i class="fas fa-plus"></i> Tambah Data</h6></a>
            
          {{-- Form search --}}
          <div class="float-right">
            <form action="?" method="GET">
              <div class="input-group mb-3">
                <input name="keyword" id="caribuku" type="text" class="form-control" placeholder="Cari..." aria-label="Cari" aria-describedby="button-addon2" value="{{ Request()->keyword }}" autocomplete="off">
                <div class="input-group-append">
                  <button id="btncaribuku" class="btn btn-outline-success bg-success" type="submit" id="button-addon2"><i class="fas fa-search text-light"></i></button>
                </div>
            
            </form>
          </div>
        </div>
        <div class="section-body">
      </div>
    </div>
  </div>
</div>
  <div class="row">
    <div class="col-md-12">
      <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <div class="card-body">
          {{-- USER --}}
          <h3><img alt="image" src="{{ asset('assets/img/avatar/avatar-2.png') }}" width="30px" class="rounded-circle mr-1" style="margin-bottom:5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.37);">   Admin</h3>
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
                <th>Nama petugas</th>
                <th scope="col">Username</th>
                <th>Level</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="mt-2">
                @php
                    $no = 1
                @endphp
              @foreach ($data_admin as $item)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $item->nama_petugas }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->level }}</td>
                <td>

                  {{-- Button edit --}}
                  <a href="{{ route('petugas.edit',$item->id_petugas) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                  <a href="#" data-id="" class="btn btn-danger confirm_script-{{$item->id_petugas}} mr-3">
                    <form action="{{ route('petugas.destroy',$item->id_petugas)}}" class="delete_form-{{$item->id_petugas}}" method="POST">
                    @method('DELETE')
                    @csrf
                    </form>
                    <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
            @push('page-scripts')

<script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>

@endpush

@push('after-scripts')

<script>
$(".confirm_script-{{$item->id_petugas}}").click(function(e) {
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
        $('.delete_form-{{$item->id_petugas}}').submit();
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
          {{$data_admin->links()}}
        </div>
      </div>
    </div>
  </div>    
</div>

<div class="section-body">
  <div class="row">
    <div class="col-md-12">
      <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <div class="card-body">
            
          {{-- USER --}}
          <h3><img alt="image" src="{{ asset('assets/img/avatar/avatar-4.png') }}" width="30px" class="rounded-circle mr-1" style="margin-bottom:5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.37);">   Petugas</h3>
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
                <th>Nama petugas</th>
                <th scope="col">Username</th>
                <th>Level</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="mt-2">
                @php
                    $no = 1
                @endphp
              @foreach ($data_petugas as $item)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $item->nama_petugas }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->level }}</td>
                <td>

                  {{-- Button edit --}}
                  <a href="{{ route('petugas.edit',$item->id_petugas) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                  <a href="#" data-id="" class="btn btn-danger confirm_script-{{$item->id_petugas}} mr-3">
                    <form action="{{ route('petugas.destroy',$item->id_petugas)}}" class="delete_form-{{$item->id_petugas}}" method="POST">
                    @method('DELETE')
                    @csrf
                    </form>
                    <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
            @push('page-scripts')

<script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>

@endpush

@push('after-scripts')

<script>
$(".confirm_script-{{$item->id_petugas}}").click(function(e) {
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
        $('.delete_form-{{$item->id_petugas}}').submit();
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
          {{$data_petugas->links()}}
        </div>
      </div>
    </div>
  </div>    
</div>



@endsection

