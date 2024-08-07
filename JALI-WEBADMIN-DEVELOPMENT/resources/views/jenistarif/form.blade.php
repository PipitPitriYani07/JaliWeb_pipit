@extends('templates/template')

@section('views')
<div class="col-12 col-md-6 col-lg-4">
  <div class="card">
    <form action="{{url("jenis_tarif/save")}}" method="post" id="form">
      @csrf
      <input type="hidden" name="id" value="{{@$data['id_jenis_tarif']}}">
      <div class="card-header">
        <a href="{{url("jenis_tarif")}}" class="btn btn-warning"><i class="fas fa-chevron-left"></i> Kembali</a>
        <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan</button>
      </div>

      <div class="card-body">
        <div class="form-group">
          <label for="">Jenis Tarif</label>
          <input type="text" class="form-control" name="jenis_tarif"
            value="{{old('jenis_tarif', @$data['jenis_tarif'])}}" required autocomplete="off">
          @error('jenis_tarif')
          <div class="text-danger">
            {{$message}}
          </div>
          @enderror()
        </div>

        <div class="form-group">
          <label for="">Keterangan</label>
          <input type="text" class="form-control" name="keterangan" value="{{old('keterangan', @$data['keterangan'])}}"
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