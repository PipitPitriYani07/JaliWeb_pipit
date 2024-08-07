@extends('templates/template')

@section('views')
<div class="row">
  <div class="col-lg-6">
    <div id="response-data"></div>
    <div id="alert-success"></div>
    <div id="flashdata"></div>
  </div>

  <div class="col-lg-12">
    <div class="card-body" style="padding-left: 0; padding-top: 0">
      <a href="{{url("restoran/detail/" . base64_encode($id_restoran))}}" class="btn btn-warning">
        <i class="fa fa-angle-left"></i> Kembali
      </a>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="card">
      <div class="card-header">
        <div class="float-right">
          <button data-toggle="modal" data-target="#tambah" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <input type="hidden" id="id_restoran" value="{{$id_restoran}}">
          <table id="tb" class="table table-bordered table-striped text-nowrap" style="width: 100%">
            <thead>
              <tr>
                <th style="width: 5%; white-space: nowrap;">No</th>
                <th style="white-space: nowrap;">Kategori</th>
                <th style="width: 5%; white-space: nowrap;">Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahLabel">Tambah Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-menu" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id">
        <input type="hidden" name="fk_id_restoran" id="fk_id_restoran" value="{{$id_restoran}}">
        <div class="modal-body">
          <div class="form-group">
            <label for="">Kategori Menu</label>
            <input type="text" class="form-control" name="kategori" placeholder="Masukkan Kategori Menu"
            value="{{old('kategori')}}" required>
            @error('kategori')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger batal" data-dismiss="modal"><i class="fas fa-times"></i> Batalkan</button>
          <button type="submit" class="btn btn-success simpan" id="btn-save"><i class="fas fa-save"></i> Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  let id_kategori_menu;
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
        url: '{!! route('restoran.listDataKategoriMenu') !!}',
        method: 'post',
        data: (data) => {
          data._token = '{{csrf_token()}}';
          data.search = $("#form-search").val()
          data.id_restoran = $("#id_restoran").val()
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
          data: 'kategori'
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

  const tambah = $(".tambah");
  tambah.on('click', () => {
    $('[name="kategori"]').val("")
    $("[name='id']").val("")

    $("#btn-save").removeAttr("disabled", "").html("Simpan")
  })

  $("#form-menu").on('submit', (e) => {
    e.preventDefault();
    $("#btn-simpan").attr("disabled", "").html("Sedang upload")
    const kategori = $('[name="kategori"]').val()
    const fk_id_restoran = $('[name="fk_id_restoran"]').val()
    if (kategori && fk_id_restoran) {
      $.ajax({
        url: '{{ url("restoran/saveKategoriMenu") }}',
        data: new FormData($('#form-menu')[0]),
        method: 'post',
        dataType: 'json',
        contentType: false,
        processData: false,
        success: (res) => {
          reload();
          $(".batal").trigger('click');
          $('#form-menu').modal('hide');
          $('#alert-success').html('');
          $(window).scrollTop(0);
          $(`<div class="alert alert-success" id="alert-data"><span font-weight: bold;">${id_kategori_menu ? 'Berhasil Update' : 'Berhasil Menambah'}!</span></div>`).show().appendTo('#alert-success');
          $('#alert-data').delay(2750).slideUp('slow', function() {
            $(this).remove();
          });
          // $("#btn-simpan").removeAttr("disabled", "").html(`<i class="fa fa-save"></i> Simpan`)
          $('[name="kategori"]').val("")
          $("[name='id']").val("")
          $("#tambahLabel").html("Tambah Kategori Menu")
        }
      });
    }
  })

  const ubah = async (id) => {
    $("#tambahLabel").html("Edit Kategori Menu")
    id_kategori_menu = id;
    $.ajax({
      url: `{{ url('restoran/reqDataKategoriMenu') }}/${id}`,
      type: 'POST',
      data: {
        _token: '{{csrf_token()}}'
      },
      success: (data) => {
        const res = JSON.parse(data)
        $("#tambah").modal('show')
        $("[name='id']").val(id)
        $('[name="kategori"]').val(res.kategori)

        $("#btn-save").removeAttr("disabled", "").html("Simpan")
      }
    })
  }

  const hapus = (id) => {
		if (confirm('Apakah Anda yakin?')) {
      $.ajax({
        type: "POST",
        url: "{{url('restoran/deleteKategoriMenu')}}",
        data: {
          id,
          _token: '{{csrf_token()}}'
        },
        dataType: "JSON",
        success: function(response) {
          reload()
          $('#flashdata').html('');
          $('<div class="alert alert-success alert-dismissible" id="alert" style="font-weight: bold;">Berhasil menghapus kategori menu</div>').show().appendTo('#flashdata');
          $('#alert').delay(2750).slideUp('slow', function() {
            $(this).remove();
          });
        }
      });
    }
	}
</script>
@endsection
