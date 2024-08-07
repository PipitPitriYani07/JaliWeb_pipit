@extends('templates/template')

@section('views')
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card">
            <form action="{{url("banks/account")}}" method="post" id="form">
                @csrf
                <input type="hidden" name="id" value="{{@$data['id_rekening_bank']}}">
                <div class="card-header">
                    <a href="{{url("banks/account")}}" class="btn btn-warning"><i class="fas fa-chevron-left"></i>
                        Kembali</a>
                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan
                    </button>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="">Bank</label>
                        <select name="id_bank" class="form-control">
                            @foreach($banks as $bank)
                                <option value="{{$bank->id_bank}}" {{old('id_bank', @$data['id_bank']) == $bank->id_bank ? 'selected' : ''}}>{{$bank->nama_bank}}</option>
                            @endforeach
                        </select>
                        @error('nama_bank')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                    </div>

                    <div class="form-group">
                        <label for="">No Rekening</label>
                        <input type="text" class="form-control" name="no_rekening"
                               value="{{old('no_rekening', @$data['no_rekening'])}}" required>
                        @error('no_rekening')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                    </div>

                    <div class="form-group">
                        <label for="">Nama Pemilik</label>
                        <input type="text" class="form-control" name="nama_pemilik"
                               value="{{old('nama_pemilik', @$data['nama_pemilik'])}}">
                        @error('nama_pemilik')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                    </div>

                    <div class="form-group">
                        <label for="">Cabang</label>
                        <input type="text" class="form-control" name="cabang"
                               value="{{old('cabang', @$data['cabang'])}}">
                        @error('cabang')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                    </div>

                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan"
                               value="{{old('keterangan', @$data['keterangan'])}}"
                               autocomplete="off" required>
                        @error('keterangan')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror()
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection