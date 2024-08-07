@extends('templates/template')
@section('views')
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card">
            <form action="{{url("banks")}}" method="post" id="form">
                @csrf
                <input type="hidden" name="id" value="{{@$data['id_bank']}}">
                <div class="card-header">
                    <a href="{{url("banks")}}" class="btn btn-warning"><i class="fas fa-chevron-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan
                    </button>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Bank</label>
                        <input type="text" class="form-control" name="nama_bank"
                               value="{{old('nama_bank', @$data['nama_bank'])}}" required>
                        @error('nama_bank')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                    </div>

                    <div class="form-group">
                        <label for="">Kode Bank</label>
                        <input type="text" class="form-control" name="kode_bank"
                               value="{{old('kode_bank', @$data['kode_bank'])}}" required>
                        @error('kode_bank')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                    </div>

                    <div class="form-group">
                        <label for="">Logo Bank</label>
                        <input type="url" class="form-control" name="logo"
                               value="{{old('logo', @$data['logo'])}}">
                        @error('logo')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                        <small class="text-muted">URL logo berformat svg</small>
                    </div>

                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan"
                               value="{{old('keterangan', @$data['keterangan'])}}"
                               autocomplete="off" required>
                        @error('keterangan')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection