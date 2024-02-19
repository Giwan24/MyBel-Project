@extends('admin/layout.master')

@section('title','MyBel')
@section('title2','index')
@section('mybel','active')
@section('konten')

<div class="section-body" >
  <div class="row">
    <div class="col-md-12">
      
        <div class="card-body">
            
          {{-- Button tambah --}}&nbsp&nbsp
          <a href="{{ route('mybel.create') }}" class="btn btn-icon icon-left btn-success mb-3 px-3 text-white"  style="border-radius: 15px;"><h6><i class="fas fa-plus"></i> Tambah Data</h6></a>
            
          {{-- Form search --}}
          <div class="float-left">
            <form action="?" method="GET">
              <div class="input-group mb-3">
                <input name="keyword" id="caribuku" type="text" class="form-control" placeholder="Cari..." aria-label="Cari" aria-describedby="button-addon2" value="{{ Request()->keyword }}" autocomplete="off"  style="border-radius: 30px 0px 0px 30px;">
                <div class="input-group-append">
                  <button id="btncaribuku" class="btn btn-outline-success bg-success" type="submit" id="button-addon2" style="border-radius: 0px 30px 30px 0px; border: none;"><i class="fas fa-search text-light"></i></button>
                </div>
            
            </form>
          </div>
        </div>
        <div class="section-body">
      </div>
    </div>
  </div>
</div>
  <div class="row" style="border-radius: 50px;">
    <div class="col-md-12">
      <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 20px;">
        <div class="card-body">
          {{-- USER --}}
          <br>
          <h3><img alt="image" src="{{ asset('assets/img/barang.png') }}" width="30px" class="rounded-circle mr-1" style="margin-bottom:5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.37);">   Produk</h3><br>
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

          <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th>ID Produk</th>
                <th>Brand</th>
                <th scope="col">Nama Produk</th>
                <th>Jenis</th>
                <th>Material</th>
                <th>Dimensi</th>
                <th>Warna Tersedia</th>
                <th>Harga</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="mt-2">
                @php
                    $no = 1
                @endphp
              @foreach ($data as $item)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>#{{ $item->id_product }}</td>
                <td>{{ $item->brand }}</td>
                <td>{{ $item->nama_produk }}</td>
                <td>{{ $item->jenis }}</td>
                <td>{{ $item->material }}</td>
                <td>{{ $item->dimensi }}</td>
                <td>{{ $item->warna_tersedia }}</td>
                <td>{{ $item->harga }}</td>
                <td>

                  {{-- Button edit --}}
                  @if (Auth::guard('admin')->user()->level == 'admin')
                  <a href="{{ route('mybel.edit',$item->id) }}" class="btn btn-success mt-2"><i
                          class="fas fa-edit"></i></a>
                  <a href="#" data-id_product="{{ $item->id_product }}" class="btn btn-danger confirm_script mr-3 mt-2">
                      <i class="fas fa-trash"></i>
                  </a>

                  <form id="delete_form_{{ $item->id_product }}"
                      action="{{ route('mybel.destroy', $item->id_product) }}" method="POST" style="display: none;">
                      @method('DELETE')
                      @csrf
                  </form><br>
                  @endif
                  </td>
                  </tr>
</div>
                  @push('page-scripts')

                  <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>

                  @endpush

@push('after-scripts')

<script>
    $(document).ready(function() {
        $('.confirm_script').click(function(e) {
            e.preventDefault();
            var id_product = $(this).data('id_product');
                $('#delete_form_' + id_product).submit();
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

