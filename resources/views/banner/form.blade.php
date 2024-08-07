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
      <form action="{{url("banner")}}" method="POST" id="form" enctype="multipart/form-data">
        <div class="card-header">
          <a href="{{url("banner")}}" class="btn btn-warning"><i class="fas fa-chevron-left"></i> Kembali</a>
          <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan</button>
        </div>
        <div class="card-body">
          @csrf
          <input type="hidden" name="id" value="{{@$data['id_banner']}}">
          <div class="form-group">
            <label for="">Judul Banner</label>
            <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Banner"
            value="{{old('judul', @$data['judul'])}}" required>
            <input type="hidden" name="judul_lama" value="{{@$data['judul']}}">
            @error('judul')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Konten Banner</label>
            <textarea id="summernote" name="konten" required>{{@$data['konten']}}</textarea>
            <!-- <input type="text" class="form-control" name="konten" placeholder="Masukkan Konten Banner"
            value="{{old('konten', @$data['konten'])}}" required> -->
            <input type="hidden" name="konten_lama" value="{{@$data['konten']}}">
            @error('konten')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Posisi Banner</label>
            <select name="id_posisi_banner" class="form-control select2" required>
              <option value="">--Pilih Posisi Banner--</option>
              @foreach ($posisi as $sps)
                @php
                  $selected = $sps->id_posisi_banner == @$data['id_posisi_banner'] ? 'selected' : ''
                @endphp
                <option value="{{$sps->id_posisi_banner}}" {{$selected}}>{{$sps->posisi}}</option>
              @endforeach
            </select>
            @error('id_posisi_banner')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" class="form-control" accept="image/*" name="gambar" id="gambar" value="{{old('gambar', @$data['gambar'])}}">
            <input type="hidden" id="gambar_lama" name="gambar_lama" value="{{@$data['gambar']}}">
            @error('gambar')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
            <div id="loading1"></div>
            <small class="success1"></small><br>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()
    $('#summernote1').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
<script>
  $(document).ready(function() {
    if ($('#gambar').val() != '' || $('#gambar_lama').val() != '') {
      $("#loading1").animate({
        width: "100%"
      });
      $('.success1').html(`File sudah ada disistem`);
    }

    $('#gambar').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      if (fileName) {
        $("#loading1").animate({
          width: "0%"
        });
        $('.success1').html(`Proses...`);
        $("#loading1").animate({
          width: "100%"
        });
        setTimeout(function() {
          $('.success1').html(`File ${fileName} berhasil diunggah`).delay(1000);
        }, 1000);
      } else {
        $("#loading1").animate({
          width: "100%"
        });
        $('.success1').html(`File sudah ada disistem`);
      }
    })

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
