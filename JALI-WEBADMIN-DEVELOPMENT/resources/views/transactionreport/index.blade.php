@extends('templates/template')

@section('views')
<div class="row">
    <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-6">
                Laporan Bagi Hasil
            </div>
            <div class="col-lg-6">
                <div class="float-right">
                    <div id="jam"></div>
                </div>
            </div>
        </div>
        <div class="card">
            <form action="#">
                <div class="card-header">Periode Laporan</div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row ml-0">
                            <div class="form-check col-lg-4 col-form-label">
                                <input class="form-check-input" type="radio" id="harian">
                                <label class="form-check-label">Laporan harian</label>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai"
                                            value="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="col-lg-1 col-form-label">
                                        <label class="form-check-label">s/d</label>
                                    </div>
                                    <div class="col-lg-5">
                                        <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai"
                                            value="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row ml-0">
                            <div class="form-check col-lg-4 col-form-label">
                                <input class="form-check-input" type="radio" id="bulanan">
                                <label class="form-check-label">Laporan bulanan</label>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <select name="bulan" id="bulan" class="form-control" onchange="reload()">
                                            <option value="">-- Pilih Bulan --</option>
                                            <option value="01" {{date('m') == '01' ? 'selected' : ''}}>Januari</option>
                                            <option value="02" {{date('m') == '02' ? 'selected' : ''}}>Februari</option>
                                            <option value="03" {{date('m') == '03' ? 'selected' : ''}}>Maret</option>
                                            <option value="04" {{date('m') == '04' ? 'selected' : ''}}>April</option>
                                            <option value="05" {{date('m') == '05' ? 'selected' : ''}}>Mei</option>
                                            <option value="06" {{date('m') == '06' ? 'selected' : ''}}>Juni</option>
                                            <option value="07" {{date('m') == '07' ? 'selected' : ''}}>Juli</option>
                                            <option value="08" {{date('m') == '08' ? 'selected' : ''}}>Agustus</option>
                                            <option value="09" {{date('m') == '09' ? 'selected' : ''}}>September</option>
                                            <option value="10" {{date('m') == '10' ? 'selected' : ''}}>Oktober</option>
                                            <option value="11" {{date('m') == '11' ? 'selected' : ''}}>November</option>
                                            <option value="12" {{date('m') == '12' ? 'selected' : ''}}>Desember</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-5">
                                        <select name="tahun" id="tahun" class="form-control" onchange="reload()">
                                            <option value="">-- Pilih Tahun --</option>
                                            @for ($tahun = 2023; $tahun <= 2030; $tahun++)
                                                <option value="{{ $tahun }}" {{date('Y') == $tahun ? 'selected' : ''}}>{{ $tahun }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="col-lg-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <a class="btn btn-primary" style="color: white;" id="btn-lihat-laporan"
                            onClick="lihatLaporan()"> Lihat Laporan</a>
                        <!-- <a class="btn btn-success" style="color: white;" id="btn-lihat-laporan"
                            onClick="unduhLaporan()"> Unduh Laporan</a> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const harian = document.getElementById("harian")
    const bulanan = document.getElementById("bulanan")

    function updateClock() {
        var date = new Date();
        var monthNames = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        var month = monthNames[date.getMonth()];
        var year = date.getFullYear();
        var day = date.getDate();
        var formattedDate = day + ' ' + month + ' ' + year;

        var date = new Date();
        var hours = date.getHours();
        var minutes = date.getMinutes();

        var formattedHours = hours.toString().padStart(2, '0');
        var formattedMinutes = minutes.toString().padStart(2, '0');

        $('#jam').html('<i class="fa fa-clock"></i>' + formattedDate + ' ' + formattedHours + ':' + formattedMinutes);
    }

    document.addEventListener('DOMContentLoaded', function() {
        updateClock();
    });

    setInterval(updateClock, 60000);

    const lihatLaporan = () => {
        const tgl_mulai = $("#tgl_mulai").val()
        const tgl_selesai = $("#tgl_selesai").val()
        const bulan = $("#bulan").val()
        const tahun = $("#tahun").val()
        
        if (!harian.checked && !bulanan.checked) {
            alert("Harap pilih salah satu opsi");
            return;
        }

        if (bulanan.checked && (bulan == '' || tahun == '')) {
            alert("Harap pilih bulan dan tahun")
            return;
        }

        if (harian.checked && (tgl_mulai != '' && tgl_selesai != '')) {
            var url = `{{ url('laporan-transaksi/lihat-laporan/') }}/${tgl_mulai}/${tgl_selesai}`;

            window.location.href = url;
        } else if (bulanan.checked && (bulan != '' || tahun != '')) {
            var url = `{{ url('laporan-transaksi/lihat-laporan-bulanan/') }}/${bulan}/${tahun}`;

            window.location.href = url;
        } else {
            return confirm('Maaf data yang anda masukan tidak lengkap.');
        }
    }

    // const unduhLaporan = () => {
    //     const bulan = document.getElementById("bulan").value;
    //     const tahun = document.getElementById("tahun").value;
    //     const tgl_mulai = $("#tgl_mulai").val()
    //     const tgl_selesai = $("#tgl_selesai").val()
    //     if (!harian.checked && !bulanan.checked) {
    //         alert("Harap pilih salah satu opsi");
    //         return;
    //     }

    //     if (bulanan.checked && (bulan == '' || tahun == '')) {
    //         alert("Harap pilih bulan dan tahun")
    //         return;
    //     }
    //     if (harian.checked && (tgl_mulai != '' && tgl_selesai != '')) {
    //         var url = `{{ url('laporan-transaksi/print/') }}/${tgl_mulai}/${tgl_selesai}`;

    //         window.location.href = url;
    //     } else if (bulanan.checked && (bulan != '' || tahun != '')) {
    //         var url = `{{ url('laporan-transaksi/print-bulanan/') }}/${bulan}/${tahun}`;

    //         window.location.href = url;
    //     } else {
    //         return confirm('Maaf data yang anda masukan tidak lengkap.');
    //     }
    // }

    const reload = () => {
        const bulan = document.getElementById("bulan").value;
        const tahun = document.getElementById("tahun").value;
        const tgl_mulai = $("#tgl_mulai").val()
        const tgl_selesai = $("#tgl_selesai").val()
        if (bulan && tahun) {
            const tanggalAwal = new Date(tahun, bulan - 1, 1);
            const tanggalAkhir = new Date(tahun, bulan, 0);

            const tanggalAwalFormatted = `01-${bulan}-${tahun}`;
            const tanggalAkhirFormatted = `${tanggalAkhir.getDate()}-${bulan}-${tahun}`;
            tgl_mulai = tanggalAwalFormatted;
            tgl_selesai = tanggalAkhirFormatted;
        }
    };
</script>
@endsection
