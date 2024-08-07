@php
use App\Libraries\IndoTime;
$indotime = new IndoTime();
@endphp

@extends('templates/template')

@section('views')
<div class="row">
     <div class="col-lg-6">
          @if(session()->has('success'))
              <div class="alert alert-success">
                  {{session('success')}}
              </div>
          @endif
          <div class="card">
               <div class="card-header">
                    <a href="{{url("topup")}}" class="btn btn-success">
                    <i class="fa fa-angle-left"></i> Kembali
                    </a>
                    <div class="btn-group float-right">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            @if ($data->bukti_pembayaran == null || $data->bukti_pembayaran == '-')
                                <a class="dropdown-item" onclick="errorKonfirmasi()">Terima</a>
                                <a class="dropdown-item" onclick="errorKonfirmasi()">Tolak</a>
                            @else
                                @if ($data->id_status_transaksi == '13')
                                    <a class="dropdown-item" href="{{url("topup/konfirmasi/terima/" . $data->id_topup_saldo)}}">Terima</a>
                                    <a class="dropdown-item" href="{{url("topup/konfirmasi/tolak/" . $data->id_topup_saldo)}}">Tolak</a>
                                @else
                                    <a class="dropdown-item" onclick="errorKonfirmasi()">Terima</a>
                                    <a class="dropdown-item" onclick="errorKonfirmasi()">Tolak</a>
                                @endif
                            @endif
                            <a class="dropdown-item" href="{{url("topup/riwayat/" . base64_encode($data->id_topup_saldo))}}">Riwayat Transaksi</a>
                        </div>
                    </div>
               </div>
               <div class="card-body">
                    <table class="w-100">
                         <tbody>
                              <tr>
                                   <td>ID Top Up</td>
                                   <td>: {{ $data->id_topup_saldo }}</td>
                              </tr>
                              <tr>
                                   <td>Waktu Permintaan</td>
                                   <td>: {{$indotime->convertDateTime($data->waktu_permintaan, 4)}}</td>
                              </tr>
                              <tr>
                                   <td>Waktu Selesai</td>
                                   <td>: {{ $data->waktu_selesai ? $indotime->convertDateTime($data->waktu_selesai, 4) : '-' }}</td>
                              </tr>
                              <tr>
                                   <td>Nominal</td>
                                   <td>: {{'Rp ' . number_format($data->nominal,0,',','.')}}</td>
                              </tr>
                              <tr>
                                   <td>Biaya Admin</td>
                                   <td>: {{'Rp ' . number_format($data->biaya_admin,0,',','.')}}</td>
                              </tr>
                              <tr>
                                   <td>Pengguna</td>
                                   <td>: <a href="{{url("pengguna/" . base64_encode($data->id_pengguna))}}"> {{$pengguna}} </a></td>
                              </tr>
                              <tr>
                                   <td>Diverifikasi Oleh</td>
                                    @if (@$data->id_pengguna_verifikator != null)
                                        <td>: <a href="{{url("pengguna/" . base64_encode(@$data->id_pengguna_verifikator))}}"> {{$verifikasi}} </a></td>
                                    @else
                                        <td>: -</td>
                                    @endif
                              </tr>
                              <tr>
                                  <td>Status</td>
                                  <td>:
                                      @php
                                          $status_aktif = '';
                                          switch ($data->id_status_transaksi) {
                                              case '00':
                                                  $status_aktif = '<span class="badge bg-warning">Belum Verifikasi</span>';
                                                  break;
                                              case '24':
                                                  $status_aktif = '<span class="badge bg-success">Topup Selesai</span>';
                                                  break;
                                              case '23':
                                                  $status_aktif = '<span class="badge bg-danger">Topup Ditolak</span>';
                                                  break;
                                              case '12':
                                                  $status_aktif = '<span class="badge bg-secondary">Menunggu Pembayaran</span>';
                                                  break;
                                              case '13':
                                                  $status_aktif = '<span class="badge bg-secondary">Menuggu Verifikasi</span>';
                                                  break;
                                              default:
                                                  $status_aktif = '';
                                                  break;
                                          }

                                          echo $status_aktif;
                                      @endphp
                                  </td>
                              </tr>
                              <tr>
                                   <td>Metode Pembayaran</td>
                                   <td>: Transfer</td>
                              </tr>
                              <tr>
                                   <td>Bukti Bayar</td>
                                    <td>
                                        <a href="javascript:void(0)" class="lightbox" onclick="fullImg()">
                                            <img src="{{ $data->bukti_pembayaran }}" class="img-thumbnail" width="100%">
                                        </a>
                                    </td>
                              </tr>
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
</div>
<div class="modal fade" id="modalFullImg">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Full Img Bukti Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="kontenFullImg">
                    <img src="{{ $data->bukti_pembayaran }}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    const errorKonfirmasi = () => {
        confirm('Tindakan ini belum bisa dilakukan');
    }

    const fullImg = () => {
        $('#modalFullImg').modal();
    }
</script>
@endsection
