@php
  use Illuminate\Support\Facades\DB;
  use App\Libraries\IndoTime;
  $indotime = new IndoTime();

  $status = '';
  switch ($data['id_status_transaksi']) {
    case '00':
      $status = '<span class="badge bg-secondary">Keranjang</span>';
      break;
    case '10':
      $status = '<span class="badge bg-secondary">Mencari Driver</span>';
      break;
    case '11':
      $status = '<span class="badge bg-info">Mitra Menuju Tempatmu</span>';
      break;
    case '12':
      $status = '<span class="badge bg-warning">Menunggu Pembayaran</span>';
      break;
    case '13':
      $status = '<span class="badge bg-primary">Menunggu Verifikasi</span>';
      break;
    case '21':
      $status = '<span class="badge bg-danger">Dibatalkan Konsumen</span>';
      break;
    case '22':
      $status = '<span class="badge bg-danger">Dibatalkan Mitra</span>';
      break;
    case '23':
      $status = '<span class="badge bg-danger">Dibatalkan Sistem</span>';
      break;
    case '24':
      $status = '<span class="badge bg-success">Topup Selesai</span>';
      break;
    case '25':
      $status = '<span class="badge bg-success">Transaksi Selesai</span>';
      break;
    default:
      $status = '';
      break;
  }

  $pengguna = DB::table('pengguna')->where('id_pengguna', $data['id_pengguna'])->first();
  $nominal = 'Rp. ' . number_format($data['nominal'], 0, ',', '.');
  $waktu_permintaan = $data['waktu_permintaan'] ? $indotime->convertDateTime($data['waktu_permintaan'], 3) . ' WIB' : '-';
  $rekening_pengguna = DB::table('rekening_bank_pengguna')->where('id_rekening_bank_pengguna', $data['id_rekening_bank_pengguna'])->first();
  $pengguna_verifikasi = DB::table('pengguna')->where('id_pengguna', $data['id_pengguna_verifikator'])->first();
  $waktu_selesai = $data['waktu_selesai'] ? $indotime->convertDateTime($data['waktu_selesai'], 3) . ' WIB' : '-';
  $bank_tujuan = DB::table('bank')->where('id_bank', $rekening_pengguna->id_bank)->first();
@endphp
@extends('templates/template')

@section('views')
<div class="row">
  <div class="col-lg-8">
    <div id="flashdata"></div>

    <div class="card card-primary card-outline">
      <div class="card-header">
        <div class="row justify-content-between">
          <div class="mr-auto gap-x-2">
            <a href="{{url("penarikan")}}" class="btn btn-warning" style="color: white">
              <i class="fa fa-angle-left"></i> Kembali
            </a>
          </div>
          <div class="ml-auto">
            <div class="btn-group" role="group">
              <button id="btnGroupDrop1" type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
                <i class="fa fa-cog"></i> Aksi
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <!-- <button class="dropdown-item has-icon" onclick="openModalStatus()">Ubah Status</button> -->
                @if ($data['id_status_transaksi'] == '13')
                    <a class="dropdown-item" onclick="verifikasi({{$data['id_penarikan']}})" style="cursor: pointer;">Verifikasi</a>
                    <a class="dropdown-item" onclick="tolak({{$data['id_penarikan']}})" style="cursor: pointer;">Tolak</a>
                @else
                    <a class="dropdown-item" onclick="errorStatus()" style="cursor: pointer;">Verifikasi</a>
                    <a class="dropdown-item" onclick="errorStatus()" style="cursor: pointer;">Tolak</a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <dl class="row">
          <dt class="col-lg-3">Nama Pengguna</dt>
          <dd class="col-lg-9">: <a href="{{url('pengguna/' . base64_encode($pengguna->id_pengguna))}}">{{$pengguna->nama_lengkap}}</a></dd>
          <dt class="col-lg-3">Nominal</dt>
          <dd class="col-lg-9">: {{$nominal}}</dd>
          <dt class="col-lg-3">Waktu Permintaan</dt>
          <dd class="col-lg-9">: {{$waktu_permintaan}}</dd>
          <dt class="col-lg-3">Bank Tujuan</dt>
          <dd class="col-lg-9">: {{$bank_tujuan->nama_bank}}</dd>
          <dt class="col-lg-3">Rekening Tujuan</dt>
          <dd class="col-lg-9">: {{$rekening_pengguna->no_rekening . ' (a.n ' . $rekening_pengguna->nama_pemilik . ')'}}</dd>
          <dt class="col-lg-3">Diverifikasi Oleh</dt>
          <dd class="col-lg-9">: <?= $data['id_pengguna_verifikator'] ? '<a href="' . url('pengguna/' . base64_encode($pengguna_verifikasi->id_pengguna)) . '">' . $pengguna_verifikasi->nama_lengkap . '</a>' : '-' ?></dd>
          <dt class="col-lg-3">Waktu Selesai</dt>
          <dd class="col-lg-9">: {{$waktu_selesai}}</dd>
          <dt class="col-lg-3">Status</dt>
          <dd class="col-lg-9">: <?=$status?></dd>
        </dl>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalStatus" tabindex="-1" aria-labelledby="modalStatusLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalStatusLabel">Ubah Status Penarikan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">ID Penarikan</label>
          <input type="text" class="form-control" placeholder="ID Penarikan" id="id-penarikan" value="{{$data['id_penarikan']}}">
        </div>
        <div class="form-group">
          <label for="">Pilih Status</label>
          <select name="" id="pilih-status" class="form-control">
            @foreach ($status_penarikan as $item)
              {{ $selected = $data['id_status_transaksi'] == $item->id_status_transaksi ? 'selected' : '' }}
              <option value="{{ $item->id_status_transaksi }}" {{ $selected }}>
              {{ $item->status }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" class="form-control" id="password">
          <small>Masukan password login Anda</small>
          <div id="password-salah" class="text-danger"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success" onclick="checkPassword()">Simpan</button>
      </div>
    </div>
  </div>
</div>
<script>
  const openModalStatus = () => {
    $("#modalStatus").modal()
    $("#password-salah").html('')
    $("#id-penarikan").removeClass('is-invalid')
    $("#password").removeClass('is-invalid')
  }

  const checkPassword = async () => {
    const inputId = $("#id-penarikan").val()
    const password = $("#password").val()

    if(inputId === ''){
      $("#id-penarikan").addClass('is-invalid')
    } else if(password === ''){
      $("#password").addClass('is-invalid')
    }else{
      const req = await fetch(`{{url('penarikan/check-password')}}`, {
        method: 'POST',
        body: JSON.stringify({ password, _token: '{{ csrf_token() }}' }),
        headers: {
          'Content-Type': 'application/json'
        },
      })
      if(req.status === 401){
        $("#password-salah").html('<small class"text-danger">Password Salah</small>')
      }else{
        ubahStatus()
      }
    }
  }

  const ubahStatus = async () => {
    const id = $("#id-penarikan").val()
    const status = $("#pilih-status").val()
    const req = await fetch(`{{url('penarikan/ubah-status')}}`, {
      method: 'POST',
      body: JSON.stringify({ id, status, _token: '{{ csrf_token() }}' }),
      headers: {
        'Content-Type': 'application/json'
      },
    })
    console.log(req);
    if(req.status === 200){
      location.reload()
    }
  }

  const verifikasi = async (id) => {
		if (confirm('Apakah Anda yakin?')) {
      const req = await fetch(`{{url('penarikan/verifikasi')}}`, {
        method: 'POST',
        body: JSON.stringify({ id, _token: '{{ csrf_token() }}' }),
        headers: {
          'Content-Type': 'application/json'
        },
      })
      if(req.status === 401){
        window.location.reload();
        errorSaldo();
      } else if (req.status === 400) {
        window.location.reload();
        error();
      } else{
        $('#flashdata').html('');
        $('<div class="alert alert-success alert-dismissible" id="alert" style="font-weight: bold;">Berhasil melakukan verifikasi</div>').show().appendTo('#flashdata');
        $('#alert').delay(2750).slideUp('slow', function() {
          $(this).remove();
          window.location.reload();
        });
      }
    }
	}

  const tolak = async (id) => {
		if (confirm('Apakah Anda yakin?')) {
      const req = await fetch(`{{url('penarikan/tolak')}}`, {
        method: 'POST',
        body: JSON.stringify({ id, _token: '{{ csrf_token() }}' }),
        headers: {
          'Content-Type': 'application/json'
        },
      })
      if(req.status === 401){
        window.location.reload();
        errorSaldo();
      } else if (req.status === 400) {
        window.location.reload();
        error();
      } else{
        $('#flashdata').html('');
        $('<div class="alert alert-success alert-dismissible" id="alert" style="font-weight: bold;">Berhasil menolak</div>').show().appendTo('#flashdata');
        $('#alert').delay(2750).slideUp('slow', function() {
          $(this).remove();
          window.location.reload();
        });
      }
    }
	}

  const errorSaldo = () => {
    confirm('Tindakan ini tidak bisa dilakukan karena saldo pengguna tidak mencukupi.');
  }

  const error = () => {
    confirm('Terjadi kesalahan, silahkan coba kembali dalam beberapa saat.');
  }

  const errorStatus = () => {
    confirm('Tidankan ini tidak bisa dilakukan karena Admin sudah Memverifikasi atau Menolak penarikan ini');
  }
</script>
@endsection
