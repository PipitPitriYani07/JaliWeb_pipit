@extends('templates/template')

@section('views')
<div class="col-12 col-md-6 col-lg-4">
  <div class="card">
    <form action="{{url("jarak")}}" method="post" id="form">
      @csrf
      <input type="hidden" name="id" value="{{@$data->id_jarak_tarif}}">
      <div class="card-header">
        <a href="{{url("jarak")}}" class="btn btn-warning"><i class="fas fa-chevron-left"></i>
          Kembali</a>
        <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan</button>
      </div>

      <div class="card-body">
        <div class="form-group">
          <label for="">Jenis Tarif</label>
          <input type="text" class="form-control" name="jarak_tarif" value="{{old('jarak_tarif', @$data->jarak_tarif)}}"
            required autocomplete="off">
          @error('jarak_tarif')
          <div class="text-danger">
            {{$message}}
          </div>
          @enderror()
        </div>

        <div class="form-group">
          <label for="">Keterangan</label>
          <input type="text" class="form-control" name="keterangan" value="{{old('keterangan', @$data->keterangan)}}"
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