@extends('templates/template')

@section('views')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <div class="row justify-content-between">
          <div class="col-lg-3">
            <select name="status" id="form-status" class="form-control" onchange="reload()">
              <option value="">-- Pilih Status --</option>
              @foreach ($status as $stts)
                <option value="{{ $stts->id_status_transaksi }}">{{ $stts->status }}</option>
              @endforeach
            </select>
          </div>

          <div class="col-lg-6">
            <div class="row ml-0">
              <div class="col-lg-5">
                <input type="date" class="form-control" id="form-mulai" onchange="reload()" value="{{date('Y-m-d')}}">
              </div>
              <div class="col-lg-1">
                <b>s/d</b>
              </div>
              <div class="col-lg-5">
                <input type="date" class="form-control" id="form-selesai" onchange="reload()" value="{{date('Y-m-d')}}">
              </div>
              <div class="col-lg-1"></div>
            </div>
          </div>
          <div class="col-3">
            <div class="float-right">
              <div class="input-group">
                <input type="text" name="cari" class="form-control" id="cari" placeholder="Cari data penarikan">
                <div class="input-group-append">
                  <button class="btn btn-success" type="button" onclick="reload()">
                    <i class="fa fa-search"></i>
                  </button>
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
                  <th style="white-space: nowrap;">Waktu Permintaan</th>
                  <th style="white-space: nowrap;">Nominal</th>
                  <th style="white-space: nowrap;">Pengguna</th>
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
				url: '{!! route("penarikan.listData") !!}',
				method: 'post',
				data: (data) => {
					data._token = '{{csrf_token()}}'
					data.search_pengguna = $("#cari").val()
          data.status = $("#form-status").val()
          data.mulai = $("#form-mulai").val()
          data.selesai = $("#form-selesai").val()
				}
			},
			"columnDefs": [{
				"orderable": false,
				"targets": [0, 1, 2, 3, 4, 5],
			}],
			columns: [
        {
          data: 'DT_RowIndex',
          name: 'DT_RowIndex',
          orderable: false,
          searchable: false
        },
        {
          data: 'waktu_permintaan'
        },
        {
          data: 'nominal'
        },
        {
          data: 'pengguna'
        },
        {
          data: 'status'
        },
        {
          data: 'action',
        }
      ],
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
