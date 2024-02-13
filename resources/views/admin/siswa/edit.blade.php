@extends('admin/layout.master')

@section('title','Siswa')
@section('title2','edit')
@section('siswa','active')
@section('konten')



<div class="card">
  <div class="card-header">
    <h4>Edit siswa</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('siswa.update',$data->nisn) }}" method="POST">
    @method('PATCH')
    @csrf
    <div class="row">

        {{-- nisn --}}
        <div class="col-md-6">
            <div class="form-group">
              <label class="text-dark">
                NISN
              </label>
              <input type="text" name="nisn"
              @if (old('nisn'))
                  value="{{ old('nisn') }}"
                  @else
                  value="{{ $data->nisn }}"
              @endif
               class="form-control" autocomplete="off" readonly="readonly">  
            </div>
          </div>

          {{-- nis --}}
          <div class="col-md-6">
            <div class="form-group">
              <label class="text-dark">
                NIS
              </label>
              <input type="text" name="nis"
              @if (old('nis'))
                  value="{{ old('nis') }}"
              @else
                  value="{{ $data->nis }}"
              @endif
               class="form-control" autocomplete="off" readonly="readonly">  
            </div>
          </div>

          

      <div class="col-md-6">
          <div class="form-group">
          <label class="text-dark">
              Nama siswa 
            </label>
            <input type="text" name="nama"
            @if (old('nama'))
                value="{{ old('nama') }}"
            @else
                value="{{ $data->nama }}"
            @endif
            class="form-control" autocomplete="off">  
          </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="text-dark">
                  Nama kelas
                </label>
                <select name="kelas" class="form-control">
                    @foreach ($kelas as $item)
                    <option value="{{ $item->id_kelas }}">{{ $item->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="text-dark">
                  Alamat
                </label>
                <input type="text" name="alamat" 
                @if (old('alamat'))
                value="{{ old('alamat') }}"
                @else
                value="{{ $data->alamat }}"
                @endif
                class="form-control" autocomplete="off">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                  <label class="text-dark">
                    No telp
                  </label>
                  <input type="text" name="notelp"
                  @if (old('notelp'))
                      value="{{ old('notelp') }}"
                  @else
                      value="{{ $data->no_telp }}"
                  @endif
                  class="form-control" autocomplete="off">        
            </div>
        </div>  

    </div>    
      <div class="card-footer text-right">
        <button class="btn btn-primary mr-1" type="submit">Submit</button>
        <a href="/siswa" class="btn btn-secondary" type="reset">Cancel</a>
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

