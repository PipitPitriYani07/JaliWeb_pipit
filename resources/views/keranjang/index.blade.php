@extends('templates/template')

@section('views')
<div class="card">
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="">Cari Transaksi</label>
                    <div class="input-group">
                        <input type="text" name="cari" class="form-control" id="form-search" placeholder="No Transaksi, pemesan, mitra" value="{{session()->get('transaksi_search_pengguna')}}">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="button" id="btn-search" onclick="reload()">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="form-group">
                    <label for="">Layanan</label>
                    <select name="layanan" id="form-layanan" class="form-control" onchange="reload()">
                        <option value="">-- Pilih Layanan --</option>
                        @foreach ($layanan as $showL)
                            <option value="{{$showL->id_layanan}}" {{session()->get('transaksi_layanan') == $showL->id_layanan ? 'selected' : ''}}>{{$showL->nama_layanan}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" id="form-status" class="form-control" onchange="reload()">
                        <option value="">-- Pilih Status --</option>
                        @foreach ($status as $stts)
                            <option value="{{$stts->id_status_transaksi}}" {{session()->get('transaksi_status') == $stts->id_status_transaksi ? 'selected' : ''}}>{{$stts->status}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Tanggal Transaksi</label>
                    <div class="row ml-0">
                        <div class="col-lg-5">
                            <input type="date" class="form-control" id="form-mulai" onchange="reload()" value="{{session()->get('transaksi_mulai') ? session()->get('transaksi_mulai') : date('Y-m-d')}}">
                        </div>
                        <div class="col-lg-2">
                            <b>s/d</b>
                        </div>
                        <div class="col-lg-5">
                            <input type="date" class="form-control" id="form-selesai" onchange="reload()" value="{{session()->get('transaksi_selesai') ? session()->get('transaksi_selesai') : date('Y-m-d')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="tb" class="table table-bordered table-striped text-nowrap" style="width: 100%">
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

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <dl class="row">
                    <dt class="col-sm-4">Jumlah Transaksi</dt>
                    <dd class="col-sm-8" id="jumlah-transaksi">: </dd>
                    <dt class="col-sm-4">Total Harga</dt>
                    <dd class="col-sm-8" id="total-harga">: </dd>
                </dl>
            </div>

            <div class="col-lg-6">
                <dl class="row">
                    <dt class="col-sm-5">Total Bagi Hasil</dt>
                    <dd class="col-sm-7" id="total-bagi-hasil">: </dd>
                    <dt class="col-sm-5">Total Pendapatan Bersih</dt>
                    <dd class="col-sm-7" id="total-penghasilan-bersih">: </dd>
                </dl>
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
			searching: false,
			ajax: {
				url: '{!! route("pemesanan.listData") !!}',
				method: 'post',
				data: (data) => {
					data._token = '{{csrf_token()}}'
					data.search_pengguna = $("#form-search").val()
                    data.status = $("#form-status").val()
                    data.mulai = $("#form-mulai").val()
                    data.selesai = $("#form-selesai").val()
                    data.layanan = $("#form-layanan").val()
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
            ],
            "drawCallback": function(settings) {
                var api = this.api();
                var recordsFiltered = api.page.info().recordsDisplay;
                var data = api.rows().data();
                total = 0;
                total2 = 0;
                total3 = 0;
                var finalTotalHarga = 0;
                var finalTotalBagiHasil = 0;
                var finalTotalPenghasilanBersih = 0;

                for(var i=0; i<data.length; i++) {
                    total += parseInt(data[i].total_harga);
                    total2 += parseInt(data[i].bagi_hasil_mitra);
                    total3 += parseInt(data[i].penghasilan_bersih);

                    finalTotalHarga = total.toLocaleString('id-ID', {style: 'currency', currency: 'IDR'});
                    finalTotalBagiHasil = total2.toLocaleString('id-ID', {style: 'currency', currency: 'IDR'});
                    finalTotalPenghasilanBersih = total3.toLocaleString('id-ID', {style: 'currency', currency: 'IDR'});
                }

                $('#total-harga').html(': ' + finalTotalHarga);
                $('#total-bagi-hasil').html(': ' + finalTotalBagiHasil);
                $('#total-penghasilan-bersih').html(': ' + finalTotalPenghasilanBersih);
                $('#jumlah-transaksi').html(': ' + recordsFiltered);
            }
		});
	});

	const reload = () => {
		table.ajax.reload()
	}

	$(document).keyup(function(event) {
		if ($("#form-search").is(":focus") && event.key == "Enter") {
			reload()
		}
	});
</script>
@endsection
