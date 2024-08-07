@extends('templates/template')

@section('views')
<div class="row">
  <div class="col-lg-8">
    @if(session()->has('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
    @endif
    <div id="flashdata"></div>
    <div class="card">
      <div class="card-header">
        <div class="row justify-content-between">
          <div class="col-lg-4">
            <div class="form-group">
              <label for="">Cari Promosi</label>
              <div class="input-group">
                <input type="text" name="cari" class="form-control" id="form-search" placeholder="Cari Kategori">
                <div class="input-group-append">
                  <button class="btn btn-success" type="button" id="btn-search" onclick="reload()">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="float-right">
              <div class="form-group">
                <label for="" class="d-none"></label><br>
                <a href="{{url("kategori-restoran/form")}}" class="btn btn-success">
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
                <th style="white-space: nowrap;">Kategori Restoran</th>
                <th style="width: 5%; white-space: nowrap;">Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
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
      order: [],
      searching: false,
      entries: false,
      info: false,
      ordering: false,
      bLengthChange: false,
      ajax: {
        url: '{!! route("kategori-restoran.listData") !!}',
        method: 'post',
        data: (data) => {
          data._token = '{{csrf_token()}}';
          data.search = $("#form-search").val()
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
          data: 'gambar'
        },
        {
          data: 'kategori_restoran'
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
        url: "{{url('kategori-restoran/delete')}}",
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
