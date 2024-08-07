@php
    $kota_layanan = DB::table('kota_layanan')->where('id_kota', $data_kota->id_kota)->first();
    $status_jenis_tarif = DB::table('status_jenis_tarif')->where('id_kota_layanan', $kota_layanan->id_kota_layanan)->first();
@endphp
@extends('templates/template')

@section('views')
<div class="row">
    <div class="col-lg-12">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <div id="flashdata"></div>
    </div>
    <div class="col-lg-12">
        <div class="card-body" style="padding-left: 0; padding-top: 0">
            <a href="{{url("tarif")}}" class="btn btn-warning">
                <i class="fa fa-angle-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                Informasi Kota
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-1"><i class="fas fa-circle nav-icon"></i></div>
                    <div class="col-11">{{$data_kota->nama_kota}}</div>
                </div>
                <div class="row" style="padding-top: 5px">
                    <div class="col-1"><i class="fas fa-circle nav-icon"></i></div>
                    <div class="col-11">{{$data_provinsi->nama_provinsi}}</div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Pilih Layanan
            </div>
            <div class="card-body px-0">
                <div class="row px-3" onclick="changeVal('')" style="cursor: pointer;">
                    <div class="col-12 plp1">Semua Layanan</div>
                </div>
                <hr>
                <div class="row px-3" onclick="changeVal('1')" style="cursor: pointer;">
                    <div class="col-12 plp1">Jali Mot</div>
                </div>
                <hr>
                <div class="row px-3" onclick="changeVal('2')" style="cursor: pointer;">
                    <div class="col-12 plp1">Jali Mob</div>
                </div>
                <hr>
                <div class="row px-3" onclick="changeVal('3')" style="cursor: pointer;">
                    <div class="col-12 plp1">Jali Kurir</div>
                </div>
                <hr>
                <div class="row px-3" onclick="changeVal('4')" style="cursor: pointer;">
                    <div class="col-12 plp1">Jali Mami</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <label for="">Jenis Tarif</label>
                        <select name="id_jenis_tarif" id="id_jenis_tarif" class="form-control"  onchange="reload()">
                            <option value="">--Pilih Jenis Tarif--</option>
                            @foreach ($jenis_tarif as $jT)
                                <option value="{{$jT->id_jenis_tarif}}">{{$jT->jenis_tarif}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="">Jarak Tarif</label>
                        <select name="id_jarak_tarif" id="id_jarak_tarif" class="form-control"  onchange="reload()">
                            <option value="">--Pilih Jarak Tarif--</option>
                            @foreach ($jarak_tarif as $jT)
                                @php
                                    $data_jarak = DB::table('jarak_tarif')
                                        ->orderBy('jarak_tarif', 'asc')
                                        ->limit(1)
                                        ->first();
                                @endphp
                                @if ($data_jarak->id_jarak_tarif == $jT->id_jarak_tarif)
                                    <option value="{{$jT->id_jarak_tarif}}">{{$jT->jarak_tarif . ' km pertama'}}</option>
                                @else
                                    <option value="{{$jT->id_jarak_tarif}}">Per KM berikutnya</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <div class="float-right">
                            @php
                                $nama = '';
                                if ($status_jenis_tarif) {
                                    switch ($status_jenis_tarif->id_jenis_tarif) {
                                        case "1":
                                            $nama = 'Tarif Normal';
                                            break;
                                        case "2":
                                            $nama = 'Tarif Jam Sibuk';
                                            break;
                                        default:
                                            $nama = 'Pilih Tarif';
                                            break;
                                    }
                                } else {
                                  $nama = 'Pilih Tarif';
                                }
                            @endphp
                            <label for="">Jenis Tarif Aktif</label><br>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#tarif-normal"><i class="fas fa-check"></i>&nbsp; {{$status_jenis_tarif ? DB::table('jenis_tarif')->where('id_jenis_tarif', $status_jenis_tarif->id_jenis_tarif)->first('keterangan')->keterangan : 'Jenis Tarif'}}</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <input type="hidden" name="kota" id="kota" value="{{$data_kota->id_kota}}">
                    <table class="table table-stripped table-bordered text-nowrap" id="tarif" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width: 5%; white-space: nowrap; text-align: center;">No</th>
                                <th style="white-space: nowrap; text-align: center;">Jenis Layanan</th>
                                <th style="white-space: nowrap; text-align: center;">Jenis Jarak</th>
                                <th style="white-space: nowrap; text-align: center;">Jenis Tarif</th>
                                <th style="white-space: nowrap; text-align: center;">Harga</th>
                                <th style="width: 5%; white-space: nowrap; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tarif-normal" tabindex="-1" role="dialog" aria-labelledby="tarif-normalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tarif-normalLabel">Ubah Jenis Tarif Berlaku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url("tarif/kelolaTarifKota")}}" method="POST">
              @csrf
              <input type="hidden" name="id_kota" id="id_kota" value="{{$data_kota->id_kota}}">
                <div class="modal-body">
                    <div class="card-body" style="background: #90EE90; color: green;" id="notif">
                        Sebelum mengelola tarif, silahkan untuk memilih kota layanan terlebih dahulu.
                    </div>
                    <br>
                    <select name="id_jenis_tarif" id="id_jenis_tarif" class="form-control">
                        <option value="">--Pilih Jenis Tarif--</option>
                        @foreach ($jenis_tarif as $jT)
                            @php
                                $selected = @$status_jenis_tarif->id_jenis_tarif == $jT->id_jenis_tarif ? 'selected' : ''
                            @endphp
                            <option value="{{$jT->id_jenis_tarif}}" {{$selected}}>{{$jT->jenis_tarif}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                    <button type="submit" class="btn btn-success" id="btn-save"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var table
    let value = ''
    $(function() {
        table = $('#tarif').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            entries: false,
            ordering: false,
            bLengthChange: false,
            info: false,
            ajax: {
                url: '{!! route("tarif.listData") !!}',
                method: 'post',
                data: (data) => {
                    data._token = '{{csrf_token()}}';
                    data.kota = $("#kota").val()
                    data.jenis_tarif = $("#id_jenis_tarif").val()
                    data.jarak_tarif = $("#id_jarak_tarif").val()
                    data.jenis_layanan = value
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'layanan'
                },
                {
                    data: 'jarak_tarif'
                },
                {
                    data: 'jenis_tarif'
                },
                {
                    data: 'harga_tarif'
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

    const changeVal = (val) => {
        value = val;
        reload()
    }

    const hapusTarif = (id) => {
		if (confirm('Apakah Anda yakin?')) {
            $.ajax({
                type: "POST",
                url: "{{url('tarif/delete')}}",
                data: {
                    id,
                    _token: '{{csrf_token()}}'
                },
                dataType: "JSON",
                success: function(response) {
                    reload()
                    $('#flashdata').html('');
                    $('#check-all').prop('checked', false);
                    $('<div class="alert alert-success alert-dismissible" id="alert" style="font-weight: bold;">Berhasil hapus</div>').show().appendTo('#flashdata');
                    $('#alert').delay(2750).slideUp('slow', function() {
                    $(this).remove();
                    });
                }
            });
        }
	}
</script>
@endsection
