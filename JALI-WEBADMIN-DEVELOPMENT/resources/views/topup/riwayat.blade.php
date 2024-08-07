@extends('templates/template')

@section('views')
    <div class="card">
        <div class="card-header">
            <div class="row justify-content-between">
                <a href="{{url("topup/detail/" . base64_encode($id_topup))}}" class="btn btn-success">
                    <i class="fa fa-angle-left"></i> Kembali
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <input type="hidden" id="id_topup_saldo" value="{{$id_topup}}">
                <table id="tb" class="table table-bordered table-striped text-nowrap" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 5%; white-space: nowrap;">No</th>
                            <th style="white-space: nowrap;">Waktu Perubahan</th>
                            <th style="white-space: nowrap;">Catatan</th>
                            <th style="white-space: nowrap;">Status</th>
                            <th style="white-space: nowrap;">Diubah Oleh</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
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
                    url: '{!! route("topup.listDataRiwayat") !!}',
                    method: 'post',
                    data: (data) => {
                        data._token = '{{ csrf_token() }}'
                        data.id_topup_saldo = $("#id_topup_saldo").val()
                    }
                },
                "columnDefs": [{
                    "orderable": false,
                    "targets": [0],
                }],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'waktuperubahan'
                    },
                    {
                        data: 'catatan'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'penggunapengubah'
                    }
                ]
            });
        });
    </script>
@endsection
