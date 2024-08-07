@extends('templates/template')

@section('views')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3">
                <b class="display-6">Lokasi</b><br>
                <a href="{{url("pengaturan_wilayah")}}" class="text-muted">Pengaturan Wilayah</a><br>
                <br>
                <b class="display-6">Biaya</b><br>
                <a href="{{url("lainnya/bagi-hasil")}}" class="text-muted">Bagi Hasil</a><br>
            </div>
            <div class="col-lg-3">
                <b class="display-6">Tarif</b><br>
                <a href="{{url("jenis_tarif")}}" class="text-muted">Jenis Tarif</a><br>
                <a href="{{url("jarak")}}" class="text-muted">Jarak</a><br>
            </div>
            <div class="col-lg-3">
                <b class="display-6">Pesanan Makan</b><br>
                <a href="{{url("kategori-restoran")}}" class="text-muted">Kategori Restoran</a><br>
            </div>
            <div class="col-lg-3">
                <b class="display-6">Bank</b><br>
                <a href="{{url("banks")}}" class="text-muted">Daftar Bank</a><br>
                <a href="{{url("banks/account")}}" class="text-muted">Rekening Jali</a><br>
            </div>
        </div>
    </div>
</div>
@endsection
