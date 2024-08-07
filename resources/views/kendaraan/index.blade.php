@extends('templates/template')

@section('views')
<div class="row">
    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-12">
                <!-- <div id="response-data"></div> -->
                <div id="alert-success"></div>
                <!-- <div id="flashdata"></div> -->

                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <!-- <button data-toggle="modal" data-target="#tambah" class="btn btn-success">
                                <i class="fas fa-plus"></i> Tambah
                            </button> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tb" class="table table-bordered table-striped text-nowrap" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th style="width: 5%; white-space: nowrap;">No</th>
                                        <th style="white-space: nowrap;">Ikon</th>
                                        <th style="white-space: nowrap;">Jenis Kendaraan</th>
                                        <th style="white-space: nowrap;">Keterangan</th>
                                        <th style="white-space: nowrap;">Berat Maksimal</th>
                                        <th style="width: 5%; white-space: nowrap;">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahLabel">Tambah Jenis Kendaraan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-menu" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Jenis Kendaraan</label>
                        <input type="text" class="form-control" name="jenis_kendaraan" placeholder="Masukkan Jenis Kendaraan"
                        value="{{old('jenis_kendaraan')}}" required>
                        @error('jenis_kendaraan')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan Jenis Kendaraan"
                        value="{{old('keterangan')}}" required>
                        @error('keterangan')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                    </div>
                    <div class="form-group">
                        <label for="">Berat Maksimal</label>
                        <input type="text" class="form-control" name="berat_maksimal" placeholder="Masukkan Berat Maksimal Jenis Kendaraan"
                        value="{{old('berat_maksimal')}}" required>
                        @error('berat_maksimal')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                    </div>
                    <div class="form-group" id="form-ikon">
                        <label for="">Ikon</label>
                        <input type="file" class="form-control" accept="image/*" name="gambar"
                            id="gambar" value="{{ old('gambar') }}" onchange="sendImg()">
                        <input type="hidden" id="ikon_lama" name="ikon_lama">
                        <input type="hidden" id="ikon_new" name="ikon_new">
                        @error('ikon')
                            <div class="text-danger">
                                {{ $message }}
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
<script>
    let id_jenis_kendaraan;
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
                url: '{!! route('kendaraan.listData') !!}',
                method: 'post',
                data: (data) => {
                    data._token = '{{csrf_token()}}';
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
                    data: 'icon'
                },
                {
                    data: 'jenis_kendaraan'
                },
                {
                    data: 'keterangan'
                },
                {
                    data: 'beratmaksimal'
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

    $("#form-menu").on('submit', (e) => {
        e.preventDefault();
        $("#btn-simpan").attr("disabled", "").html("Sedang upload")
        const beratmaksimal = $('[name="berat_maksimal"]').val()
        const jenis_kendaraan = $('[name="jenis_kendaraan"]').val()
        if (beratmaksimal && jenis_kendaraan) {
            $.ajax({
                url: '{{ url("kendaraan/saveJenisKendaraan") }}',
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
                    $(`<div class="alert alert-success" id="alert-data"><span font-weight: bold;">${id_jenis_kendaraan ? 'Berhasil Update' : 'Berhasil Menambah'}!</span></div>`).show().appendTo('#alert-success');
                    $('#alert-data').delay(2750).slideUp('slow', function() {
                        $(this).remove();
                    });
                    $("#btn-simpan").removeAttr("disabled", "").html(`<i class="fa fa-save"></i> Simpan`)
                    $('[name="ikon"]').val("")
                    $('[name="ikon_lama"]').val("")
                    $('[name="jenis_kendaraan"]').val("")
                    $('[name="keterangan"]').val("")
                    $('[name="berat_maksimal"]').val("")
                    $("[name='id']").val("")
                    $("#tambahLabel").html("Tambah Kategori Menu")
                }
            });
        }
    })

    const ubah = async (id) => {
        $("#tambahLabel").html("Edit Jenis Kendaraan")
        id_jenis_kendaraan = id;
        $.ajax({
            url: `{{ url('kendaraan/reqData') }}/${id}`,
            type: 'POST',
            data: {
                _token: '{{csrf_token()}}'
            },
            success: (data) => {
                const res = JSON.parse(data)
                $("#tambah").modal('show')
                $("[name='id']").val(id)
                $('[name="ikon"]').val(res.ikon)
                $('[name="jenis_kendaraan"]').val(res.jenis_kendaraan)
                $('[name="keterangan"]').val(res.keterangan)
                $('[name="berat_maksimal"]').val(res.berat_maksimal)

                $("#btn-save").removeAttr("disabled", "").html("Simpan")
            }
        })
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
        const req = await fetch(`${apiUrl}/upload_file/ikon_jenis_kendaraan`, {
            method: 'POST',
            body: formData,
        })
        const res = await req.json()

        if (req.status === 200) {
            $('[name="ikon_new"]').val(res.nama_gambar)
        } else {
            $('[name="ikon_new"]').val("")
        }
    }

    $(document).ready(function() {
        if ($('#gambar').val() != '' || $('#gambar_lama').val() != '') {
            $("#loading1").animate({
                width: "100%"
            });
            $('.success1').html(`File sudah ada disistem`);
        }
    })
</script>
@endsection
