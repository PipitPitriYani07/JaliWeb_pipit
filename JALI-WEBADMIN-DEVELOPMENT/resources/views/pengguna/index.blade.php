@extends('templates/template')

@section('views')
<div class="row">
  <div class="col-lg-12">
    @if(session()->has('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
    @endif
    <div id="flashdata"></div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Admin</span>
        <span class="info-box-number">{{$total_admin}}</span>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Admin Kota</span>
        <span class="info-box-number">{{$total_admin_kota}}</span>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Konsumen</span>
        <span class="info-box-number">{{$total_konsumen}}</span>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Mitra</span>
        <span class="info-box-number">{{$total_mitra}}</span>
      </div>
    </div>
  </div>
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <div class="row justify-content-between">
          <div class="col-3">
            <select name="jenis_pengguna" id="jenis_pengguna" class="form-control" onchange="reload()">
              <option value="">-- Pilih Jenis Pengguna --</option>
              @foreach ($jenis_pengguna as $jp)
                  <option value="{{$jp->id_jenis_pengguna}}" {{session()->get('pengguna_jp') == $jp->id_jenis_pengguna ? 'selected' : ''}}>{{$jp->jenis_pengguna}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-3">
                    <div class="input-group">
                        <input type="text" name="cari" class="form-control" id="cari" placeholder="Cari data pengguna">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="button" onclick="reload()">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
          </div>
          <div class="col-6">
            <div class="float-right">
              <a href="{{url("pengguna/form")}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-bordered" id="table" style="width: 100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Lengkap</th>
              <th>Email</th>
              <th>No Handphone</th>
              <th>Terakhir Login</th>
              <th>Jenis Pengguna</th>
              <th>Jalur Pendaftaran</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
	var table
	$(function() {
		table = $('#table').DataTable({
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
				url: '{!! route("pengguna.listData") !!}',
				method: 'post',
				data: (data) => {
					data._token = '{{csrf_token()}}'
					data.cari = $("#cari").val()
          data.jenis_pengguna = $("#jenis_pengguna").val()
				}
			},
			"columnDefs": [{
				"orderable": false,
				"targets": [0,1, 2, 3, 5, 6, 7],
			}],
			columns: [
        {
          data: 'DT_RowIndex',
          name: 'DT_RowIndex',
          orderable: false,
          searchable: false
        },
        {
          data: 'nama_lengkap',
          orderable: false,
          searchable: false
        },
        {
          data: 'alamat_email',
          orderable: false,
          searchable: false
        },
        {
          data: 'no_handphone',
          orderable: false,
          searchable: false
        },
        {
          data: 'terakhir_login',
          orderable: false,
          searchable: false
        },
        {
          data: 'jenis_pengguna',
          orderable: false,
          searchable: false
        },
        {
          data: 'jalur_pendaftaran',
          orderable: false,
          searchable: false
        },
        {
          data: 'action',
          orderable: false,
          searchable: false
        }
      ]
		});
	});

	const reload = () => {
		table.ajax.reload()
	}

	const hapusPengguna = (id) => {
		if (confirm('Apakah Anda yakin?')) {
        $.ajax({
          type: "POST",
          url: "{{url('pengguna/delete')}}",
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

	$(document).keyup(function(event) {
		if ($("[name='cari']").is(":focus") && event.key == "Enter") {
			reload()
		}
	});
</script>
@endsection
