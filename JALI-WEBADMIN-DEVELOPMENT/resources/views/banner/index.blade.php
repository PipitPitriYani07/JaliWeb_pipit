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
          <label for="">Posisi Banner</label>
          <select name="id_posisi_banner" id="id_posisi_banner" class="form-control" onchange="reload()">
            <option value="">-- Pilih Posisi Banner --</option>
            @foreach ($posisi as $showP)
              <option value="{{$showP->id_posisi_banner}}">{{$showP->posisi}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="float-right">
          <div class="form-group">
            <label for="" class="d-none"></label><br>
            <a href="{{url("banner/form")}}" class="btn btn-success">
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
            <th style="white-space: nowrap;">Gambar</th>
            <th style="white-space: nowrap;">Judul</th>
            <th style="white-space: nowrap;">Waktu Dibuat</th>
            <th style="white-space: nowrap;">Dibuat Oleh</th>
            <th style="white-space: nowrap;">Posisi</th>
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
        url: '{!! route("banner.listData") !!}',
        method: 'post',
        data: (data) => {
          data._token = '{{csrf_token()}}';
          data.search = $("#form-search").val()
          data.id_posisi_banner = $("#id_posisi_banner").val()
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
          data: 'gambar_banner'
        },
        {
          data: 'judul'
        },
        {
          data: 'waktudibuat'
        },
        {
          data: 'dibuatoleh'
        },
        {
          data: 'posisi'
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

  const hapus = (id) => {
		if (confirm('Apakah Anda yakin?')) {
      $.ajax({
        type: "POST",
        url: "{{url('banner/delete')}}",
        data: {
          id,
          _token: '{{csrf_token()}}'
        },
        dataType: "JSON",
        success: function(response) {
          reload()
          $('#flashdata').html('');
          $('<div class="alert alert-success alert-dismissible" id="alert" style="font-weight: bold;">Berhasil menghapus data</div>').show().appendTo('#flashdata');
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
