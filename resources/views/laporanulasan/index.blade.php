@php
    $indotime = new App\Libraries\IndoTime();
@endphp

@extends('templates/template')

@section('views')
    <div class="card">
        <div class="card-header">
            <div class="row justify-content-between">
                <div class="col-lg-5 d-flex justify-content-between">
                    <div class="form-group col-lg-8">
                        <div class="input-group">
                            <input type="text" name="cari" class="form-control" id="form-search"
                                placeholder="Cari ulasan...">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="button" id="btn-search" onclick="reload()">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <select onchange="reload()" class="form-control" id="bintang" name="rating">
                                <option value="">Semua Rating</option>
                                <option value="5">Bintang 5</option>
                                <option value="4">Bintang 4</option>
                                <option value="3">Bintang 3</option>
                                <option value="2">Bintang 2</option>
                                <option value="1">Bintang 1</option>
                            </select>
                        </div>
                        <div class="dropdown-menu" role="menu">
                        </div>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-success d-flex align-items-center">
                        <div
                            style="display: flex; width: 25px; height: 25px; justify-content: center; align-items: center; padding: 2px; background: #fff; border-radius: 100%; color: green; margin-right: 3px;">
                            <i class="fas fa-user"></i>
                        </div> Ulasan Per Mitra
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="tb" class="table table-bordered table-striped text-nowrap" style="width: 100%">
                    <thead>
                        <tr class="text-center" style="background: rgb(245 245 245);">
                            <th style="width: 5%; white-space: nowrap;">No</th>
                            <th style="white-space: nowrap;">Waktu</th>
                            <th style="white-space: nowrap;">ID Transaksi</th>
                            <th style="white-space: nowrap;">Rating</th>
                            <th style="white-space: nowrap;">Judul</th>
                            <th style="width: 5%; white-space: nowrap;">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <script>
        var table
        $(function() {
            table = $('#tb').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                ajax: {
                    url: '{!! route('ulasan.listData') !!}',
                    type: 'POST',
                    data: (data) => {
                        data._token = '{{ csrf_token() }}'
                        data.laporan_ulasan = $("#form-search").val()
                        data.bintang = $("#bintang").val()
                    },
                    error: function(xhr, error, thrown) {
                        console.log('Ajax error:', error);
                        console.log('Server response:', xhr.responseText);
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'waktu_ulasan'
                    },
                    {
                        data: 'id_transaksi'
                    },
                    {
                        data: 'nilai_bintang'
                    },
                    {
                        data: 'judul_ulasan'
                    },
                    {
                        data: 'action',
                    }
                ]
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
