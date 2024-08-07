@extends('templates/template')
@section('views')
<div class="row">
    <div class="col-lg-6 col-12">
        <div class="card">
            <form action="{{url("savekota")}}" method="POST" id="form">
                <div class="card-header">
                <a href="{{url("pengaturan_wilayah")}}" class="btn btn-warning"><i class="fas fa-chevron-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan</button>
                </div>
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="id" value="{{@$data['id_kota']}}">
                    <div class="form-group">
                        <label for="">Nama Kota</label>
                        <input type="text" class="form-control" name="nama_kota" placeholder="Masukkan nama Kota"
                            value="{{old('nama_kota', @$data['nama_kota'])}}" required>
                        <input type="hidden" name="nama_kota_lama" value="{{@$data['nama_kota']}}">
                        @error('nama_kota')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                    </div>
                    <div class="form-group">
                        <label for="">Provinsi</label>
                        <select name="id_provinsi" class="form-control select2" required>
                            <option value="">--Pilih Provinsi--</option>
                            @foreach ($provinsi as $prv)
                            @php
                            $selected = $prv->id_provinsi == @$data['id_provinsi'] ? 'selected' : ''
                            @endphp
                            <option value="{{$prv->id_provinsi}}" {{$prv->id_provinsi == $id_provinsi ? 'selected' : ''}} {{$selected}}>{{$prv->nama_provinsi}}</option>
                            @endforeach
                        </select>
                        @error('id_provinsi')
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
