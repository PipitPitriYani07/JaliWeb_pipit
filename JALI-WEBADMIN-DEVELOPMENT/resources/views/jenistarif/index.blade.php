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
          <a href="{{url("jenis_tarif/form")}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped text-nowrap">
        <thead>
          <tr>
            <th>Jenis Tarif</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $d)
          <tr>
            <td>{{$d->jenis_tarif}}</td>
            <td>{{$d->keterangan}}</td>
            <td>
              <div>
                <button type="button" class="btn btn-default" data-toggle="dropdown">
                  <i class="fas fa-bars"></i>
                </button>
                <div class="dropdown-menu" role="menu">
                  <a href="{{url("jenis_tarif/form/" . $d->id_jenis_tarif)}}" title="Edit Jenis Tarif"
                    class="dropdown-item">Ubah</a>
                  <form action="{{url("jenis_tarif/delete/" . $d->id_jenis_tarif)}}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item" title="Hapus Jenis Tarif"
                      onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                  </form>
                </div>
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