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
      <form action="{{url("restoran")}}" method="POST" id="form" enctype="multipart/form-data">
        <div class="card-header">
          <a href="{{url("restoran")}}" class="btn btn-warning"><i class="fas fa-chevron-left"></i> Kembali</a>
          <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan</button>
        </div>
        <div class="card-body">
          @csrf
          <input type="hidden" name="id" value="{{@$data['id_restoran']}}">
          <div class="form-group">
            <label for="">Nama Restoran</label>
            <input type="text" class="form-control" name="nama_restoran" placeholder="Masukkan Nama Restoran"
            value="{{old('nama_restoran', @$data['nama_restoran'])}}" required>
            <input type="hidden" name="nama_restoran_lama" value="{{@$data['nama_restoran']}}">
            @error('nama_restoran')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat Restoran"
            value="{{old('alamat', @$data['alamat'])}}" required>
            <input type="hidden" name="alamat_lama" value="{{@$data['alamat']}}">
            @error('alamat')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Latitude</label>
            <input type="text" class="form-control" name="latitude" placeholder="Masukkan Latitude"
            value="{{old('latitude', @$data['latitude'])}}" required>
            <input type="hidden" name="latitude_lama" value="{{@$data['latitude']}}">
            @error('latitude')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Longitude</label>
            <input type="text" class="form-control" name="longitude" placeholder="Masukkan Longitude"
            value="{{old('longitude', @$data['longitude'])}}" required>
            <input type="hidden" name="longitude_lama" value="{{@$data['longitude']}}">
            @error('longitude')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Kategori</label>
            <select name="kategori[]" class="form-control select2 text-dark" required multiple="multiple">
              <option value="">--Pilih Kategori Restoran--</option>
              @foreach ($kategori as $ktgr)
                {{$id_kategori_restoran = @$data_kategori[$ktgr->id_kategori_restoran] ? $data_kategori[$ktgr->id_kategori_restoran] : NULL}}
                {{$selected = $id_kategori_restoran == $ktgr->id_kategori_restoran ? 'selected' : ''}}
                <option value="{{$ktgr->id_kategori_restoran}}" {{$selected}}>{{$ktgr->kategori_restoran}}</option>
              @endforeach
            </select>
            @error('kategori')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Status Restoran</label>
            <select name="id_status_restoran" class="form-control" required>
              <option value="">--Pilih Status Restoran--</option>
              @foreach ($status as $sts)
                @php
                  $selected = $sts->id_status_resto == @$data['id_status_restoran'] ? 'selected' : ''
                @endphp
                <option value="{{$sts->id_status_resto}}" {{$selected}}>{{$sts->status}}</option>
              @endforeach
            </select>
            @error('id_status_restoran')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Pemilik Restoran</label>
            <select name="id_pengguna_pemilik" class="form-control select2">
              <option value="">--Pilih Pemilik Restoran--</option>
              @foreach ($pemilik as $pmlk)
                @php
                  $selected = $pmlk->id_pengguna == @$data['id_pengguna_pemilik'] ? 'selected' : ''
                @endphp
                <option value="{{$pmlk->id_pengguna}}" {{$selected}}>{{$pmlk->nama_lengkap ? $pmlk->nama_lengkap : $pmlk->alamat_email}}</option>
              @endforeach
            </select>
            @error('id_pengguna_pemilik')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Kota</label>
            <select name="id_kota_layanan" class="form-control select2" required>
              <option value="">--Pilih Kota--</option>
              @foreach ($kota as $skt)
                @php
                  $selected = $skt->id_kota_layanan == @$data['id_kota_layanan'] ? 'selected' : ''
                @endphp
                <option value="{{$skt->id_kota_layanan}}" {{$selected}}>{{$skt->nama_kota}}</option>
              @endforeach
            </select>
            @error('id_kota_layanan')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" class="form-control" accept="image/*" name="gambar" id="gambar" value="{{old('gambar', @$data['foto_restoran'])}}">
            <input type="hidden" id="gambar_lama" name="gambar_lama" value="{{@$data['foto_restoran']}}">
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
