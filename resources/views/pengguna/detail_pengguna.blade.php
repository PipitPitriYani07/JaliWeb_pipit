@php
    use App\Libraries\IndoTime;
    $indotime = new IndoTime();
    $data = DB::table('pengguna')
        ->where('id_pengguna', $data['id_pengguna'])
        ->first();
@endphp

@extends('templates/template')

@section('views')
    <div id="alert"></div>
    <div id="flashdata"></div>
    <div class="row">
        <div class="col-lg-3">
            <div class="image">
                @if ($data->foto_profile != null)
                    <img src="{{ $data->foto_profile }}" class="img-thumbnail" width="100%" style="border-box: 100%;" />
                @else
                    <img src="https://th.bing.com/th/id/OIP.fU2cJo35XD6k2J2sNhT2jQHaHa?w=207&h=207&c=7&r=0&o=5&pid=1.7"
                        alt="User Image" class="img-thumbnail" width="100%" style="border-box: 100%;">
                @endif
            </div>
            <br>
            <button class="btn btn-primary btn-md btn-block" onclick="changeImg()">
                Unggah Foto <i class="fa fa-upload"></i>
            </button>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="input-group col-4">
                                        <input type="text" name="cari" class="form-control" id="form-search"
                                            placeholder="Cari data pengguna">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button" id="btn-search"
                                                onclick="reload()">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="float-right">
                                            <a href="{{ url('pengguna') }}" class="btn btn-primary">
                                                <i class="fas fa-chevron-left"></i> Kembali Ke Daftar
                                            </a>
                                            <a href="{{ url('pengguna/kirim_pesan/' . base64_encode($data->id_pengguna)) }}"
                                                class="btn btn-success">
                                                <i class="fas fa-comments"></i>
                                                Kirim Pesan
                                            </a>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" data-toggle="dropdown"
                                                    class="btn btn-warning dropdown-toggle">
                                                    <i class="fas fa-cog"></i> Aksi
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{ url('pengguna/form/' . $data->id_pengguna) }}"
                                                        class="dropdown-item has-icon">Ubah Profile</a>
                                                    @if ($data->id_jenis_pengguna == '12')
                                                        <a href="{{ url('pengguna/form-info-mitra/' . base64_encode($data->id_pengguna)) }}"
                                                            class="dropdown-item has-icon">Ubah Info Mitra</a>
                                                    @endif
                                                    <a href="#" class="dropdown-item has-icon"
                                                        onclick="showModalFirebase()">Token
                                                        Firebase</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="{{ url('pengguna/delete/' . $data->id_pengguna) }}"
                                                        class="dropdown-item has-icon">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <dl class="row">
                                            <dt class="col-sm-4">ID Pengguna</dt>
                                            <dd class="col-sm-8">: {{ $data->id_pengguna }}</dd>
                                            <dt class="col-sm-4">Nama Lengkap</dt>
                                            <dd class="col-sm-8">: {{ $data->nama_lengkap }}</dd>
                                            <dt class="col-sm-4">Alamat email</dt>
                                            <dd class="col-sm-8">: {{ $data->alamat_email }}</dd>
                                        </dl>
                                    </div>

                                    <div class="col-lg-6">
                                        <dl class="row">
                                            <dt class="col-sm-4">No. Handphone</dt>
                                            <dd class="col-sm-8">: {{ $data->no_handphone }}</dd>
                                            <dt class="col-sm-4">Waktu Daftar</dt>
                                            <dd class="col-sm-8">:
                                                <?php
                                                $waktu_daftar = $indotime->convertDateTime($data->waktu_daftar, 4);
                                                echo $waktu_daftar; ?>
                                            </dd>
                                            <dt class="col-sm-4">Terakhir Online</dt>
                                            <dd class="col-sm-8">:
                                                <?php
                                                $terakhir_login = $data->terakhir_login != null ? $indotime->convertDateTime($data->terakhir_login, 4) : '-';
                                                echo $terakhir_login; ?>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>

                            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-content-below-saldo-tab" data-toggle="pill"
                                        href="#custom-content-below-saldo" role="tab"
                                        aria-controls="custom-content-below-saldo" aria-selected="true">Saldo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-riwayat-pesanan-tab" data-toggle="pill"
                                        href="#custom-content-below-riwayat-pesanan" role="tab"
                                        aria-controls="custom-content-below-riwayat-pesanan" aria-selected="false">Riwayat
                                        Pesanan</a>
                                </li>
                                <li class="nav-item">
                                    @if ($data->id_jenis_pengguna == '12')
                                        <a class="nav-link" id="custom-content-below-info-mitra-tab" data-toggle="pill"
                                            href="#custom-content-below-info-mitra" role="tab"
                                            aria-controls="custom-content-below-info-mitra" aria-selected="false">Info
                                            Mitra</a>
                                    @else
                                        <a class="nav-link" id="custom-content-below-alamat-tersimpan-tab"
                                            data-toggle="pill" href="#custom-content-below-alamat-tersimpan"
                                            role="tab" aria-controls="custom-content-below-alamat-tersimpan"
                                            aria-selected="false">Alamat
                                            Tersimpan</a>
                                    @endif
                                </li>
                            </ul>

                            <div class="tab-content" id="custom-content-below-tabContent">
                                <div class="tab-pane fade show active" id="custom-content-below-saldo" role="tabpanel"
                                    aria-labelledby="custom-content-below-saldo-tab">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-body text-right">
                                                <button type="submit" class="btn btn btn-danger" data-toggle="modal"
                                                    data-target="#kurang">
                                                    <i class="fas fa-arrow-down \f063"></i> Top Down
                                                </button>
                                                <button type="submit" class="btn btn-primary btn-login"
                                                    data-toggle="modal" data-target="#tambah">
                                                    <i class="fas fa-arrow-up \f062"></i> Top Up
                                                </button>
                                                <button type="submit" class="btn btn-success float-end">
                                                    <i class="fas fa-print \f02f"></i> Cetak
                                                </button>
                                            </div>

                                            <div class="card-body">
                                                <div class="border">
                                                    <div class="row p-3">
                                                        <div class="col-lg-6">
                                                            <dl class="row">
                                                                <dt class="col-sm-5">Sisa Saldo</dt>
                                                                <dd class="col-sm-7">:
                                                                    {{ @$saldo->nominal != null || @$saldo->nominal != ''
                                                                        ? 'Rp. ' . number_format(@$saldo->nominal, 0, ',', '.')
                                                                        : '-' }}
                                                                </dd>
                                                                <dt class="col-sm-5">Waktu Perubahan</dt>
                                                                <dd class="col-sm-7">:
                                                                    {{ @$saldo->waktu_perubahan != null ? $indotime->convertDateTime(@$saldo->waktu_perubahan, 3) . ' WIB' : '-' }}
                                                                </dd>
                                                            </dl>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <dl class="row">
                                                                <dt class="col-sm-5">Catatan Perubahan</dt>
                                                                <dd class="col-sm-7">:
                                                                    {{ @$saldo->catatan_perubahan != null ? @$saldo->catatan_perubahan : '-' }}
                                                                </dd>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <h3 class="card-title">Riwayat Transaksi</h3>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped text-nowrap"
                                                        style="width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>Waktu</th>
                                                                <th>Catatan</th>
                                                                <th>Jenis Transaksi</th>
                                                                <th>Nominal</th>
                                                                <th>Sisa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (@$riwayat != null)
                                                                @foreach ($riwayat as $show)
                                                                    <tr data-widget="expandable-table"
                                                                        aria-expanded="false">
                                                                        <td>{{ $indotime->convertDateTime($show->waktu_perubahan, 3) . ' WIB' }}
                                                                        </td>
                                                                        <td>{{ $show->catatan_transaksi }}</td>
                                                                        <td>{{ $show->jenis_transaksi }}</td>
                                                                        <td>{{ 'Rp. ' . number_format($show->nominal, 0, ',', '.') }}
                                                                        </td>
                                                                        <td>{{ 'Rp. ' . number_format($show->sisa_saldo, 0, ',', '.') }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show" id="custom-content-below-riwayat-pesanan" role="tabpanel"
                                    aria-labelledby="custom-content-below-riwayat-pesanan-tab">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            @if ($data->id_jenis_pengguna == '12')
                                                <input type="hidden" id="pengguna_mitra"
                                                    value="<?= $data->id_pengguna ?>">
                                            @else
                                                <input type="hidden" id="id_pengguna" value="<?= $data->id_pengguna ?>">
                                            @endif
                                            <table id="tb_transaksi"
                                                class="table table-bordered table-striped text-nowrap"
                                                style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 5%; white-space: nowrap;">No</th>
                                                        <th style="white-space: nowrap;">No Transaksi</th>
                                                        <th style="white-space: nowrap;">Layanan</th>
                                                        <th style="white-space: nowrap;">Waktu Pemesanan</th>
                                                        <th style="white-space: nowrap;">Mitra</th>
                                                        <th style="white-space: nowrap;">Total Harga</th>
                                                        <th style="white-space: nowrap;">Status</th>
                                                        <th style="width: 5%; white-space: nowrap;">Aksi</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show" id="custom-content-below-alamat-tersimpan"
                                    role="tabpanel" aria-labelledby="custom-content-below-alamat-tersimpan-tab">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="tb_transaksi"
                                                class="table table-bordered table-striped text-nowrap"
                                                style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 5%; white-space: nowrap;">No</th>
                                                        <th style="white-space: nowrap;">Nama Alamat</th>
                                                        <th style="white-space: nowrap;">Alamat Lengkap</th>
                                                        <th style="white-space: nowrap;">Lokasi</th>
                                                        <th style="width: 5%; white-space: nowrap;">Aksi</th>
                                                    </tr>
                                                </thead>
                                                @if ($userdetail)
                                                    <tr>
                                                        <td style="white-space: nowrap;">
                                                            {{ $userdetail->id_alamat_pengguna }} </td>
                                                        <td style="white-space: nowrap;">{{ $userdetail->nama_alamat }}
                                                        </td>
                                                        <td style="white-space: nowrap;">{{ $userdetail->alamat_lengkap }}
                                                        </td>
                                                        <td style="white-space: nowrap;">
                                                            {{ $userdetail->latitude }},{{ $userdetail->longitude }} </td>
                                                        <td>
                                                            <div style="text-align: center" class="show"><button
                                                                    type="button" class="btn btn-default"
                                                                    data-toggle="dropdown" aria-expanded="true"><i
                                                                        class="fas fa-bars"></i></button>
                                                                <div class="dropdown-menu show" role="menu"
                                                                    x-placement="top-start"
                                                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(866px, -21px, 0px);">
                                                                    <a href="http://127.0.0.1:8000/pengguna/form/MQ=="
                                                                        class="dropdown-item"><i class="fas fa-edit"></i>
                                                                        Edit</a><button type="button"
                                                                        class="dropdown-item"
                                                                        onclick="hapusPengguna(1)"><i
                                                                            class="fas fa-trash"></i>
                                                                        Hapus</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                @if ($data->id_jenis_pengguna == '12')
                                    @php
                                        $infomitra = DB::table('info_mitra')
                                            ->where('id_pengguna', $data->id_pengguna)
                                            ->first();
                                        $jenis_kendaraan = DB::table('jenis_kendaraan')
                                            ->where('id_jenis_kendaraan', @$infomitra->id_jenis_kendaraan)
                                            ->first();
                                        $kecamatan = DB::table('kecamatan')
                                            ->where('id_kecamatan', @$infomitra->id_kecamatan)
                                            ->first();
                                        $status_mitra = DB::table('status_mitra')
                                            ->where('id_status_mitra', @$infomitra->id_status_mitra)
                                            ->first();
                                    @endphp
                                    <div class="tab-pane fade show" id="custom-content-below-info-mitra" role="tabpanel"
                                        aria-labelledby="custom-content-below-info-mitra-tab">
                                        <div class="card-body">
                                            <dl class="row">
                                                <dt class="col-lg-3">Jenis Kendaraan</dt>
                                                <dd class="col-lg-9">:
                                                    {{ @$infomitra->id_jenis_kendaraan ? $jenis_kendaraan->jenis_kendaraan : '' }}
                                                </dd>
                                                <dt class="col-lg-3">Plat Nomor</dt>
                                                <dd class="col-lg-9">: {{ @$infomitra->plat_nomor }}</dd>
                                                <dt class="col-lg-3">Alamat</dt>
                                                <dd class="col-lg-9">: {{ @$infomitra->alamat }}</dd>
                                                <dt class="col-lg-3">Kelurahan</dt>
                                                <dd class="col-lg-9">: {{ @$infomitra->kelurahan }}</dd>
                                                <dt class="col-lg-3">Kecamatan</dt>
                                                <dd class="col-lg-9">: {{ @$kecamatan->nama_kecamatan }}</dd>
                                                <dt class="col-lg-3">Latitude</dt>
                                                <dd class="col-lg-9">: {{ @$infomitra->latitude }}</dd>
                                                <dt class="col-lg-3">Longitude</dt>
                                                <dd class="col-lg-9">: {{ @$infomitra->longitude }}</dd>
                                                <dt class="col-lg-3">Status Mitra</dt>
                                                <dd class="col-lg-9">:
                                                    {{ @$infomitra->id_status_mitra ? $status_mitra->status_mitra : '-' }}
                                                </dd>
                                                <dt class="col-lg-3">Foto STNK</dt>
                                                <dd class="col-lg-9">
                                                    @if (file_exists('public/infomitra/stnk/' . @$infomitra->foto_stnk) && @$infomitra->foto_stnk != null)
                                                        <img src="{{ url('public/infomitra/stnk/') . '/' . @$infomitra->foto_stnk }}"
                                                            class="img-thumbnail" width="100%" />
                                                    @else
                                                        <p style="color: red">Gambar Tidak Tersedia</p>
                                                    @endif
                                                </dd>
                                                <dt class="col-lg-3">Foto SIM</dt>
                                                <dd class="col-lg-9">
                                                    @if (file_exists('public/infomitra/sim/' . @$infomitra->foto_sim) && @$infomitra->foto_sim != null)
                                                        <img src="{{ url('public/infomitra/sim/') . '/' . @$infomitra->foto_sim }}"
                                                            class="img-thumbnail" width="100%" />
                                                    @else
                                                        <p style="color: red">Gambar Tidak Tersedia</p>
                                                    @endif
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahLabel">Pengisian Saldo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('pengguna/savesaldo') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id_pengguna" value="<?= $data->id_pengguna ?>">
                        <div class="form-group">
                            <label>Nominal</label>
                            <input type="text" class="form-control" name="nominal">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger batal" data-dismiss="modal"><i
                                class="fas fa-times"></i>
                            Batal</button>
                        <button type="submit" class="btn btn-success simpan" id="btn-save"><i class="fas fa-save"></i>
                            Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kurang" tabindex="-1" role="dialog" aria-labelledby="kurangLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kurangLabel">Pengurangan Saldo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('pengguna/kurangsaldo') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id_pengguna" value="<?= $data->id_pengguna ?>">
                        <div class="form-group">
                            <label>Nominal</label>
                            <input type="text" class="form-control" name="nominal">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger batal" data-dismiss="modal"><i
                                class="fas fa-times"></i>
                            Batal</button>
                        <button type="submit" class="btn btn-success simpan" id="btn-save"><i class="fas fa-save"></i>
                            Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="tokenFirebase" tabindex="-1" aria-labelledby="tokenFirebaseLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width: auto;">
                <div class="modal-header">
                    <h5 class="modal-title" id="tokenFirebaseLabel">Token Firebase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="word-wrap: break-word">
                        @if ($data->firebase_id_token)
                            {{ $data->firebase_id_token }}
                        @else
                            Pengguna ini belum memiliki Token Firebase
                        @endif
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <form id="form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id_pengguna }}">
        <input type="file" name="image" id="form-input" class="d-none" accept="image/*" onchange="sendImg()">
    </form>

    <script>
        const apiUrl = @json(url('/api'));
        const changeImg = (id) => {
            $('#form-input').trigger('click')
        }
        const sendImg = async () => {
            $('#alert').html(
                '<div class="alert alert-primary alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span style="font-weight: bold;">Sedang upload gambar mohon tunggu</span></div>'
            )
            const fileInput = $("#form-input")
            const file = fileInput[0].files[0]

            const formData = new FormData()
            formData.append('image', file)
            formData.append('id_pengguna', @json(sha1($data->id_pengguna)))
            const req = await fetch(`${apiUrl}/change_profile`, {
                method: 'POST',
                body: formData,
            })

            $('#alert').html('')
            if (req.status === 200) {
                alert('success', 'Berhasil upload gambar')
                location.reload();
            } else {
                alert('danger', 'Gagal upload gambar')
            }
        }
        const showModalFirebase = () => {
            $("#tokenFirebase").modal()
        }
    </script>

    <script>
        var table
        $(function() {
            table = $('#tb_transaksi').DataTable({
                processing: true,
                serverSide: true,
                order: [],
                searching: false,
                entries: false,
                info: false,
                ordering: false,
                bLengthChange: false,
                ajax: {
                    url: '{!! route('pemesanan.listData') !!}',
                    method: 'post',
                    data: (data) => {
                        data._token = '{{ csrf_token() }}'
                        data.id_pengguna = $("#id_pengguna").val()
                        data.pengguna_mitra = $("#pengguna_mitra").val()
                    }
                },
                "columnDefs": [{
                    "orderable": false,
                    "targets": [0, 3, 5, 6],
                }],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'id_transaksi'
                    },
                    {
                        data: 'layanan'
                    },
                    {
                        data: 'waktu_pesanan'
                    },
                    {
                        data: 'mitra'
                    },
                    {
                        data: 'total'
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
