{{-- @dd($data) --}}
@extends('templates/template')

@section('views')
<div class="col-12 col-md-6 col-lg-4">
     <div class="card">
       <form action="{{url("jamOperasional/save")}}" method="post" id="form">
          @method('put')
         @csrf
         <input type="hidden" name="id" value="{{$data->id_jam_operasional}}">
         <input type="hidden" name="id_restoran" value="{{$data->id_restoran}}">
         <div class="card-header">
           <a href="{{url("restoran/detail/" . base64_encode($data->id_restoran))}}" class="btn btn-warning"><i class="fas fa-chevron-left"></i> Kembali</a>
           <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan</button>
         </div>
   
         <div class="card-body">
           <div class="form-group">
             <label for="">Hari</label>
             <select name="hari" id="hari" class="form-control" required>
               <option value="1" {{ $data->nomor_hari == '1' ? 'selected' : '' }}>Senin</option>
               <option value="2" {{ $data->nomor_hari == '2' ? 'selected' : '' }}>Selasa</option>
               <option value="3" {{ $data->nomor_hari == '3' ? 'selected' : '' }}>Rabu</option>
               <option value="4" {{ $data->nomor_hari == '4' ? 'selected' : '' }}>Kamis</option>
               <option value="5" {{ $data->nomor_hari == '5' ? 'selected' : '' }}>Jumat</option>
               <option value="6" {{ $data->nomor_hari == '6' ? 'selected' : '' }}>Sabtu</option>
               <option value="7" {{ $data->nomor_hari == '7' ? 'selected' : '' }}>Minggu</option>
             </select>
             @error('nomor_hari')
             <div class="text-danger">
               {{$message}}
             </div>
             @enderror()
           </div>

           <div class="form-group">
             <label for="">Jam Buka</label>
             <!-- <input type="text" class="form-control" name="jam_buka" id="jam_buka"
               value="{{old('jam_buka', $data->jam_buka)}}" required autocomplete="off" placeholder="Contoh: 20:00"> -->
            <div class="input-group date" id="timepicker" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#timepicker" name="jam_buka" id="jam_buka" placeholder="Contoh: 20:00" value="{{old('jam_buka', $data->jam_buka)}}"/>
              <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="far fa-clock"></i></div>
              </div>
            </div>
             @error('jam_buka')
             <div class="text-danger">
               {{$message}}
             </div>
             @enderror()
           </div>
   
           <div class="form-group">
             <label for="">Jam Tutup</label>
             <!-- <input type="text" class="form-control" name="jam_tutup" id="jam_tutup" value="{{old('jam_tutup', $data->jam_tutup)}}"
               autocomplete="off" required placeholder="Contoh: 20:00"> -->
            <div class="input-group date" id="timepicker2" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#timepicker2" name="jam_tutup" id="jam_tutup" placeholder="Contoh: 20:00" value="{{old('jam_tutup', $data->jam_tutup)}}"/>
              <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="far fa-clock"></i></div>
              </div>
            </div>
             @error('jam_tutup')
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
  $(function() {
    $('#timepicker').datetimepicker({
      format: 'HH:mm'
    })

    $('#timepicker2').datetimepicker({
      format: 'HH:mm'
    })
  });
</script>
@endsection