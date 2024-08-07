@extends('templates/template')

@section('views')
<div class="col-12 col-md-6">
  <div id="flashdata"></div>
  <div class="card">
    <form id="form">
      @csrf
      <div class="card-header">
        <a href="#" onclick="history.back()" class="btn btn-warning"><i class="fas fa-chevron-left"></i>
          Kembali</a>
        <button type="button" class="btn btn-success float-right" onclick="kirimHandler()"><i
            class="fas fa-paper-plane"></i>
          Kirim</button>
      </div>

      <div class="card-body">
        <div class="form-group">
          <label for="">Kirim ke</label>
          <input type="text" class="form-control" value="{{$pengguna['nama_lengkap']}}" disabled>
          <input type="hidden" id="kirim_ke" value="{{$pengguna['firebase_id_token']}}">
        </div>

        <div class="form-group">
          <label for="">Judul</label>
          <input type="text" class="form-control" name="judul" id="judul" autocomplete="off" required>
        </div>

        <div class="form-group">
          <label for="">Pesan</label>
          <textarea name="pesan" class="form-control" id="pesan" rows="5"></textarea>
        </div>
      </div>

    </form>
  </div>
</div>
<script>
  // const url = '{{url("")}}'
  
  const kirimHandler = async () => {
    const kirimKe = $("#kirim_ke").val()
    const judul = $("#judul").val()
    const pesan = $("#pesan").val()

    if(judul == '' || pesan == ''){
      alert("danger", "Harap isi semua form")
      return;
    }
    if(kirimKe == ""){
      alert("danger", "Pesan tidak terkirim pastikan pengguna sudah terdaftar di aplikasi")
      return;
    }
    const req = await fetch('{{url("/pengguna/kirim_pesan")}}', {
      method: 'POST',
      body: JSON.stringify({ _token: '{{csrf_token()}}', kirimKe, judul, pesan }),
      headers: { 'Content-Type': 'application/json' },
    })
    const {status} = await req.json()
    if(status === 400){
      alert("danger", "Pesan tidak terkirim pastikan pengguna sudah terdaftar di aplikasi")
      return;
    }
    alert("success", "Pesan berhasil dikirim")
  }
</script>
@endsection