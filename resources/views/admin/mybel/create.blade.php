@extends('admin/layout.master')


@section('title','Product MyBel')
@section('title2','tambah-produk')
@section('mybel','active')
@section('konten')

<div class="card">
  <div class="card-header">
    <h4>Tambah Produk</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('mybel.store') }}" method="POST">
    @csrf
    <div class="row">

        {{-- id_product --}}
        <div class="col-md-6">
            <div class="form-group">
              <label class="text-dark">
                ID Produk
              </label>
              <input type="text" name="id_product" value="{{old('id_product')}}" class="form-control" autocomplete="off" placeholder="XXXX">  
            </div>
          </div>       

        <div class="col-md-6">
            <div class="form-group">
              <label class="text-dark">
                Brand
              </label>
              <input type="text" name="brand" value="{{old('brand')}}" class="form-control" autocomplete="off">  
            </div>
          </div>         

      <div class="col-md-6">
          <div class="form-group">
            <label class="text-dark">
              Nama Produk
            </label>
            <input type="text" name="nama_produk" value="{{old('nama_produk')}}" class="form-control" autocomplete="off">  
          </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="text-dark">
                  Jenis
                </label>
                <select name="jenis" value="{{old('jenis')}}" id="jenis" class="form-control">
                    <option></option>
                    <option>Lemari</option>
                    <option>Meja</option>
                    <option>Kursi</option>
                    <option>Rak</option>
                </select>
            </div>
        </div>

        {{-- material --}}
          <div class="col-md-6">
            <div class="form-group">
              <label class="text-dark">
                Material
              </label>
              <input type="text" name="material" value="{{old('material')}}" class="form-control" autocomplete="off">  
            </div>
          </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="text-dark">
                  Dimensi
                </label>
                <input type="text" name="dimensi" value="{{old('dimensi')}}" class="form-control" autocomplete="off" placeholder="Example : 123 x 123 x 123 CM">  
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="text-dark">
                    Warna Tersedia
                  </label>
                  <input type="text" name="warna_tersedia" value="{{old('warna_tersedia')}}" class="form-control" autocomplete="off">        
            </div>
        </div> 

        <div class="col-md-6">
            <div class="form-group">
                <label class="text-dark">
                    Harga (Rp)
                  </label>
                  <input type="number" name="harga" value="{{old('harga')}}" class="form-control" autocomplete="off">        
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

