@extends('templates/template')

@section('views')
@if(session()->has('success'))
<div class="alert alert-success">
	{{session('success')}}
</div>
@endif
<div id="flashdata"></div>
<div class="row">
    <div class="col-md-8 col-xs-12">
        <div class="card-body" style="background: #90EE90; color: green;" id="notif">
            Sebelum mengelola tarif, silahkan untuk memilih kota layanan terlebih dahulu.
        </div>
        <br>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            <label for="" class="col-lg-4">Pilih Provinsi</label>
                            <select name="id_provinsi" id="id_provinsi" class="form-control col-lg-8" onchange="reload()">
                                <option value="">--Pilih Provinsi--</option>
                                @foreach ($provinsi as $jL)
                                    <option value="{{$jL->id_provinsi}}">{{$jL->nama_provinsi}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="float-right">
                            <a href="#" class="btn btn-primary btn-sm">
                                Atur Kota &nbsp; <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="justify-content-evenly">
                    <div class="col-md table-responsive">
                        <table class="table table-stripped table-bordered text-nowrap" id="kota_layanan" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div id="response-data"></div>
        <div class="card bg-gradient-info" id="body-tarif">
            <div class="card-header">
                Atur Tarif Masal
            </div>
            <div class="card-header">
                <div class="card-body" style="background: #90EE90; color: green; margin: 1%;" id="notif">
                    Anda dapat menggunakan fitur ini untuk menyamakan tarif pada semua wilayah layanan.
                </div>
            </div>
            <div class="card-body">
                <form id="form-atur-tarif" action="{{url("tarif/aturmasal")}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="">Harga</label>
                      <input type="text" class="form-control" name="harga" id="harga" placeholder="Masukkan Harga" required>
                    </div>
                    <div class="form-group">
                        <label for="">Layanan</label>
                        <select name="layanan" id="layanan" class="form-control" required>
                        <option value="">--Pilih Layanan--</option>
                            @foreach ($jenis_layanan as $jL)
                                <option value="{{$jL->id_layanan}}">{{$jL->nama_layanan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Pilih Jenis Tarif</label>
                        <select name="jenis_tarif" id="jenis_tarif" class="form-control" required>
                        <option value="">--Pilih Jenis Tarif--</option>
                            @foreach ($jenis_tarif as $jT)
                                <option value="{{$jT->id_jenis_tarif}}">{{$jT->jenis_tarif}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Pilih Jarak</label>
                        <select name="jarak" id="jarak" class="form-control" required>
                        <option value="">--Pilih Jarak--</option>
                            @foreach ($jarak_tarif as $jrkTrf)
                                <option value="{{$jrkTrf->id_jarak_tarif}}">{{$jrkTrf->jarak_tarif . ' (' . $jrkTrf->keterangan . ')'}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-cog"></i> Buat Tarif</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var tbLayanan
    $(function() {
        tbLayanan = $('#kota_layanan').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            ajax: {
                url: '{!! route("tarif.listDataLayanan") !!}',
                method: 'post',
                data: (data) => {
					data._token = '{{csrf_token()}}'
					data.search = $("#form-search").val()
                    data.provinsi = $("#id_provinsi").val()
				}
            },
            "columnDefs": [{
				"orderable": false,
				"targets": [],
			}],
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama_provinsi'
                },
                {
                    data: 'nama_kota'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        });
	});

    const reload = () => {
        tbLayanan.ajax.reload()
    }
</script>
@endsection
