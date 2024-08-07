@extends('templates/template')

@section('views')
<div class="col-12 col-md-6">
	@if(session()->has('success'))
	<div class="alert alert-success">
		{{session('success')}}
	</div>
	@endif
	<div class="card">
		<div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style="width: 10px" class="text-nowrap">Jarak Tarif</th>
              <th>Keterangan</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $d)
            <tr>
              <td class="text-center">{{$d->jarak_tarif}}</td>
              <td>{{$d->keterangan}}</td>
              <td class="text-center">
                <a href="{{url("jarak/" . $d->id_jarak_tarif)}}" type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-edit"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
		</div>
	</div>
</div>
@endsection
