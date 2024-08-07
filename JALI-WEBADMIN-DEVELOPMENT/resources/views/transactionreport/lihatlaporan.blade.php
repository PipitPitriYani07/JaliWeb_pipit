@extends('templates/template')

@section('views')
@php
    use App\Libraries\IndoTime;
    $indotime = new IndoTime();
@endphp
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{ url('laporan-transaksi') }}" class="btn btn-warning" style="color: white;">
                            <i class="fa fa-angle-left"></i> Kembali
                        </a>
                    </div>
                    <div class="col-lg-6">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <dl class="row">
                            <dt class="col-lg-6">Tanggal Mulai</dt>
                            <dd class="col-lg-6">: {{ $indotime->convertDate($tgl_mulai, 4) }}</dd>
                            <dt class="col-lg-6">Tanggal Akhir</dt>
                            <dd class="col-lg-6">: {{ $indotime->convertDate($tgl_selesai, 4) }}</dd>
                            <dt class="col-lg-6">Total Penjualan ({{ $jumlah_hari }} hari)</dt>
                            <dd class="col-lg-6">: {{ 'Rp. ' . number_format($total_penjualan, 0, ',', '.') }}</dd>
                        </dl>
                    </div>

                    <div class="col-lg-6">
                        <dl class="row">
                            <dt class="col-lg-6">Jumlah Transaksi</dt>
                            <dd class="col-lg-6">: {{ $jumlah_transaksi }}</dd>
                            <dt class="col-lg-6">Pendapatan Bersih</dt>
                            <dd class="col-lg-6">: {{ 'Rp. ' . number_format($pendapatan_bersih, 0, ',', '.') }}</dd>
                        </dl>
                    </div>

                    <div class="col-lg-12">
                        <input type="hidden" name="tgl_mulai" id="tgl_mulai" value="{{ $tgl_mulai }}">
                        <input type="hidden" name="tgl_selesai" id="tgl_selesai" value="{{ $tgl_selesai }}">
                        <input type="hidden" name="form-status" id="form-status" value="25">
                        <table class="table table-responsive table-bordered" style="width: 100%;" id="tb">
                            <thead>
                                <tr>
                                    <th style="width: 5%; white-space: nowrap;">No</th>
                                    <th style="white-space: nowrap;">No Transaksi</th>
                                    <th style="white-space: nowrap;">Layanan</th>
                                    <th style="white-space: nowrap;">Waktu Pemesanan</th>
                                    <th style="white-space: nowrap;">Pemesan</th>
                                    <th style="white-space: nowrap;">Mitra</th>
                                    <th style="white-space: nowrap;">Total Harga</th>
                                    <th style="white-space: nowrap;">Status</th>
                                    <th style="width: 5%; white-space: nowrap;">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var table
	$(function() {
		table = $('#tb').DataTable({
			processing: true,
            serverSide: true,
            retrieve: true,
            destroy: true,
            order: [],
            searching: false,
            entries: false,
            bLengthChange: false,
            ordering: false,
            autoWidth: false,
			ajax: {
				url: '{!! route("pemesanan.listData") !!}',
				method: 'post',
				data: (data) => {
					data._token = '{{csrf_token()}}'
                    data.mulai = $("#tgl_mulai").val()
                    data.selesai = $("#tgl_selesai").val()
                    data.status = $("#form-status").val()
				}
			},
			"columnDefs": [{
				"orderable": false,
				"targets": [0, 3, 5, 6],
			}],
			columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'id_transaksi'
                },
                {
                    data: 'layanan'
                },
                {
                    data: 'waktu_pesanan'
                },
                {
                    data: 'pemesan'
                },
                {
                    data: 'mitra'
                },
                {
                    data: 'total'
                },
                {
                    data: 'status'
                },
                {
                    data: 'action',
                }
            ]
		});
	});
</script>
@endsection
