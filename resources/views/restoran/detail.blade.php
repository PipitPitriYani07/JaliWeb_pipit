@php
use App\Libraries\IndoTime;
$indotime = new IndoTime();

$status = DB::table('status_resto')
  ->where('id_status_resto', $data['id_status_restoran'])
  ->first();

$pemilik = DB::table('pengguna')
  ->where('id_pengguna', @$data['id_pengguna_pemilik'])
  ->first();

$nama_pemilik = @$pemilik->nama_lengkap ? @$pemilik->nama_lengkap : @$pemilik->alamat_email;
$pemilik_restoran = $data['id_pengguna_pemilik'] ? $nama_pemilik : '-';

$kota_layanan = DB::table('kota_layanan')
  ->join('kota', 'kota.id_kota', '=', 'kota_layanan.id_kota', 'left')
  ->where('id_kota_layanan', $data['id_kota_layanan'])
  ->first();
@endphp

<style>
  #loading1 {
    margin-top: 10px;
    width: 0%;
    height: 20px;
    background-color: green;
    border-radius: 5px;
  }
</style>

@extends('templates/template')

@section('views')
<div id="response-data"></div>
<div id="alert-success"></div>
<div id="flashdata"></div>
<div class="row">
    <div class="col-lg-12">
      <div class="card-body" style="padding-left: 0; padding-top: 0">
        <a href="{{url("restoran")}}" class="btn btn-warning">
          <i class="fa fa-angle-left"></i> Kembali
        </a>
        <div class="float-right">
          <a href="javascript:void(0)" class="btn btn-danger" onclick="openModalHapus()">
            <i class="fa fa-trash"></i> Hapus
          </a>
          <a href="{{url("restoran/form/" . base64_encode($data['id_restoran']))}}" class="btn btn-primary ml-2">
            <i class="fa fa-edit"></i> Edit
          </a>
        </div>
      </div>
    </div>

    <div class="col-lg-5">
      <div class="card">
        <div class="card-header">
          Informasi Restoran
        </div>
        <div class="image">
          <img src="{{url('public/restoran/') . '/' . $data['foto_restoran']}}" class="img-thumbnail" width="100%"/>
        </div>
        <div class="card-body">
          <dl class="row">
            <dt class="col-sm-5">Nama Restoran</dt>
            <dd class="col-sm-7">: {{$data['nama_restoran']}}</dd>
            <dt class="col-sm-5">Alamat</dt>
            <dd class="col-sm-7">: {{$data['alamat']}}</dd>
            <dt class="col-sm-5">Latitude</dt>
            <dd class="col-sm-7">: {{$data['latitude']}}</dd>
            <dt class="col-sm-5">Longitude</dt>
            <dd class="col-sm-7">: {{$data['longitude']}}</dd>
            <dt class="col-sm-5">Waktu Ditambahkan</dt>
            <dd class="col-sm-7">: {{$indotime->convertDateTime($data['waktu_ditambahkan'], 4)}}</dd>
            <dt class="col-sm-5">Status</dt>
            <dd class="col-sm-7">: {{$status->status}}</dd>
            <dt class="col-sm-5">Pemilik</dt>
            <dd class="col-sm-7">: {{$pemilik_restoran}}</dd>
            <dt class="col-sm-5">Kota Layanan</dt>
            <dd class="col-sm-7">: {{$kota_layanan->nama_kota}}</dd>
          </dl>
        </div>
      </div>
    </div>

    <div class="col-lg-7">
      <div class="card">
        <div class="card-header">
          Jam Operasional
          <div class="float-right">
            <button data-toggle="modal" data-target="#tambahJam" class="btn btn-success">
              <i class="fas fa-plus"></i> Tambah
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped text-nowrap" style="width: 100%">
              <thead>
                <tr>
                  <th style="width: 5%; white-space: nowrap;">No</th>
                  <th style="white-space: nowrap;">Hari</th>
                  <th style="white-space: nowrap;">Jam Buka</th>
                  <th style="white-space: nowrap;">Jam Tutup</th>
                  <th style="white-space: nowrap;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                  @if ($jam_operasional)
                  @foreach ($jam_operasional as $d)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      @switch($d->nomor_hari)
                        @case(1)
                          <td>Senin</td>
                          @break
                        @case(2)
                          <td>Selasa</td>
                          @break
                        @case(3)
                          <td>Rabu</td>
                          @break
                        @case(4)
                          <td>Kamis</td>
                          @break
                        @case(5)
                          <td>Jumat</td>
                          @break
                        @case(6)
                          <td>Sabtu</td>
                          @break
                        @case(7)
                          <td>Minggu</td>
                        @break
                          @default
                          <td>-</td>
                      @endswitch
                      <td>{{ $d->jam_buka }}</td>
                      <td>{{ $d->jam_tutup }}</td>
                      <td>
                        <div class="show">
                          <button type="button" class="btn btn-default" data-toggle="dropdown" aria-expanded="true">
                            <i class="fas fa-bars"></i>
                          </button>
                          <div class="dropdown-menu" role="menu" x-placement="bottom-start">
                            <a href="{{ url('jamOperasional/' . base64_encode($d->id_jam_operasional) . '/ubah') }}" class="dropdown-item">Ubah</a>
                            <div class="dropdown-divider"></div>
                            <button type="button" class="dropdown-item" onclick="hapus()"> Hapus</button>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                    @else
                      <tr></tr>
                  @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          List Menu
          <div class="float-right">
            <a href="{{url("restoran/detail/" . base64_encode($data['id_restoran']) . '/kategori-menu')}}" class="btn btn-primary mr-2">
              Kategori Menu
            </a>

            <button data-toggle="modal" data-target="#tambah" class="btn btn-success tambah">
              <i class="fas fa-plus"></i> Tambah
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <input type="hidden" id="id_restoran" value="{{$data['id_restoran']}}">
            <table id="tb_menu" class="table table-bordered table-striped text-nowrap" style="width: 100%">
              <thead>
                <tr>
                  <th style="width: 5%; white-space: nowrap;">No</th>
                  <th style="white-space: nowrap;">Gambar Menu</th>
                  <th style="white-space: nowrap;">Nama Menu</th>
                  <th style="white-space: nowrap;">Deskripsi</th>
                  <th style="white-space: nowrap;">Harga Jual</th>
                  <th style="white-space: nowrap;">Harga Promo</th>
                  <th style="white-space: nowrap;">Kategori Menu</th>
                  <th style="white-space: nowrap;">Ketersediaan Stok</th>
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
        <input type="hidden" name="id_menu">
        <input type="hidden" name="fk_id_restoran" id="fk_id_restoran" value="{{$data['id_restoran']}}">
        <div class="modal-body">
          <div class="form-group">
            <label for="">Nama Menu</label>
            <input type="text" class="form-control" name="nama_menu" placeholder="Masukkan Nama Menu"
            value="{{old('nama_menu')}}" required>
            @error('nama_menu')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi"
            value="{{old('deskripsi')}}" required>
            @error('deskripsi')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Harga Jual</label>
            <input type="text" class="form-control" name="harga_jual" placeholder="Masukkan Harga Jual"
            value="{{old('harga_jual')}}" required>
            @error('harga_jual')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Harga Promo</label>
            <input type="text" class="form-control" name="harga_promo" placeholder="Masukkan Harga Promo"
            value="{{old('harga_promo')}}">
            @error('harga_promo')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Kategori Menu</label>
            <select name="id_kategori_menu" class="form-control" required>
              <option value="">--Pilih Kategori Menu--</option>
              @foreach ($kategori as $ktgr)
              <option value="{{$ktgr->id_kategori_menu}}">{{$ktgr->kategori}}</option>
              @endforeach
            </select>
            @error('id_kategori_menu')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group" id="form-gambar">
            <label for="">Gambar</label>
            <input type="file" class="form-control" accept="image/*" name="gambar" id="gambar" value="{{old('gambar')}}" onchange="sendImg()">
            <input type="hidden" id="gambar_lama" name="gambar_lama">
            <input type="hidden" id="gambar_new" name="gambar_new">
            @error('gambar')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
            <div id="loading1"></div>
            <small id="success1" class="success1"></small><br>
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

{{-- Tambah Jam Operasional --}}
<div class="modal fade" id="tambahJam" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahLabel">Tambah Jam Operasional</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-menu" action="{{ url('restoran/detail/tambah_jam_operasional') }}" method="POST">
        @csrf
        <input type="hidden" name="id_restoran" id="id_restoran" value="{{$data['id_restoran']}}">
        <div class="modal-body">
          <div class="form-group">
            <label for="hari">Hari</label>
            <select name="hari" id="hari" class="form-control" required>
              <option value="">--Pilih Hari--</option>
              <option value="1">Senin</option>
              <option value="2">Selasa</option>
              <option value="3">Rabu</option>
              <option value="4">Kamis</option>
              <option value="5">Jumat</option>
              <option value="6">Sabtu</option>
              <option value="7">Minggu</option>
            </select>
            @error('hari')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Jam Buka</label>
            <div class="input-group date" id="timepicker" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#timepicker" name="jam_buka" id="jam_buka" placeholder="Contoh: 20:00" value="{{old('jam_buka')}}"/>
              <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="far fa-clock"></i></div>
              </div>
            </div>
            <!-- <input type="text" class="form-control" name="jam_buka" id="jam_buka" placeholder="Contoh: 20:00"
            value="{{old('jam_buka')}}" required> -->
            @error('jam_buka')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Jam Tutup</label>
            <div class="input-group date" id="timepicker2" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#timepicker2" name="jam_tutup" id="jam_tutup" placeholder="Contoh: 20:00" value="{{old('jam_tutup')}}"/>
              <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="far fa-clock"></i></div>
              </div>
            </div>
            <!-- <input type="text" class="form-control" name="jam_tutup" id="jam_tutup" placeholder="Contoh: 20:00"
            value="{{old('jam_tutup')}}" required> -->
            @error('jam_tutup')
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

<div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHapusLabel">Apakah Anda yakin akan menghapus? Silakan tuliskan
                    password anda untuk menghapus.
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idrestoran" id="idrestoran" value="{{$data['id_restoran']}}">
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="password">
                    <small>Masukan password login Anda</small>
                    <div id="password-salah" class="text-danger"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" onclick="checkPassword()">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
  $('#loading1').addClass('d-none');
  $('#success1').addClass('d-none');
  var table
  let id_menu;
  $(function() {
    table = $('#tb_menu').DataTable({
      processing: true,
      serverSide: true,
      order: [],
      searching: false,
      entries: false,
      info: false,
      ordering: false,
      bLengthChange: false,
      ajax: {
        url: '{!! route('restoran.listDataMenu') !!}',
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
          data: 'gambar'
        },
        {
          data: 'nama_menu'
        },
        {
          data: 'deskripsi'
        },
        {
          data: 'harga'
        },
        {
          data: 'harga_promo'
        },
        {
          data: 'kategori_menu'
        },
        {
          data: 'ket_stok'
        },
        {
          data: 'action',
          name: 'action'
        }
      ]
    });

    $('#timepicker').datetimepicker({
      format: 'HH:mm'
    })

    $('#timepicker2').datetimepicker({
      format: 'HH:mm'
    })
	});

  const reload = () => {
		table.ajax.reload()
	}

  const sendImg = async () => {
      const apiUrl = '{{ $WEB_USER }}api'
      $('#alert').html(
        '<div class="alert alert-primary alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span style="font-weight: bold;">Sedang upload gambar mohon tunggu</span></div>'
      )
      const fileInput = $("#gambar")
      const file = fileInput[0].files[0]

      const formData = new FormData()
      formData.append('image', file)
      const req = await fetch(`${apiUrl}/upload_file/menu`, {
        method: 'POST',
        body: formData,
      })
      const res = await req.json()

      if(req.status === 200){
        $('[name="gambar_new"]').val(res.nama_gambar)
      }else{
        $('[name="gambar_new"]').val("")
      }
    }

  $(document).ready(function() {
    if ($('#gambar').val() != '' || $('#gambar_lama').val() != '') {
      $("#loading1").animate({
        width: "100%"
      });
      $('.success1').html(`File sudah ada disistem`);
    }

    // $('#gambar').on('change', function() {
    //   const apiUrl = '{{ $WEB_USER }}api'

    //   $('#loading1').removeClass('d-none');
    //   $('#success1').removeClass('d-none');
    //   const fileInput = $("#gambar")
    //   const file = fileInput[0].files[0]

    //   const formData = new FormData()
    //   formData.append('image', file)
    //   const req = await fetch(`${apiUrl}/upload_file/menu`, {
    //     method: 'POST',
    //     body: formData,
    //   })

    //   $('#alert').html('')
    //   if(req.status === 200){
    //     alert('success', 'Berhasil upload gambar')
    //     $('[name="gambar_new"]').val(req.nama_gambar)
    //   }else{
    //     $('[name="gambar_new"]').val("")
    //   }

    //   // let fileName = $(this).val().split('\\').pop();
    //   // if (fileName) {
    //   //   $("#loading1").animate({
    //   //     width: "0%"
    //   //   });
    //   //   $('.success1').html(`Proses...`);
    //   //   $("#loading1").animate({
    //   //     width: "100%"
    //   //   });
    //   //   setTimeout(function() {
    //   //     $('.success1').html(`File ${fileName} berhasil diunggah`).delay(1000);
    //   //   }, 1000);
    //   // } else {
    //   //   $("#loading1").animate({
    //   //     width: "100%"
    //   //   });
    //   //   $('.success1').html(`File sudah ada disistem`);
    //   // }
    // })
  })

  const tambah = $(".tambah");
  tambah.on('click', () => {
    $('[name="nama_menu"]').val("")
    $('[name="deskripsi"]').val("")
    $('[name="harga_jual"]').val("")
    $('[name="harga_promo"]').val("")
    $('[name="gambar"]').val("")
    $('[name="id_kategori_menu"]').val("")
    $("[name='id']").val("")
    $('[name="gambar_new"]').val("")

    $("#btn-save").removeAttr("disabled", "").html("Simpan")
  })

  $("#form-menu").on('submit', (e) => {
    e.preventDefault();
    $("#btn-simpan").attr("disabled", "").html("Sedang upload")
    const nama_menu = $('[name="nama_menu"]').val()
    const deskripsi = $('[name="deskripsi"]').val()
    const harga_jual = $('[name="harga_jual"]').val()
    const id_kategori_menu = $('[name="id_kategori_menu"]').val()
    if (nama_menu && deskripsi && harga_jual && id_kategori_menu) {
      $.ajax({
        url: '{{ url("restoran/saveMenu") }}',
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
          $(`<div class="alert alert-success" id="alert-data"><span font-weight: bold;">${id_menu ? 'Berhasil Update' : 'Berhasil Menambah'}!</span></div>`).show().appendTo('#alert-success');
          $('#alert-data').delay(2750).slideUp('slow', function() {
            $(this).remove();
          });
          // $("#btn-simpan").removeAttr("disabled", "").html(`<i class="fa fa-save"></i> Simpan`)
          $('[name="nama_menu"]').val("")
          $('[name="deskripsi"]').val("")
          $('[name="harga_jual"]').val("")
          $('[name="harga_promo"]').val("")
          $('[name="gambar"]').val("")
          $('[name="gambar_new"]').val("")
          $('[name="id_kategori_menu"]').val("")
          $("[name='id']").val("")
          $("#tambahLabel").html("Tambah Menu")
        }
      });
    }
  })

  const ubah = async (id) => {
    $("#tambahLabel").html("Edit Menu")
    id_menu = id;
    $.ajax({
      url: `{{ url('restoran/reqDataMenu') }}/${id}`,
      type: 'POST',
      data: {
        _token: '{{csrf_token()}}'
      },
      success: (data) => {
        const res = JSON.parse(data)
        $("#tambah").modal('show')
        $("[name='id_menu']").val(id)
        $('[name="id_kategori_menu"]').val(res.id_kategori_menu)
        $('[name="nama_menu"]').val(res.nama_menu)
        $('[name="deskripsi"]').val(res.deskripsi)
        $('[name="harga_jual"]').val(res.harga_jual)
        $('[name="harga_promo"]').val(res.harga_promo)
        // $('[name="gambar"]').val(res.gambar_menu)
        $('[name="gambar_lama"]').val(res.gambar_menu)

        $("#btn-save").removeAttr("disabled", "").html("Simpan")
      }
    })
  }

  const hapus = (id) => {
		if (confirm('Apakah Anda yakin?')) {
      $.ajax({
        type: "POST",
        url: "{{url('restoran/deleteMenu')}}",
        data: {
          id,
          _token: '{{csrf_token()}}'
        },
        dataType: "JSON",
        success: function(response) {
          reload()
          $('#flashdata').html('');
          $('<div class="alert alert-success alert-dismissible" id="alert" style="font-weight: bold;">Berhasil menghapus menu</div>').show().appendTo('#flashdata');
          $('#alert').delay(2750).slideUp('slow', function() {
            $(this).remove();
          });
        }
      });
    }
	}

  function maskJam(element) {
    element.addEventListener('input', function (e) {
      let value = e.target.value;

      value = value.replace(/[^0-9:]/g, '');

      let parts = value.split(':');
      if (parts.length > 2) {
        parts = [parts[0], parts.slice(1).join(':')];
      }

      let hours = parseInt(parts[0], 10);
      let minutes = parseInt(parts[1], 10);
      hours = Math.min(hours, 23);
      minutes = Math.min(minutes, 59);

      value = (hours < 10 ? '0' : '') + hours + ':' + (minutes < 10 ? '0' : '') + minutes;

      e.target.value = value;
    });
  }

  // maskJam(document.getElementById('jam_buka'));
  // maskJam(document.getElementById('jam_tutup'));

  const ubahStok = (id) => {
		if (confirm('Apakah Anda yakin?')) {
      $.ajax({
        type: "POST",
        url: "{{url('restoran/ubah-stok-menu')}}",
        data: {
          id,
          _token: '{{csrf_token()}}'
        },
        dataType: "JSON",
        success: function(response) {
          reload()
          $('#flashdata').html('');
          $('<div class="alert alert-success alert-dismissible" id="alert" style="font-weight: bold;">Berhasil merubah status</div>').show().appendTo('#flashdata');
          $('#alert').delay(2750).slideUp('slow', function() {
            $(this).remove();
          });
        }
      });
    }
	}
</script>

<script>
    const openModalHapus = () => {
        $("#modalHapus").modal()
        $("#password-salah").html('')
        $("#idrestoran").removeClass('is-invalid')
        $("#password").removeClass('is-invalid')
    }

    const checkPassword = async () => {
        const inputId = $("#idrestoran").val()
        const password = $("#password").val()

        if(inputId === ''){
            $("#idrestoran").addClass('is-invalid')
        } else if(password === ''){
            $("#password").addClass('is-invalid')
        } else {
            const req = await fetch(`{{url('restoran/check-password')}}`, {
                method: 'POST',
                body: JSON.stringify({ password, _token: '{{ csrf_token() }}' }),
                headers: {
                    'Content-Type': 'application/json'
                },
            })
            if(req.status === 401){
                $("#password-salah").html('<small class"text-danger">Password Salah</small>')
            }else{
              hapusRestoran()
            }
        }
    }

    const hapusRestoran = () => {
        const inputId = $("#idrestoran").val()
        const id = `{{$data['id_restoran']}}`
        if(inputId === id){
            $(location).prop('href', `{{url('restoran/delete/' . $data['id_restoran'])}}`)
        }else{
            $("#idrestoran").addClass('is-invalid')
        }
    }
</script>
@endsection
