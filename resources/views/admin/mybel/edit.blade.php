@extends('admin/layout.master')

@section('title','Product MyBel')
@section('title2','edit-produk')
@section('mybel','active')
@section('konten')



<div class="card">
  <div class="card-header">
    <h4>Edit Produk</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('mybel.update',$data->id) }}" method="POST">
    @method('PATCH')
    @csrf
    <div class="row">

        {{-- id product --}}
        <div class="col-md-6">
            <div class="form-group">
              <label class="text-dark">
                ID Produk
              </label>
              <input type="text" name="id_product"
              @if (old('id_product'))
                  value="{{ old('id_product') }}"
                  @else
                  value="{{ $data->id_product }}"
              @endif
               class="form-control" autocomplete="off" readonly="readonly">  
            </div>
          </div>

          {{-- Brand --}}
          <div class="col-md-6">
            <div class="form-group">
              <label class="text-dark">
                Brand
              </label>
              <input type="text" name="brand"
              @if (old('brand'))
                  value="{{ old('brand') }}"
              @else
                  value="{{ $data->brand }}"
              @endif
               class="form-control" autocomplete="off">  
            </div>
          </div>

          

      <div class="col-md-6">
          <div class="form-group">
          <label class="text-dark">
              Nama Produk
            </label>
            <input type="text" name="nama_produk"
            @if (old('nama_produk'))
                value="{{ old('nama_produk') }}"
            @else
                value="{{ $data->nama_produk }}"
            @endif
            class="form-control" autocomplete="off">  
          </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="text-dark">
                  Jenis
                </label>
                <select name="jenis" value="{{old('jenis')}}" id="jenis" class="form-control">
                    <option>Lemari</option>
                    <option>Meja</option>
                    <option>Kursi</option>
                    <option>Rak</option>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="text-dark">
                  Material
                </label>
                <input type="text" name="material" 
                @if (old('material'))
                value="{{ old('material') }}"
                @else
                value="{{ $data->material }}"
                @endif
                class="form-control" autocomplete="off">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                  <label class="text-dark">
                    Dimensi
                  </label>
                  <input type="text" name="dimensi"
                  @if (old('dimensi'))
                      value="{{ old('dimensi') }}"
                  @else
                      value="{{ $data->dimensi }}"
                  @endif
                  class="form-control" autocomplete="off" placeholder="Example : 123 x 123 x 123 CM">        
            </div>
        </div>  

        <div class="col-md-6">
            <div class="form-group">
                  <label class="text-dark">
                    Warna Tersedia
                  </label>
                  <input type="text" name="warna_tersedia"
                  @if (old('warna_tersedia'))
                      value="{{ old('warna_tersedia') }}"
                  @else
                      value="{{ $data->warna_tersedia }}"
                  @endif
                  class="form-control" autocomplete="off">        
            </div>
        </div>  

        <div class="col-md-6">
            <div class="form-group">
                  <label class="text-dark">
                    Harga (Rp)
                  </label>
                  <input type="number" name="harga"
                  @if (old('harga'))
                      value="{{ old('harga') }}"
                  @else
                      value="{{ $data->harga }}"
                  @endif
                  class="form-control" autocomplete="off">        
            </div>
        </div>  

    </div>    
      <div class="card-footer text-right">
        <button class="btn btn-primary mr-1" type="submit">Submit</button>
        <a href="/mybel" class="btn btn-secondary" type="reset">Cancel</a>
      </div>
    </form>
  </div>
</div>

@endsection

{{-- @push('page-scripts')
<script src="{{ asset('node_modules/cleave.js/dist/cleave.min.js') }}"></script>
<script src="{{ asset('node_modules/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
<script src="{{ asset('node_modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
<script src="{{ asset('node_modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('node_modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/page/forms-advanced-forms.js') }}"></script>
@endpush --}}

