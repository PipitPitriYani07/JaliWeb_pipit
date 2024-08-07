@php
    use Illuminate\Support\Facades\DB;
    $indotime = new App\Libraries\IndoTime();

    $layanan = DB::table('layanan')->where('id_layanan', $transaksi->id_layanan)->first('nama_layanan')->nama_layanan;
    $mitra = DB::table('pengguna')->where('id_pengguna', $transaksi->id_pengguna_mitra)->first('nama_lengkap')->nama_lengkap;
    $waktu_pemesanan = $indotime->convertDateTime($transaksi->waktu_pemesanan, 4);
    $waktu_selesai = $indotime->convertDateTime($transaksi->waktu_selesai, 4);

    $nilaiUlasan = '<i class="fas fa-star" style="color: darkorange;"></i>' . $data['nilai_bintang'];
@endphp

@extends('templates/template')

@section('views')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{url("laporan-ulasan")}}" class="btn btn-warning"><i class="fa fa-double-angle-left"></i> Kembali</a>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">Detail Ulasan</div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-lg-3">ID Transaksi</dt>
                    <dd class="col-lg-9">: <a href="{{url("pemesanan/detail/" . base64_encode($transaksi->id_transaksi))}}" target="_blank">{{$transaksi->id_transaksi}}</a></dd>
                    <dt class="col-lg-3">Nilai Bintang</dt>
                    <dd class="col-lg-9">: <?=$nilaiUlasan?></dd>
                    <dt class="col-lg-3">Judul Ulasan</dt>
                    <dd class="col-lg-9">: {{$data['judul_ulasan']}}</dd>
                    <dt class="col-lg-3">Ulasan</dt>
                    <dd class="col-lg-9">: {{$data['ulasan']}}</dd>
                    <dt class="col-lg-3">Layanan</dt>
                    <dd class="col-lg-9">: {{$layanan}}</dd>
                    <dt class="col-lg-3">Mitra</dt>
                    <dd class="col-lg-9">: <a href="{{url("pengguna/" . base64_encode($transaksi->id_pengguna_mitra))}}" target="_blank">{{$mitra}}</a></dd>
                    <dt class="col-lg-3">Waktu Pemesanan</dt>
                    <dd class="col-lg-9">: {{$waktu_pemesanan}}</dd>
                    <dt class="col-lg-3">Waktu Selesai</dt>
                    <dd class="col-lg-9">: {{$waktu_selesai}}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection
