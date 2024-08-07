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
          <label for="">Cari Promosi</label>
          <div class="input-group">
            <input type="text" name="cari" class="form-control" id="form-search" placeholder="Cari Kode, Judul Promo">
            <div class="input-group-append">
              <button class="btn btn-success" type="button" id="btn-search" onclick="reload()">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="form-group">
          <label for="">Jenis Promo</label>
          <select name="id_jenis_promo" id="id_jenis_promo" class="form-control" onchange="reload()">
            <option value="">-- Pilih Jenis Promo --</option>
            @foreach ($jenis as $showJ)
              <option value="{{$showJ->id_jenis_promo}}">{{$showJ->jenis_promo}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="form-group">
          <label for="">Status</label>
          <select name="status" id="status" class="form-control" onchange="reload()">
            <option value="">-- Pilih Status --</option>
            <option value="0">Tidak Aktif</option>
            <option value="1">Aktif</option>
          </select>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="float-right">
          <div class="form-group">
            <label for="" class="d-none"></label><br>
            <a href="{{url("potongan-harga/form")}}" class="btn btn-success">
              <i class="fa fa-plus"></i> Tambah
            </a>
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
            <th style="white-space: nowrap;">Kode Promo</th>
            <th style="white-space: nowrap;">Judul Promo</th>
            <th style="white-space: nowrap;">Tanggal</th>
            <th style="white-space: nowrap;">Status</th>
            <th style="white-space: nowrap;">Nilai</th>
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
      ajax: {
        url: '{!! route("potongan-harga.listData") !!}',
        method: 'post',
        data: (data) => {
          data._token = '{{csrf_token()}}';
          data.search = $("#form-search").val()
          data.id_jenis_promo = $("#id_jenis_promo").val()
          data.status = $("#status").val()
        }
      },
      columns: [
        {
          data: 'DT_RowIndex',
          name: 'DT_RowIndex',
          orderable: false,
          searchable: false
        },
        {
          data: 'kode_promo'
        },
        {
          data: 'judul_promo'
        },
        {
          data: 'tanggal'
        },
        {
          data: 'status_aktif'
        },
        {
          data: 'nilai_promo'
        },
        {
          data: 'action',
          name: 'action'
        }
      ]
    });
	});

	const reload = () => {
		table.ajax.reload()
	}

  const nonAktif = (id) => {
		if (confirm('Apakah Anda yakin?')) {
      $.ajax({
        type: "POST",
        url: "{{url('potongan-harga/non-aktif')}}",
        data: {
          id,
          _token: '{{csrf_token()}}'
        },
        dataType: "JSON",
        success: function(response) {
          reload()
          $('#flashdata').html('');
          $('<div class="alert alert-success alert-dismissible" id="alert" style="font-weight: bold;">Berhasil menonaktifkan promo</div>').show().appendTo('#flashdata');
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
