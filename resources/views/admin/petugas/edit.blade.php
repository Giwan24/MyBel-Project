@extends('admin/layout.master')

@section('title','Admin')
@section('title2','edit-admin')
@section('petugas','active')
@section('konten')

<div class="card">
  <div class="card-header">
    <h4>Edit petugas</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('petugas.update',$data->id_petugas) }}" method="POST">
        @method('PATCH')
    @csrf
    <div class="row">

        {{-- nama --}}
        <div class="col-md-6">
            <div class="form-group">
              <label class="text-dark">
                Nama petugas
              </label>
              <input type="text" name="nama"  
              @if (old('nama'))
                  value="{{old('nama')}}"
              @else
                  value="{{ $data->nama_petugas }}"
              @endif
              class="form-control" autocomplete="off">  
            </div>
          </div>

          {{-- username --}}
          <div class="col-md-6">
            <div class="form-group">
              <label class="text-dark">
                Username
              </label>
              <input type="text" name="username"  
              @if (old('username'))
                  value="{{old('username')}}"
              @else
                  value="{{ $data->username }}"
              @endif
              class="form-control" autocomplete="off">  
            </div>
          </div>
          
          {{-- password --}}
          <div class="col-md-6">
            <div class="form-group">
              <label class="text-dark">
                Password
              </label>
              <input type="password" name="password"  
              @if (old('password'))
                  value="{{old('password')}}"
              @else
                  
              @endif
              class="form-control" autocomplete="off">  
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

