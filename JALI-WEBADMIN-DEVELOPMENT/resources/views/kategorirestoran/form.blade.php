@extends('templates/template')

@section('views')
<style>
  #loading1 {
    margin-top: 10px;
    width: 0%;
    height: 20px;
    background-color: green;
    border-radius: 5px;
  }
</style>
<div class="row">
  <div class="col-lg-6 col-12">
    <div class="card">
      <form action="{{url("kategori-restoran")}}" method="POST" id="form" enctype="multipart/form-data">
        <input type="hidden" name="nameImage" id="nameImage">
        <div class="card-header">
          <a href="{{url("kategori-restoran")}}" class="btn btn-warning"><i class="fas fa-chevron-left"></i>
            Kembali</a>
          <button type="button" class="btn btn-success float-right" id="btn-save"><i class="fas fa-save"></i>
            Simpan</button>
          <button type="submit" class="d-none" id="submit"></button>
        </div>
        <div class="card-body">
          @csrf
          <input type="hidden" name="id" value="{{@$data['id_kategori_restoran']}}">
          <div class="form-group">
            <label for="">Kategori Restoran</label>
            <input type="text" class="form-control" name="kategori_restoran" placeholder="Masukkan Kategori Restoran"
              value="{{old('kategori_restoran', @$data['kategori_restoran'])}}" required>
            <input type="hidden" name="kategori_restoran_lama" value="{{@$data['kategori_restoran']}}">
            @error('kategori_restoran')
            <div class="text-danger">
              {{$message}}
            </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" class="form-control" accept="image/*" name="gambar" id="gambar"
              value="{{old('gambar', @$data['foto_kategori'])}}">
            <input type="hidden" id="gambar_lama" name="gambar_lama" value="{{@$data['foto_kategori']}}">
            @error('gambar')
            <div class="text-danger">
              {{$message}}
            </div>
            @enderror()
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  const btnSave = document.querySelector('#btn-save');

  btnSave.addEventListener('click', async (event) => {
    const fileInput = $("#gambar")
    const oldImage = $("#gambar_lama").val()

    const file = fileInput[0].files[0]
    const formData = new FormData()
    formData.append('image', file)
    formData.append('oldImage', oldImage)
    const {data} = await axios.post('/upload-file', formData)
    $("#nameImage").val(data.imageName)

    $('#submit').trigger('click')
  });

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