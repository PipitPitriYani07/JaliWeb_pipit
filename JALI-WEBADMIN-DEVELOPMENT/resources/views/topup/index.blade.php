@extends('templates/template')

@section('views')
    <div class="card">
        <div class="card-header">
            <div class="row justify-content-between">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Cari Transaksi</label>
                        <div class="input-group">
                            <input type="text" name="cari" class="form-control" id="form-search"
                                placeholder="Nomor Transaksi, Nama Pengguna" value="{{session()->get('topup_search_pengguna')}}">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="button" id="btn-search" onclick="reload()">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="form-status" class="form-control" onchange="reload()">
                            <option value="">-- Pilih Status --</option>
                            @foreach ($status as $stts)
                                <option value="{{ $stts->id_status_transaksi }}" {{session()->get('topup_status') == $stts->id_status_transaksi ? 'selected' : ''}}>{{ $stts->status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Tanggal Transaksi</label>
                        <div class="row ml-0">
                            <div class="col-lg-5">
                                <input type="date" class="form-control" id="form-mulai" onchange="reload()" value="{{session()->get('topup_mulai') ? session()->get('topup_mulai') : date('Y-m-d')}}">
                            </div>
                            <div class="col-lg-1">
                                <b>s/d</b>
                            </div>
                            <div class="col-lg-5">
                                <input type="date" class="form-control" id="form-selesai" onchange="reload()" value="{{session()->get('topup_selesai') ? session()->get('topup_selesai') : date('Y-m-d')}}">
                            </div>
                            <div class="col-lg-1"></div>
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
                            <th style="white-space: nowrap;">ID Transaksi</th>
                            <th style="white-space: nowrap;">Waktu Transaksi</th>
                            <th style="white-space: nowrap;">Nama Pengguna</th>
                            <th style="white-space: nowrap;">Status</th>
                            <th style="white-space: nowrap;">Nominal</th>
                            <th style="width: 5%; white-space: nowrap;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        
        // $(document).ready(function() {
        //     var now = new Date();
        //     var tahun = now.getFullYear();
        //     var bulan = ("0" + (now.getMonth() + 1)).slice(-2);
        //     var tanggal = ("0" + now.getDate()).slice(-2);
        //     var tanggalFormat = tahun + "-" + bulan + "-" + tanggal;
                    
        //     $("#form-mulai").val(tanggalFormat);
        //     $("#form-selesai").val(tanggalFormat);
        // });

        var table
        $(function() {
            table = $('#tb').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                ajax: {
                    url: '{!! route("topup.listData") !!}',
                    method: 'post',
                    data: (data) => {
                        data._token = '{{ csrf_token() }}'
                        data.search_pengguna = $("#form-search").val()
                        data.status = $("#form-status").val()
                        data.mulai = $("#form-mulai").val()
                        data.selesai = $("#form-selesai").val()
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
                        data: 'id_topup_saldo'
                    },
                    {
                        data: 'tanggal'
                    },
                    {
                        data: 'pengguna'
                    },
                    {
                        data: 'status_aktif'
                    },
                    {
                        data: 'nominal'
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
