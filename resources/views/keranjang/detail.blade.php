@php
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

$layanan = DB::table('layanan')->where('id_layanan', $data['id_layanan'])->first();
$pemesan = DB::table('pengguna')->where('id_pengguna', $data['id_pengguna_pemesan'])->first();
$mitra = DB::table('pengguna')->where('id_pengguna', $data['id_pengguna_mitra'])->first();

$waktu_mulai = $data['waktu_pemesanan'] ? $indotime->convertDateTime($data['waktu_pemesanan'], 3) . ' WIB' : '-';
$waktu_selesai = $data['waktu_selesai'] ? $indotime->convertDateTime($data['waktu_selesai'], 3) . ' WIB' : '-';

@endphp

@extends('templates/template')

@section('views')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
<style>
    #mapid {
        height: 500px;
    }

    #maptujuan {
        height: 500px;
    }
</style>
<div class="card">
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="mr-auto gap-x-2">
                <a href="{{url("pemesanan")}}" class="btn btn-warning" style="color: white">
                    <i class="fa fa-angle-left"></i> Kembali
                </a>
            </div>
            <div class="ml-auto">
                <a href="{{url("pemesanan/cetak-nota/" . base64_encode($id))}}" class="btn btn-success">
                    <i class="fa fa-print"></i> Cetak Nota
                </a>
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" data-toggle="dropdown"
                        class="btn btn-primary dropdown-toggle">
                        Aksi
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item has-icon" data-toggle="modal" data-target="#modalRiwayat">Lihat
                            Riwayat</button>
                        <button class="dropdown-item has-icon" onclick="openModalStatus()">Ubah Status</button>
                        <div class="dropdown-divider"></div>
                        <button class="dropdown-item has-icon" onclick="openModalHapus()">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <dl class="row">
                    <dt class="col-sm-4">ID Transaksi</dt>
                    <dd class="col-sm-8">: {{$id}}</dd>
                    <dt class="col-sm-4">Waktu Dibuat</dt>
                    <dd class="col-sm-8">: {{$waktu_mulai}}</dd>
                    <dt class="col-sm-4">Pemesan</dt>
                    <dd class="col-sm-8">: {{$pemesan->nama_lengkap}}</dd>
                    <dt class="col-sm-4">Mitra</dt>
                    <dd class="col-sm-8">: {{$data['id_pengguna_mitra'] != null ? $mitra->nama_lengkap : '-'}}</dd>
                </dl>
            </div>

            <div class="col-lg-6">
                <dl class="row">
                    <dt class="col-sm-4">Status</dt>
                    <dd class="col-sm-8">:
                        <?=$status?>
                    </dd>
                    <dt class="col-sm-4">Layanan</dt>
                    <dd class="col-sm-8">: {{$layanan->nama_layanan}}</dd>
                    <dt class="col-sm-4">Waktu Selesai</dt>
                    <dd class="col-sm-8">: {{$waktu_selesai}}</dd>
                    <dt class="col-sm-4">Jarak</dt>
                    <dd class="col-sm-8">: {{$data['jarak'] . ' ' . 'Km'}}</dd>
                </dl>
            </div>
        </div>
        <hr>
        <label for="">Rincian Pembayaran</label>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-nowrap" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="width: 5%">No</th>
                        <th>Item Pembelian</th>
                        <th style="width: 25%">Harga Satuan</th>
                        <th style="width: 25%">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <th>Biaya Perjalanan</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th rowspan="6"></th>
                        <th>Lokasi Awal</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        @if ($data['id_layanan'] == '4')
                            @php
                                $nama_resto = DB::table('menu')->leftJoin('restoran', 'restoran.id_restoran', '=', 'menu.id_restoran')->where('id_menu', $menu_pertama->id_menu)->first();
                            @endphp
                            @if ($nama_resto)
                                <td>{{@$alamat_awal->alamat_awal != null ? $nama_resto->nama_restoran . ', ' . @$alamat_awal->alamat_awal : ' '}}</td>
                            @else
                                <td>{{@$alamat_awal->alamat_awal != null ? @$alamat_awal->alamat_awal : ' '}}</td>
                            @endif
                        @else
                            <td>{{$alamat_awal->alamat_awal != null ? $alamat_awal->alamat_awal : ' '}}</td>
                        @endif
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Lokasi Tujuan</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>{{$alamat_tujuan->alamat_tujuan != null ? $alamat_tujuan->alamat_tujuan : ' ' . '(' .
                            $alamat_tujuan->jarak . ' KM)'}}</td>
                        <td style="text-align: right">{{'Rp. ' . number_format($data['biaya_perjalanan'],0,',','.')}}</td>
                        <td style="text-align: right">{{'Rp. ' . number_format($data['biaya_perjalanan'],0,',','.')}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: right">Total</td>
                        <td style="text-align: right">{{'Rp. ' . number_format($data['biaya_perjalanan'],0,',','.')}}</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <th>Biaya Lainnya</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @if ($data['id_layanan'] == '4')
                        <tr>
                            <td rowspan="{{$total_menu + 1}}"></td>
                            <td>{{$menu_pertama->nama_menu . ' x ' . $menu_pertama->qty}}</td>
                            <td style="text-align: right">{{'Rp. ' . number_format($menu_pertama->harga,0,',','.')}}</td>
                            <td style="text-align: right">{{'Rp. ' . number_format($menu_pertama->sub_total,0,',','.')}}</td>
                        </tr>
                        @foreach ($rincian_menu as $showRM)
                            @if ($showRM->id_rincian_menu != $menu_pertama->id_rincian_menu)
                                <tr>
                                    <td>{{$showRM->nama_menu . ' x ' . $showRM->qty}}</td>
                                    <td style="text-align: right">{{'Rp. ' . number_format($showRM->harga,0,',','.')}}</td>
                                    <td style="text-align: right">{{'Rp. ' . number_format($showRM->sub_total,0,',','.')}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr>
                            <td colspan="2" style="text-align: right">Total</td>
                            <td style="text-align: right">{{'Rp. ' . number_format($data['biaya_makanan'],0,',','.')}}</td>
                        </tr>
                    @else
                        <tr>
                            <td rowspan="2"></td>
                            <td>-</td>
                            <td style="text-align: right">Rp 0</td>
                            <td style="text-align: right">Rp 0</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: right">Total</td>
                            <td style="text-align: right">Rp 0</td>
                        </tr>
                    @endif
                    <tr>
                        <th>3</th>
                        <th>Potongan Harga</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td rowspan="2"></td>
                        <td>{{$data['id_promo'] ? DB::table('promo')->where('id_promo', $data['id_promo'])->first('judul_promo')->judul_promo : '-'}}</td>
                        <td style="text-align: right">{{'Rp. ' . number_format($data['diskon'],0,',','.')}}</td>
                        <td style="text-align: right">{{'Rp. ' . number_format($data['diskon'],0,',','.')}}</td>
                    </tr>
                    @php
                        if ($data['id_layanan'] == '4') {
                            $total_pendapatan = $data['biaya_perjalanan'] + $data['biaya_makanan'] - $data['diskon'];
                        } else {
                            $total_pendapatan = $data['biaya_perjalanan'] - $data['diskon'];
                        }
                    @endphp
                    <tr>
                        <td colspan="2" style="text-align: right">Total</td>
                        <td style="text-align: right">({{'Rp. ' . number_format($data['diskon'],0,',','.')}})</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: right">Total Bayar</td>
                        <td style="text-align: right">{{'Rp. ' . number_format($total_pendapatan,0,',','.')}}</td>
                    </tr>
                </tbody>
            </table>

            <br>

            <table class="table no-border">
                <tbody>
                    <tr>
                        <td rowspan="2" colspan="2"></td>
                        <td style="width: 25%; text-align: right">Bagi Hasil(70%)</td>
                        <td style="width: 25%; text-align: right">{{'Rp. ' .
                            number_format($data['bagi_hasil_mitra'],0,',','.')}}</td>
                    </tr>
                    <tr>
                        <td style="width: 25%; text-align: right">Pendapatan Bersih</td>
                        <td style="width: 25%; text-align: right">{{'Rp. ' .
                            number_format($data['penghasilan_bersih'],0,',','.')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        @if ($alamat_awal)
            <div class="card">
                <div class="card-header">Alamat Awal</div>
                <div class="card-body">
                    <div id="mapid"></div>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHapusLabel">Apakah Anda yakin akan menghapus? Silakan tuliskan
                    <b>{{$id}}</b> untuk menghapus.
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" placeholder="ID Transaksi" id="idTransaksi">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" onclick="hapus()">Hapus</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalStatus" tabindex="-1" aria-labelledby="modalStatusLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalStatusLabel">Ubah Status Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">ID Transaksi</label>
                    <input type="text" class="form-control" placeholder="ID Transaksi" id="id-transaksi"
                        value="{{$id}}">
                </div>
                <div class="form-group">
                    <label for="">Pilih Status</label>
                    <select name="" id="pilih-status" class="form-control">
                        @foreach ($status_transaksi as $item)
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

<div class="modal fade" id="modalRiwayat" tabindex="-1" aria-labelledby="modalRiwayatLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRiwayatLabel">Riwayat Perubahan Status Transaski</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th>Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat_transaksi as $rt)
                        @php
                            $status_trans = '';
                            switch ($rt->id_status_transaksi) {
                                case '00':
                                    $status_trans = '<span class="badge bg-secondary">Keranjang</span>';
                                    break;
                                case '10':
                                    $status_trans = '<span class="badge bg-secondary">Mencari Driver</span>';
                                    break;
                                case '11':
                                    $status_trans = '<span class="badge bg-info">Mitra Menuju Tempatmu</span>';
                                    break;
                                case '12':
                                    $status_trans = '<span class="badge bg-warning">Menunggu Pembayaran</span>';
                                    break;
                                case '13':
                                    $status_trans = '<span class="badge bg-primary">Menunggu Verifikasi</span>';
                                    break;
                                case '21':
                                    $status_trans = '<span class="badge bg-danger">Dibatalkan Konsumen</span>';
                                    break;
                                case '22':
                                    $status_trans = '<span class="badge bg-danger">Dibatalkan Mitra</span>';
                                    break;
                                case '23':
                                    $status_trans = '<span class="badge bg-danger">Dibatalkan Sistem</span>';
                                    break;
                                case '24':
                                    $status_trans = '<span class="badge bg-success">Topup Selesai</span>';
                                    break;
                                case '25':
                                    $status_trans = '<span class="badge bg-success">Transaksi Selesai</span>';
                                    break;
                                default:
                                    $status_trans = '';
                                    break;
                            }
                        @endphp
                        <tr>
                            <td>{{$indotime->convertDateTime($rt->waktu, 3) }}</td>
                            <td><?=$status_trans?></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>

<script>
    const hapus = () => {
        const inputId = $("#idTransaksi").val()
        const id = `{{$id}}`
        if(inputId === id){
            $(location).prop('href', `{{url('pemesanan/delete/' . $id)}}`)
        }else{
            $("#idTransaksi").addClass('is-invalid')
        }
    }
    const openModalHapus = () => {
        $("#modalHapus").modal()
        $("#idTransaksi").removeClass('is-invalid')
    }
    const openModalStatus = () => {
        $("#modalStatus").modal()
        $("#password-salah").html('')
        $("#id-transaksi").removeClass('is-invalid')
        $("#password").removeClass('is-invalid')
    }

    const checkPassword = async () => {
        const inputId = $("#id-transaksi").val()
        const password = $("#password").val()

        if(inputId === ''){
            $("#id-transaksi").addClass('is-invalid')
        } else if(password === ''){
            $("#password").addClass('is-invalid')
        }else{
            const req = await fetch(`{{url('pemesanan/check-password')}}`, {
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
        const id = $("#id-transaksi").val()
        const status = $("#pilih-status").val()
        const req = await fetch(`{{url('pemesanan/ubah-status')}}`, {
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
</script>
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    @if ($alamat_awal)
        var mymap = L.map('mapid').setView([{{ $alamat_awal->latitude }}, {{ $alamat_awal->longitude }}], 12);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 18,
        }).addTo(mymap);

        L.marker([{{ $alamat_awal->latitude }}, {{ $alamat_awal->longitude }}]).addTo(mymap);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 18,
        }).addTo(mymap);

        L.marker([{{ $alamat_tujuan->latitude }}, {{ $alamat_tujuan->longitude }}]).addTo(mymap);
    @endif
</script>
@endsection
