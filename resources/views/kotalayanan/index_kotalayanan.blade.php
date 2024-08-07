@extends('templates/template')

@section('views')
<div id="response-data"></div>
<div class="col-12 col-md-8 col-lg-6">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-6">
                    <div class="input-group">
                        <input type="text" name="form-search" class="form-control" id="form-search" placeholder="Cari Kota / Kabupaten">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="button" onclick="reload()">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-6">
                    <div class="input-group">
                        <select name="filter-provinsi" id="filter-provinsi" class="form-control" onchange="reload()">
                            <option value="">-- Pilih Provinsi --</option>
                            @foreach ($provinsi as $prov)
                                <option value="{{$prov->id_provinsi}}">{{$prov->nama_provinsi}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md col-xs-6">
                    <div class="float-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-success tambah" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tb" class="table table-bordered table-striped text-nowrap" style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="width: 5%; white-space: nowrap; text-align: center;">No</th>
                            <th style="white-space: nowrap; text-align: center;">Kota/Kab</th>
                            <th style="white-space: nowrap; text-align: center;">Provinsi</th>
                            <th style="white-space: nowrap; text-align: center;">Pengelola</th>
                            <th style="width: 10%; white-space: nowrap; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahLabel">Tambah Kota Layanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url("savekotalayanan")}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label>Pilih Kota</label>
                        <select name="id_kota" id="id_kota" class="form-control" required>
                            <option value="">-- Pilih Kota --</option>
                            @foreach ($kota as $show)
                                <option value="{{$show->id_kota}}">{{$show->nama_kota}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" class="form-control" name="latitude">
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" class="form-control" name="longitude">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger batal" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                    <button type="submit" class="btn btn-success simpan" id="btn-save"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="pengelola" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahLabel">Atur Pengelola Kota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="alert-success"></div>
                <form id="formPengelola">
                    @csrf
                    <label for="">Cari Pengguna</label>
                    <input type="hidden" name="fk_id_kota">
                    <div class="input-group">
                        <select name="id_pengguna" id="id_pengguna" class="form-control select2" required>
                            <option value="">-- Pilih Pengguna --</option>
                            @foreach ($pengguna_pengelola as $show)
                                <option value="{{$show->id_pengguna}}">{{$show->nama_lengkap}}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success" id="btn-simpan"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-body p-0">
                <div class="table-responsive">
                    <table id="tb_pengelola" class="table table-bordered table-striped text-nowrap" style="width: 100%;">
                        <thead>
                            <th style="width: 5%">No</th>
                            <th style="width: 20%">No Handphone</th>
                            <th style="width: 30%">Email</th>
                            <th style="width: 40%">Nama Lengkap</th>
                            <th style="width: 5%">Aksi</th>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger batal" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
            </div>
        </div>
    </div>
</div>
<script>
    let id_kota_layanan;
	var table
    var tablePengelola
	$(function() {
		table = $('#tb').DataTable({
			processing: true,
			serverSide: true,
			searching: false,
			ajax: {
				url: '{!! route("layanan.listDataKotaLayanan") !!}',
				method: 'post',
				data: (data) => {
					data._token = '{{csrf_token()}}'
					data.search = $("#form-search").val()
                    data.provinsi = $("#filter-provinsi").val()
				}
			},
			"columnDefs": [{
				"orderable": false,
				"targets": [],
			}],
			columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama_kota'
                },
                {
                    data: 'nama_provinsi'
                },
                {
                    data: 'pengelola'
                },
                {
                    data: 'action',
                }
            ]
		});

        tablePengelola = $('#tb_pengelola').DataTable({
			processing: true,
			serverSide: true,
			searching: false,
			ajax: {
				url: '{!! route("pengguna.listDataPengelola") !!}',
				method: 'post',
				data: (data) => {
					data._token = '{{csrf_token()}}'
                    data.id_kota = $("[name='fk_id_kota']").val()
				}
			},
			"columnDefs": [{
				"orderable": false,
				"targets": [],
			}],
			columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'no_handphone'
                },
                {
                    data: 'alamat_email'
                },
                {
                    data: 'nama_lengkap'
                },
                {
                    data: 'action',
                }
            ]
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

    const tambah = $(".tambah");
    tambah.on('click', () => {
        $('[name="id_kota"]').val("")
        $('[name="latitude"]').val("")
        $('[name="longitude"]').val("")
        $("[name='id']").val("")
        $("#btn-save").removeAttr("disabled", "").html("Simpan")
    })

    const del = (id) => {
        if (confirm('Apakah Anda yakin?')) {
            $.ajax({
                type: "POST",
                url: "{{url('kotalayanan/delete')}}",
                data: {
                    id,
                    _token: '{{csrf_token()}}'
                },
                dataType: "JSON",
                success: function(response) {
                    reload()
                    $('#response-data').html('');
                    $('<div class="alert alert-success alert-dismissible" id="response-data" style="font-weight: bold;">Berhasil hapus</div>').show().appendTo('#response-data');
                    $('#response-data').delay(2750).slideUp('slow', function() {
                        $(this).remove();
                    });
                }
            });
        }
    }

    $(".batal").on('click', () => {
        $("#tambahLabel").html("Tambah Kota Layanan")
    })

    const ubah = async (id) => {
        $("#tambahLabel").html("Edit Kota Layanan")
        id_kota_layanan = id;
        $.ajax({
            url: `{{ url('kotalayanan/reqData') }}/${id}`,
            type: 'POST',
            data: {
                _token: '{{csrf_token()}}'
            },
            success: (data) => {
                const res = JSON.parse(data)
                $("#tambah").modal('show')
                $("[name='id']").val(id)
                $('[name="id_kota"]').val(res.id_kota)
                $('[name="latitude"]').val(res.latitude)
                $('[name="longitude"]').val(res.longitude)
                $("#btn-save").removeAttr("disabled", "").html("Simpan")
            }
        })
    }

    const pengelola = async (id_kota) => {
        $("#pengelola").modal('show')
        $("[name='fk_id_kota']").val(id_kota)
    }

    $("#formPengelola").on('submit', (e) => {
        e.preventDefault();
        $("#btn-simpan").attr("disabled", "").html("Sedang upload")
        const fk_id_kota = $('[name="fk_id_kota"]').val()
        const id_pengguna = $('[name="id_pengguna"]').val()
        if (fk_id_kota && id_pengguna) {
            $.ajax({
                url: '{{ url("pengguna/addPengelola") }}',
                data: new FormData($('#formPengelola')[0]),
                method: 'post',
                dataType: 'json',
                contentType: false,
                processData: false,
                success: (res) => {
                    reload()
                    reloadPengelola()
                    $('#alert-success').html('');
                    $(window).scrollTop(0);
                    $(`<div class="alert alert-success" id="alert-data"><span font-weight: bold;">Berhasil Menambah!</span></div>`).show().appendTo('#alert-success');
                    $('#alert-data').delay(2750).slideUp('slow', function() {
                        $(this).remove();
                    });
                    $("#btn-simpan").removeAttr("disabled", "").html(`<i class="fa fa-save"></i> Simpan`)
                }
            });
        }
    })

    const reloadPengelola = () => {
		tablePengelola.ajax.reload()
	}
</script>
@endsection
