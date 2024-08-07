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
      <form action="{{url("potongan-harga")}}" method="POST" id="form" enctype="multipart/form-data">
        <div class="card-header">
          <a href="{{url("potongan-harga")}}" class="btn btn-warning"><i class="fas fa-chevron-left"></i> Kembali</a>
          <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan</button>
        </div>
        <div class="card-body">
          @csrf
          <input type="hidden" name="id" value="{{@$data['id_promo']}}">
          <div class="form-group">
            <label for="">Kode Promo</label>
            <input type="text" class="form-control" name="kode_promo" placeholder="Masukkan Kode Promo"
            value="{{old('kode_promo', @$data['kode_promo'])}}" required>
            <input type="hidden" name="kode_promo_lama" value="{{@$data['kode_promo']}}">
            @error('kode_promo')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Judul Promo</label>
            <input type="text" class="form-control" name="judul_promo" placeholder="Masukkan Judul Promo"
            value="{{old('judul_promo', @$data['judul_promo'])}}" required>
            <input type="hidden" name="judul_promo_lama" value="{{@$data['judul_promo']}}">
            @error('judul_promo')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Penjelasan</label>
            <input type="text" class="form-control" name="penjelasan" placeholder="Masukkan Penjelasan"
            value="{{old('penjelasan', @$data['penjelasan'])}}" required>
            <input type="hidden" name="penjelasan_lama" value="{{@$data['penjelasan']}}">
            @error('penjelasan')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Tanggal Mulai</label>
            <input type="date" class="form-control" name="tanggal_mulai" placeholder="Masukkan Judul Promo"
            value="{{old('tanggal_mulai', @$data['tanggal_mulai'])}}" required>
            <input type="hidden" name="tanggal_mulai_lama" value="{{@$data['tanggal_mulai']}}">
            @error('tanggal_mulai')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Tanggal Selesai</label>
            <input type="date" class="form-control" name="tanggal_selesai" placeholder="Masukkan Judul Promo"
            value="{{old('tanggal_selesai', @$data['tanggal_selesai'])}}" required>
            <input type="hidden" name="tanggal_selesai_lama" value="{{@$data['tanggal_selesai']}}">
            @error('tanggal_selesai')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Nilai</label>
            <input type="text" class="form-control" name="nilai" placeholder="Masukkan Nilai"
            value="{{old('nilai', @$data['nilai'])}}" required>
            <input type="hidden" name="nilai_lama" value="{{@$data['nilai']}}">
            @error('nilai')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Status</label>
            <select name="status" class="form-control" required>
              <option value="">--Pilih Jenis Promo--</option>
              @php
                $selected = @$data['status'] == '0' ? 'selected' : '';
                $selected1 = @$data['status'] == '1' ? 'selected' : '';
              @endphp
              <option value="0" {{$selected}}>Tidak Aktif</option>
              <option value="1" {{$selected1}}>Aktif</option>
            </select>
            @error('status')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Kuota</label>
            <input type="text" class="form-control" name="kuota" placeholder="Masukkan Kuota"
            value="{{old('kuota', @$data['kuota'])}}" required>
            <input type="hidden" name="kuota_lama" value="{{@$data['kuota']}}">
            @error('kuota')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Sisa Kuota</label>
            <input type="text" class="form-control" name="sisa_kuota" placeholder="Masukkan Sisa Kuota"
            value="{{old('sisa_kuota', @$data['sisa_kuota'])}}" required>
            <input type="hidden" name="sisa_kuota_lama" value="{{@$data['sisa_kuota']}}">
            @error('sisa_kuota')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Jenis Promo</label>
            <select name="id_jenis_promo" class="form-control select2" required>
              <option value="">--Pilih Jenis Promo--</option>
              @foreach ($jenis_promo as $jp)
                @php
                  $selected = $jp->id_jenis_promo == @$data['id_jenis_promo'] ? 'selected' : ''
                @endphp
                <option value="{{$jp->id_jenis_promo}}" {{$selected}}>{{$jp->jenis_promo}}</option>
              @endforeach
            </select>
            @error('id_jenis_promo')
              <div class="text-danger">
                {{$message}}
              </div>
            @enderror()
          </div>
          <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" class="form-control" accept="image/*" name="gambar" id="gambar" value="{{old('gambar', @$data['gambar'])}}">
            <input type="hidden" name="gambar_lama" id="gambar_lama" value="{{@$data['gambar']}}">
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
