@extends('templates/template')
@section('views')
@if(session()->has('success'))
<div class="alert alert-success">
	{{session('success')}}
</div>
@endif
<div id="flashdata"></div>
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="card-body" style="background: #ADD8E6; color: blue;" id="notif">
            Pada menu ini, Anda dapat mengelola wilayah layanan. Pastikan Anda hanya memasukkan kota/kabupaten yang dilayani saja.
        </div>
        <br>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="float-right">
                    <a href="{{url("formprovinsi")}}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="justify-content-evenly">
                    <div class="col-md table-responsive">
                        <table class="table table-stripped table-bordered text-nowrap" id="provinsi" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Provinsi</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div id="response-data"></div>
        <div class="card">
            <div class="card-header">
                <div class="card-body" style="background: #6efc58; color: green; margin: 1%;" id="notif">
                    Silahkan pilih provinsi terlebih dahulu
                </div>

                <div class="row">
                    <div class="col-6">
                        <div id="nama-provinsi"></div>
                    </div>
                    <div class="col-6">
                        <a href="#" class="btn btn-success btn-sm float-right" id="link-kota">
                            <i class="fa fa-plus"></i> Tambah Kota
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body d-none" id="body-kota">
                <table class="table table-stripped table-bordered" id="kota" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Kota/Kab</th>
                            <th>Provinsi</th>
                            <th>Lokasi</th>
                            <th style="width: 5%">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalError" tabindex="-1" aria-labelledby="modalErrorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: auto;">
            <div class="modal-header">
                <h5 class="modal-title" id="modalErrorLabel">Error</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="word-wrap: break-word">Layanan belum ditambahkan untuk wilayah ini, Klik <a href="{{url("layanan")}}">Disini</a> untuk menambahkan layanan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    var tableProvinsi
    var tableKota
    let id_provinsi
	$(function() {
        tableProvinsi = $('#provinsi').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            ajax: {
                url: '{!! route("pengaturan_wilayah.listDataProvinsi") !!}',
                method: 'post',
                data: (data) => {
                data._token = '{{csrf_token()}}';
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama_provinsi'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        });

        tableKota = $('#kota').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            ajax: {
                url: '{!! route("pengaturan_wilayah.listDataKota") !!}',
                method: 'post',
                data: (data) => {
                    data._token = '{{csrf_token()}}';
                    data.id = id_provinsi
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama_kota'
                },
                {
                    data: 'nama_provinsi',
                    name: 'nama_provinsi'
                },
                {
                    data: 'lokasi',
                    name: 'lokasi'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        });
	});

	const reload = () => {
		tableProvinsi.ajax.reload()
	}

    const showKota = async (id) => {
        $("#link-kota").attr('href', `{{url("formkota/")}}/${id}`)
        $("#notif").addClass("d-none")
        $("#body-kota").removeClass("d-none")
        id_provinsi = id
        const options = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id,
                _token: '{{csrf_token()}}'
            })
        }
        const req = await fetch('{!! route("pengaturan_wilayah.ambil-provinsi") !!}', options)
        const {
            nama_provinsi
        } = await req.json()

        $("#nama-provinsi").html(`Provinsi ${nama_provinsi}`)
        tableKota.ajax.reload()
    }

    const hapusProvinsi = (id) => {
		if (confirm('Apakah Anda yakin?')) {
        $.ajax({
          type: "POST",
          url: "{{url('provinsi/delete')}}",
          data: {
            id,
            _token: '{{csrf_token()}}'
          },
          dataType: "JSON",
          success: function(response) {
            reload()
            $('#flashdata').html('');
            $('#check-all').prop('checked', false);
            $('<div class="alert alert-success alert-dismissible" id="alert" style="font-weight: bold;">Berhasil hapus</div>').show().appendTo('#flashdata');
            $('#alert').delay(2750).slideUp('slow', function() {
              $(this).remove();
            });
          }
        });
      }
	}

    const hapusKota = (id) => {
		if (confirm('Apakah Anda yakin?')) {
        $.ajax({
          type: "POST",
          url: "{{url('kota/delete')}}",
          data: {
            id,
            _token: '{{csrf_token()}}'
          },
          dataType: "JSON",
          success: function(response) {
            reloadKota()
            $('#flashdata').html('');
            $('#check-all').prop('checked', false);
            $('<div class="alert alert-success alert-dismissible" id="alert" style="font-weight: bold;">Berhasil hapus</div>').show().appendTo('#flashdata');
            $('#alert').delay(2750).slideUp('slow', function() {
              $(this).remove();
            });
          }
        });
      }
	}

    const reloadKota = () => {
		tableKota.ajax.reload()
	}

  const errorKota = (id) => {
		$("#modalError").modal()
	}
</script>
@endsection
