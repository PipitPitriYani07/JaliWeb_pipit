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
    #loading2 {
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
      <form action="{{url("pengguna/saveInfoMitra")}}" method="POST" id="form" enctype="multipart/form-data">
        <div class="card-header">
          <a href="{{url("pengguna/" . base64_encode($id_pengguna))}}" class="btn btn-warning"><i class="fas fa-chevron-left"></i> Kembali</a>
          <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan</button>
        </div>
        <div class="card-body">
          @csrf
          <input type="hidden" name="id" value="{{@$data->id_info_mitra}}">
          <input type="hidden" name="id_pengguna" value="{{$id_pengguna}}">
          <div class="form-group">
            <label for="">Plat Nomor</label>
            <input type="text" class="form-control" name="plat_nomor" placeholder="Masukkan Plat Nomor"
            value="{{old('plat_nomor', @$data->plat_nomor)}}" required>
            <input type="hidden" name="plat_nomor_lama" value="{{@$data->plat_nomor}}">
            @error('plat_nomor')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat"
            value="{{old('alamat', @$data->alamat)}}" required>
            <input type="hidden" name="alamat_lama" value="{{@$data->alamat}}">
            @error('alamat')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Kelurahan</label>
            <input type="text" class="form-control" name="kelurahan" placeholder="Masukkan Kelurahan"
            value="{{old('kelurahan', @$data->kelurahan)}}" required>
            <input type="hidden" name="kelurahan_lama" value="{{@$data->kelurahan}}">
            @error('kelurahan')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Jenis Kendaraan</label>
            <select name="id_jenis_kendaraan" class="form-control select2" required>
              <option value="">--Pilih Jenis Kendaraan--</option>
              @foreach ($jenis_kendaraan as $jsk)
                @php
                  $selected = $jsk->id_jenis_kendaraan == @$data->id_jenis_kendaraan ? 'selected' : ''
                @endphp
                <option value="{{$jsk->id_jenis_kendaraan}}" {{$selected}}>{{$jsk->jenis_kendaraan}}</option>
              @endforeach
            </select>
            @error('id_jenis_kendaraan')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Kecamatan</label>
            <select name="id_kecamatan" class="form-control select2" required>
              <option value="">--Pilih Kecamatan--</option>
              @foreach ($kecamatan as $kcmtn)
                @php
                  $selected = $kcmtn->id_kecamatan == @$data->id_kecamatan ? 'selected' : ''
                @endphp
                <option value="{{$kcmtn->id_kecamatan}}" {{$selected}}>{{$kcmtn->nama_kecamatan}}</option>
              @endforeach
            </select>
            @error('id_kecamatan')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Status Mitra</label>
            <select name="id_status_mitra" class="form-control select2" required>
              <option value="">--Pilih Status Mitra--</option>
              @foreach ($status_mitra as $jsk)
                @php
                  $selected = $jsk->id_status_mitra == @$data->id_status_mitra ? 'selected' : ''
                @endphp
                <option value="{{$jsk->id_status_mitra}}" {{$selected}}>{{$jsk->status_mitra}}</option>
              @endforeach
            </select>
            @error('id_status_mitra')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Kota Layanan</label>
            <select name="id_kota_layanan" class="form-control select2" required>
              <option value="">--Pilih Kota Layanan--</option>
              @foreach ($kota_layanan as $ktl)
                @php
                  $selected = $ktl->id_kota_layanan == @$data->id_kota_layanan ? 'selected' : ''
                @endphp
                <option value="{{$ktl->id_kota_layanan}}" {{$selected}}>{{$ktl->nama_kota}}</option>
              @endforeach
            </select>
            @error('id_kota_layanan')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Foto STNK</label>
            <input type="file" class="form-control" accept="image/*" name="foto_stnk" id="foto_stnk" value="{{old('foto_stnk', @$data->foto_stnk)}}">
            <input type="hidden" id="foto_stnk_lama" name="foto_stnk_lama" value="{{@$data->foto_stnk}}">
            @error('foto_stnk')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
            <div id="loading1"></div>
            <small class="success1"></small><br>
          </div>
          <div class="form-group">
            <label for="">Foto SIM</label>
            <input type="file" class="form-control" accept="image/*" name="foto_sim" id="foto_sim" value="{{old('foto_sim', @$data->foto_sim)}}">
            <input type="hidden" id="foto_sim_lama" name="foto_sim_lama" value="{{@$data->foto_sim}}">
            @error('foto_sim')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
            <div id="loading2"></div>
            <small class="success2"></small><br>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    if ($('#foto_stnk').val() != '' || $('#foto_stnk_lama').val() != '') {
      $("#loading1").animate({
        width: "100%"
      });
      $('.success1').html(`File sudah ada disistem`);
    }
    if ($('#foto_sim').val() != '' || $('#foto_sim_lama').val() != '') {
      $("#loading2").animate({
        width: "100%"
      });
      $('.success2').html(`File sudah ada disistem`);
    }

    $('#foto_stnk').on('change', function() {
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
    $('#foto_sim').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      if (fileName) {
        $("#loading2").animate({
          width: "0%"
        });
        $('.success2').html(`Proses...`);
        $("#loading2").animate({
          width: "100%"
        });
        setTimeout(function() {
          $('.success2').html(`File ${fileName} berhasil diunggah`).delay(1000);
        }, 1000);
      } else {
        $("#loading2").animate({
          width: "100%"
        });
        $('.success2').html(`File sudah ada disistem`);
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
