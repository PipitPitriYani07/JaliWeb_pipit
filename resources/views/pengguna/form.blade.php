@extends('templates/template')

@section('views')
<div class="row">
  <div class="col-lg-6 col-12">
    <div class="card">
      <form action="{{url("pengguna")}}" method="POST" id="form">
        <div class="card-header">
          <a href="{{url("pengguna")}}" class="btn btn-warning"><i class="fas fa-chevron-left"></i> Kembali</a>
          <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan</button>
        </div>
        <div class="card-body">
          @csrf
          <input type="hidden" name="id" value="{{@$data['id_pengguna']}}">
          <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukkan nama lengkap anda"
                        value="{{old('nama_lengkap', @$data['nama_lengkap'])}}" required>
                    <input type="hidden" name="nama_lengkap_lama" value="{{@$data['nama_lengkap']}}">
                    @error('nama_lengkap')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror()
                </div>
                <div class="form-group">
                    <label for="">Alamat Email</label>
                    <input type="email" class="form-control" name="alamat_email" placeholder="Masukkan email yang valid"
                        value="{{old('alamat_email', @$data['alamat_email'])}}" required>
                    <input type="hidden" name="alamat_email_lama" value="{{@$data['alamat_email']}}">
                    @error('alamat_email')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror()
                </div>
                <div class="form-group">
                    <label for="">No Handphone</label>
                    <input type="text" class="form-control" name="no_handphone" placeholder="Masukan No. Handphone yang valid"
                        value="{{old('no_handphone', @$data['no_handphone'])}}" required>
                    <input type="hidden" name="no_handphone_lama" value="{{@$data['no_handphone']}}">
                    @error('no_handphone')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror()
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Kata Kunci</label>
                    <input type="password" class="form-control" name="kata_kunci" placeholder="Kata kunci minimal 7 karakter"
                    minlength="7" value="{{old('kata_kunci')}}" @if (!@$data['id_pengguna'])required @endif>
                </div>
                <div class="form-group">
                    <label for="">Jenis Pengguna</label>
                    <select name="id_jenis_pengguna" class="form-control select2" required>
                        <option value="">--Pilih Jenis Pengguna--</option>
                        @foreach ($jenis_pengguna as $jp)
                        @php
                        $selected = $jp->id_jenis_pengguna == @$data['id_jenis_pengguna'] ? 'selected' : ''
                        @endphp
                        <option value="{{$jp->id_jenis_pengguna}}" {{$selected}}>{{$jp->jenis_pengguna}}</option>
                        @endforeach
                    </select>
                    @error('id_jenis_pengguna')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror()
                </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $("#form").validate({
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  })
</script>
@endsection
