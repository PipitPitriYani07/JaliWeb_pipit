@extends('templates/template')
@section('views')
<div class="row">
    <div class="col-lg-6 col-12">
        <div class="card">
            <form action="{{url("savetarif")}}" method="POST" id="form">
                <div class="card-header">
                <a href="{{url("tarif")}}" class="btn btn-warning"><i class="fas fa-chevron-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-success float-end"><i class="fas fa-save"></i> Simpan</button>
                </div>
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="id" value="{{@$data['id_tarif']}}">
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga Tarif"
                            value="{{old('harga', @$data['harga'])}}" required>
                        <input type="hidden" name="harga_lama" value="{{@$data['harga']}}">
                        @error('harga')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Tarif</label>
                        <select name="id_jenis_tarif" class="form-control select2" required>
                            <option value="">--Pilih Jenis Tarif--</option>
                            @foreach ($jenis_tarif as $jt)
                            @php
                            $selected = $jt->id_jenis_tarif == @$data['id_jenis_tarif'] ? 'selected' : ''
                            @endphp
                            <option value="{{$jt->id_jenis_tarif}}" {{$selected}}>{{$jt->jenis_tarif}}</option>
                            @endforeach
                        </select>
                        @error('id_jenis_tarif')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                    </div>
                    <div class="form-group">
                        <label for="">Layanan</label>
                        <select name="id_layanan" class="form-control select2" required>
                            <option value="">--Pilih Layanan--</option>
                            @foreach ($layanan as $pL)
                            @php
                            $selected = $pL->id_layanan == @$data['id_layanan'] ? 'selected' : ''
                            @endphp
                            <option value="{{$pL->id_layanan}}" {{$selected}}>{{$pL->nama_layanan}}</option>
                            @endforeach
                        </select>
                        @error('id_layanan')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                    </div>
                    <div class="form-group">
                        <label for="">Kota</label>
                        <select name="id_kota" class="form-control select2" required>
                            <option value="">--Pilih Kota--</option>
                            @foreach ($kota as $kt)
                            @php
                            $selected = $kt->id_kota == @$data['id_kota'] ? 'selected' : ''
                            @endphp
                            <option value="{{$kt->id_kota}}" {{$selected}}>{{$kt->nama_kota}}</option>
                            @endforeach
                        </select>
                        @error('id_kota')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                    </div>
                    <div class="form-group">
                        <label for="">Jarak Tarif</label>
                        <select name="id_jarak_tarif" class="form-control select2" required>
                            <option value="">--Pilih Jarak Tarif--</option>
                            @foreach ($jarak_tarif as $pjt)
                            @php
                            $selected = $pjt->id_jarak_tarif == @$data['id_jarak_tarif'] ? 'selected' : ''
                            @endphp
                            <option value="{{$pjt->id_jarak_tarif}}" {{$selected}}>{{$pjt->jarak_tarif}}</option>
                            @endforeach
                        </select>
                        @error('id_jarak_tarif')
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
