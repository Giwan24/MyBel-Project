@extends('admin/layout.master')

@section('title','Petugas')
@section('title2','tambah')
@section('petugas','active')
@section('konten')

<div class="card">
  <div class="card-header">
    <h4>Tambah petugas</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('petugas.store') }}" method="POST">
    @csrf
    <div class="row">

        {{-- nama --}}
        <div class="col-md-6">
            <div class="form-group">
              <label class="text-dark">
                Nama petugas
              </label>
              <input type="text" name="nama" value="{{old('nama')}}" class="form-control" autocomplete="off">  
            </div>
          </div>

          {{-- username --}}
          <div class="col-md-6">
            <div class="form-group">
              <label class="text-dark">
                Username
              </label>
              <input type="text" name="username" value="{{old('username')}}" class="form-control" autocomplete="off">  
            </div>
          </div>
          
          {{-- password --}}
          <div class="col-md-6">
            <div class="form-group">
              <label class="text-dark">
                Password
              </label>
              <input type="password" name="password" value="{{old('password')}}" class="form-control" autocomplete="off">  
            </div>
          </div>

          {{-- level --}}
          <div class="col-md-6">
            <div class="form-group">
              <label class="text-dark">
                Level
              </label>
              <select name="level" class="form-control">
                  <option value="admin" class="form-control">Admin</option>
                  <option value="petugas" class="form-control">Petugas</option>
              </select>
            </div>
          </div>

    </div>    
      <div class="card-footer text-right">
        <button class="btn btn-primary mr-1" type="submit">Submit</button>
        <a href="/petugas" class="btn btn-secondary" type="reset">Cancel</a>
      </div>
    </form>
  </div>
</div>

@endsection

