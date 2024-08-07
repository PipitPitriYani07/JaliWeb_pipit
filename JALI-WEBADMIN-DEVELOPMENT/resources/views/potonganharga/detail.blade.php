@php
    use App\Libraries\IndoTime;
    $indotime = new IndoTime();
@endphp

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
               <div class="card-header">
                    <a href="{{url("potongan-harga")}}" class="btn btn-success">
                        <i class="fa fa-angle-left"></i> Kembali
                    </a>
               </div>
               <div class="card-body">
                    <dl class="row">
                        <dt class="col-lg-3">Kode Promo</dt>
                        <dd class="col-lg-9">: {{$data['kode_promo']}}</dd>
                        <dt class="col-lg-3">Judul Promo</dt>
                        <dd class="col-lg-9">: {{$data['judul_promo']}}</dd>
                        <dt class="col-lg-3">Tgl. Mulai</dt>
                        <dd class="col-lg-9">: {{$indotime->convertDate($data['tanggal_mulai'], 4)}}</dd>
                        <dt class="col-lg-3">Tgl. Selesai</dt>
                        <dd class="col-lg-9">: {{$indotime->convertDate($data['tanggal_selesai'], 4)}}</dd>
                        <dt class="col-lg-3">Nilai</dt>
                        <dd class="col-lg-9">: {{$data['id_jenis_promo'] == '01' || $data['id_jenis_promo'] == '03' ? $data['nilai'] . ' %' : 'Rp. ' . number_format($data['nilai'], 0, ',', '.')}}</dd>
                        <dt class="col-lg-3">Status</dt>
                        <dd class="col-lg-9">: {{$data['status'] == '0' ? 'Tidak Aktif' : 'Aktif'}}</dd>
                        <dt class="col-lg-3">Kuota</dt>
                        <dd class="col-lg-9">: {{$data['kuota']}}</dd>
                        <dt class="col-lg-3">Sisa Kuota</dt>
                        <dd class="col-lg-9">: {{$data['sisa_kuota']}}</dd>
                        <dt class="col-lg-3">Jenis Promo</dt>
                        <dd class="col-lg-9">: {{DB::table('jenis_promo')->where('id_jenis_promo', $data['id_jenis_promo'])->first('jenis_promo')->jenis_promo}}</dd>
                        <dt class="col-lg-3">Penjelasan</dt>
                        <dd class="col-lg-9">: {{$data['penjelasan']}}</dd>
                        <dt class="col-lg-3">Gambar</dt>
                        <dd class="col-lg-9"><img src="{{ url("public/promo/" . $data['gambar']) }}" class="img-thumbnail" width="100%"></dd>
                    </dl>
               </div>
          </div>
     </div>
</div>
@endsection
