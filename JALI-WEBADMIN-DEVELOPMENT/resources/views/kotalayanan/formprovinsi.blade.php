@extends('templates/template')
@section('views')
<div class="row">
    <div class="col-lg-6 col-12">
        <div class="card">
            <form action="{{url("saveprovinsi")}}" method="POST" id="form">
                <div class="card-header">
                    <span style="float: right">
                    <a href="{{url("pengaturan_wilayah")}}" class="btn btn-warning"><i class="fas fa-chevron-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-success float-end"><i class="fas fa-save"></i> Simpan</button>
                    </span>
                </div>
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="id" value="{{@$data['id_provinsi']}}">
                    <div class="form-group">
                        <label for="">Nama Provinsi</label>
                        <input type="text" class="form-control" name="nama_provinsi" placeholder="Masukkan nama provinsi"
                            value="{{old('nama_provinsi', @$data['nama_provinsi'])}}" required>
                        <input type="hidden" name="nama_provinsi_lama" value="{{@$data['nama_provinsi']}}">
                        @error('nama_provinsi')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
