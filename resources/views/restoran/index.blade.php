@extends('templates/template')

@section('views')
@if(session()->has('success'))
<div class="alert alert-success">
	{{session('success')}}
</div>
@endif
<div id="flashdata"></div>
<div class="card">
  <div class="card-header">
    <div class="row justify-content-between">
      <div class="col-lg-3">
        <div class="form-group">
          <div class="input-group">
            <input type="text" name="cari" class="form-control" id="form-search" placeholder="Cari Nama Restoran">
            <div class="input-group-append">
              <button class="btn btn-success" type="button" id="btn-search" onclick="reload()">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <select name="id_kota_layanan" id="id_kota_layanan" class="form-control" onchange="reload()">
          <option value="">-- Pilih Kota Layanan --</option>
          @foreach ($kota as $showK)
            <option value="{{$showK->id_kota_layanan}}">{{$showK->nama_kota}}</option>
          @endforeach
        </select>
      </div>

      <div class="col-lg-3">
        <select name="id_status_restoran" id="id_status_restoran" class="form-control" onchange="reload()">
          <option value="">-- Pilih Status Restoran --</option>
          @foreach ($status as $showS)
            <option value="{{$showS->id_status_resto}}">{{$showS->status}}</option>
          @endforeach
        </select>
      </div>

      <div class="col-lg-3">
        <div class="float-right">
          <div class="form-group">
            <a href="{{url("restoran/form")}}" class="btn btn-success">
              <i class="fa fa-plus"></i> Tambah
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table id="tb" class="table table-bordered table-striped custom-table" style="width: 100%">
        <thead>
          <tr>
            <th style="width: 5%; white-space: nowrap;">No</th>
            <th style="width: 25%; white-space: nowrap;">Foto Restoran</th>
            <th style="width: 20%; white-space: nowrap;">Nama Restoran</th>
            <th style="width: 25%; white-space: nowrap;">Alamat</th>
            <th style="width: 10%; white-space: nowrap;">Status</th>
            <th style="width: 10%; white-space: nowrap;">Kota</th>
            <th style="width: 5%; white-space: nowrap;">Aksi</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
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
      autoWidth: false,
      ajax: {
        url: '{!! route("restoran.listData") !!}',
        method: 'post',
        data: (data) => {
          data._token = '{{csrf_token()}}';
          data.search = $("#form-search").val()
          data.id_kota_layanan = $("#id_kota_layanan").val()
          data.id_status_restoran = $("#id_status_restoran").val()
        }
      },
      columns: [
        {
          data: 'DT_RowIndex',
          name: 'DT_RowIndex',
          orderable: false,
          searchable: false,
          width: '5%'
        },
        {
          data: 'foto',
          width: '25%'
        },
        {
          data: 'nama_restoran',
          width: '20%'
        },
        {
          data: 'alamat',
          width: '25%'
        },
        {
          data: 'status_restoran',
          width: '10%'
        },
        {
          data: 'kota',
          width: '10%'
        },
        {
          data: 'action',
          name: 'action',
          width: '5%'
        }
      ],
    });
	});

	const reload = () => {
		table.ajax.reload()
	}

  const hapus = (id) => {
		if (confirm('Apakah Anda yakin?')) {
      $.ajax({
        type: "POST",
        url: "{{url('restoran/delete')}}",
        data: {
          id,
          _token: '{{csrf_token()}}'
        },
        dataType: "JSON",
        success: function(response) {
          reload()
          $('#flashdata').html('');
          $('<div class="alert alert-success alert-dismissible" id="alert" style="font-weight: bold;">Berhasil menghapus restoran</div>').show().appendTo('#flashdata');
          $('#alert').delay(2750).slideUp('slow', function() {
            $(this).remove();
          });
        }
      });
    }
	}

	$(document).keyup(function(event) {
		if ($("#form-search").is(":focus") && event.key == "Enter") {
			reload()
		}
	});
</script>
@endsection
