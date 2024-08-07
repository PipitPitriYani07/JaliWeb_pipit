@extends('templates/template')

@section('views')
<div class="row">
  <div class="col-lg-8">
    @if(session()->has('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
    @endif
    <div class="card">
      <div class="card-header">Masukkan nilai bagi hasil antara Aplikator dan Mitra. Nilai yang Anda isi adalah nilai untuk Aplikator. Sehingga nilai sisanya adalah nilai bagi hasil untuk mitra.</div>
      <div class="card-body">
        <form action="{{url("lainnya/saveBagiHasil")}}" method="POST" id="form">
          @csrf
          <div class="form-group">
            <label for="">Nilai Bagi Hasil (dalam persen)</label>
            <input type="text" class="form-control" name="nilai" placeholder="Masukkan Nilai Bagi Hasil (dalam persen)"
            value="{{old('nilai', $data->nilai)}}" required>
            <input type="hidden" name="nilai_lama" value="{{$data->nilai}}">
            @error('nilai')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <div class="float-right">
              <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Simpan
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
