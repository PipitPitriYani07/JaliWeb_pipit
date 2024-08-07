@extends('templates/template')

@section('views')
    <div class="col-12 col-md-6">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="col-12">
                    <div class="float-right">
                        <a href="{{url("banks/form")}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped text-nowrap">
                    <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Kode Bank</th>
                        <th>Nama Bank</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($banks as $bank)
                        <tr>
                            <td>
                                <img src="{{$bank->logo}}" alt="{{$bank->nama_bank}}" width="60">
                            </td>
                            <td>
                                {{$bank->kode_bank}}
                            </td>
                            <td>
                                {{$bank->nama_bank}}
                            </td>
                            <td>
                                {{$bank->keterangan}}
                            </td>
                            <td>
                                <button type="button" class="btn btn-default" data-toggle="dropdown">
                                    <i class="fas fa-bars"></i>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a href="{{url("banks/form/" . $bank->id_bank)}}" class="dropdown-item">Ubah</a>
                                    <form action="{{url("banks/remove/" . $bank->id_bank)}}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item"
                                                onclick="return confirm('Apakah Anda yakin?')">Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection