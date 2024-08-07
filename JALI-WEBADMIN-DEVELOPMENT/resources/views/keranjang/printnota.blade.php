@php
    use App\Libraries\IndoTime;
    use Carbon\Carbon;
    $indotime = new IndoTime();

    $pemesan = DB::table('pengguna')->where('id_pengguna', $data['id_pengguna_pemesan'])->first();
    $mitra = DB::table('pengguna')->where('id_pengguna', $data['id_pengguna_mitra'])->first();
    $layanan = DB::table('layanan')->where('id_layanan', $data['id_layanan'])->first();
@endphp
<!DOCTYPE html>
<html>

<head>
    <title>Laporan Bagi Hasil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        hr {
            border: 2px solid black;
            margin: 20px 0;
        }

        h3 {
            text-align: center;
            text-decoration: underline;
        }

        span.text-center {
            text-align: center;
            font-style: italic;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12px;
        }

        th,
        td {
            border: 2px solid black;
        }

        .bg-blue-400 {
            background-color: #63a5fa;
            color: black;
        }

        .text-xs {
            font-size: 10px;
        }

        .text-xl {
            font-size: 1.25rem;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="mx-auto p-10">
        <div class="" style="position: relative">
            <img src="data:image/jpeg;base64,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"
                width="60" style="position: absolute; top: 5">
            <div style="position: absolute; left: 100; top: 10;">
                <span class="text-xl">JALI</span>
                <br>
                <span>Kabupaten Bogor, Jawa Barat</span>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <hr />
        <h3>NOTA TRANSAKSI</h3>
        <table style="border-color: white; margin-top: 50px">
            <tbody>
                <tr>
                    <td style="border-color: white;">ID Transaksi</td>
                    <td style="border-color: white;">: {{$id}}</td>
                    <td style="color: white; border-color: white;">___</td>
                    <td style="color: white; border-color: white;">___</td>
                    <td style="color: white; border-color: white;">___</td>
                </tr>
                <tr>
                    <td style="border-color: white;">Tgl. Transaksi</td>
                    <td style="border-color: white;">: {{ $indotime->convertDate($data['waktu_pemesanan'], 4) }}</td>
                    <td style="color: white; border-color: white;">___</td>
                    <td style="color: white; border-color: white;">___</td>
                    <td style="color: white; border-color: white;">___</td>
                </tr>
                <tr>
                    <td style="border-color: white;">Konsumen</td>
                    <td style="border-color: white;">: {{ $pemesan->nama_lengkap }}</td>
                    <td style="color: white; border-color: white;">___</td>
                    <td style="color: white; border-color: white;">___</td>
                    <td style="color: white; border-color: white;">___</td>
                </tr>
                <tr>
                    <td style="border-color: white;">Mitra</td>
                    <td style="border-color: white;">: {{ $data['id_pengguna_mitra'] != null ? $mitra->nama_lengkap : '-' }}</td>
                    <td style="color: white; border-color: white;">___</td>
                    <td style="color: white; border-color: white;">___</td>
                    <td style="color: white; border-color: white;">___</td>
                </tr>
                <tr>
                    <td style="border-color: white;">Layanan</td>
                    <td style="border-color: white;">: {{ $layanan->nama_layanan }}</td>
                    <td style="color: white; border-color: white;">___</td>
                    <td style="color: white; border-color: white;">___</td>
                    <td style="color: white; border-color: white;">___</td>
                </tr>
            </tbody>
        </table>
        <div class="relative" style="margin-top: 20px">
            <table style="width: 100%;">
                <thead class="bg-blue-400">
                    <tr>
                        <th style="padding: 10; width: 5%;" scope="col" class="text-center">No</th>
                        <th style="padding: 10;" scope="col" class="text-center">Item Pembelian</th>
                        <th style="padding: 10; width: 25%;" scope="col" class="text-center">Harga Satuan</th>
                        <th style="padding: 10; width: 25%;" scope="col" class="text-center">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th style="padding: 10;" scope="col">1</th>
                        <th style="padding: 10; text-align: left;" scope="col">Biaya Perjalanan</th>
                        <th style="padding: 10;" scope="col"></th>
                        <th style="padding: 10;" scope="col"></th>
                    </tr>
                    <tr>
                        <th style="padding: 10;" scope="col" rowspan="6"></th>
                        <th style="padding: 10; text-align: left;" scope="col">Lokasi Awal</th>
                        <th style="padding: 10;" scope="col"></th>
                        <th style="padding: 10;" scope="col"></th>
                    </tr>
                    <tr>
                        @if ($data['id_layanan'] == '4')
                            @php
                                $nama_resto = DB::table('menu')->leftJoin('restoran', 'restoran.id_restoran', '=', 'menu.id_restoran')->where('id_menu', $menu_pertama->id_menu)->first();
                            @endphp
                            @if ($nama_resto)
                                <td style="padding: 10;" scope="col">{{@$alamat_awal->alamat_awal != null ? $nama_resto->nama_restoran . ', ' . @$alamat_awal->alamat_awal : ' '}}</td>
                            @else
                                <td style="padding: 10;" scope="col">{{@$alamat_awal->alamat_awal != null ? @$alamat_awal->alamat_awal : ' '}}</td>
                            @endif
                        @else
                            <td style="padding: 10;" scope="col">{{$alamat_awal->alamat_awal != null ? $alamat_awal->alamat_awal : ' '}}</td>
                        @endif
                        <td style="padding: 10;" scope="col"></td>
                        <td style="padding: 10;" scope="col"></td>
                    </tr>
                    <tr>
                        <td style="padding: 10;" scope="col"></td>
                        <td style="padding: 10;" scope="col"></td>
                        <td style="padding: 10;" scope="col"></td>
                    </tr>
                    <tr>
                        <th style="padding: 10; text-align: left;" scope="col">Lokasi Tujuan</th>
                        <th style="padding: 10;" scope="col"></th>
                        <th style="padding: 10;" scope="col"></th>
                    </tr>
                    <tr>
                        <td style="padding: 10;" scope="col">{{$alamat_tujuan->alamat_tujuan != null ? $alamat_tujuan->alamat_tujuan : ' ' . '(' .
                            $alamat_tujuan->jarak . ' KM)'}}</td>
                        <td style="padding: 10; text-align: right;" scope="col">{{'Rp. ' . number_format($data['biaya_perjalanan'],0,',','.')}}</td>
                        <td style="padding: 10; text-align: right;" scope="col">{{'Rp. ' . number_format($data['biaya_perjalanan'],0,',','.')}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 10; text-align: right;" scope="col">Total</td>
                        <td style="padding: 10; text-align: right;" scope="col">{{'Rp. ' . number_format($data['biaya_perjalanan'],0,',','.')}}</td>
                    </tr>
                    <tr>
                        <th style="padding: 10;" scope="col">2</th>
                        <th style="padding: 10; text-align: left;" scope="col">Biaya Lainnya</th>
                        <th style="padding: 10;" scope="col"></th>
                        <th style="padding: 10;" scope="col"></th>
                    </tr>
                    @if ($data['id_layanan'] == '4')
                        <tr style="padding: 10;" scope="col">
                            <td rowspan="{{$total_menu + 1}}" style="padding: 10;" scope="col"></td>
                            <td style="padding: 10;" scope="col">{{$menu_pertama->nama_menu . ' x ' . $menu_pertama->qty}}</td>
                            <td style="padding: 10; text-align: right;" scope="col">{{'Rp. ' . number_format($menu_pertama->harga,0,',','.')}}</td>
                            <td style="padding: 10; text-align: right;" scope="col">{{'Rp. ' . number_format($menu_pertama->sub_total,0,',','.')}}</td>
                        </tr>
                        @foreach ($rincian_menu as $showRM)
                            @if ($showRM->id_rincian_menu != $menu_pertama->id_rincian_menu)
                                <tr>
                                    <td style="padding: 10;" scope="col">{{$showRM->nama_menu . ' x ' . $showRM->qty}}</td>
                                    <td style="padding: 10; text-align: right;" scope="col">{{'Rp. ' . number_format($showRM->harga,0,',','.')}}</td>
                                    <td style="padding: 10; text-align: right;" scope="col">{{'Rp. ' . number_format($showRM->sub_total,0,',','.')}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr>
                            <td colspan="2" style="padding: 10; text-align: right;" scope="col">Total</td>
                            <td style="padding: 10; text-align: right;" scope="col">{{'Rp. ' . number_format($data['biaya_makanan'],0,',','.')}}</td>
                        </tr>
                    @else
                        <tr>
                            <td rowspan="2" style="padding: 10;" scope="col"></td>
                            <td style="padding: 10;" scope="col">-</td>
                            <td style="padding: 10; text-align: right;" scope="col">Rp 0</td>
                            <td style="padding: 10; text-align: right;" scope="col">Rp 0</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding: 10; text-align: right;" scope="col">Total</td>
                            <td style="padding: 10; text-align: right;" scope="col">Rp 0</td>
                        </tr>
                    @endif
                    <tr>
                        <th style="padding: 10;" scope="col">3</th>
                        <th style="padding: 10; text-align: left;" scope="col">Potongan Harga</th>
                        <th style="padding: 10;" scope="col"></th>
                        <th style="padding: 10;" scope="col"></th>
                    </tr>
                    <tr>
                        <td rowspan="2" style="padding: 10;" scope="col"></td>
                        <td style="padding: 10;" scope="col">{{$data['id_promo'] ? DB::table('promo')->where('id_promo', $data['id_promo'])->first('judul_promo')->judul_promo : '-'}}</td>
                        <td style="padding: 10; text-align: right;" scope="col">{{'Rp. ' . number_format($data['diskon'],0,',','.')}}</td>
                        <td style="padding: 10; text-align: right;" scope="col">{{'Rp. ' . number_format($data['diskon'],0,',','.')}}</td>
                    </tr>
                    @php
                        if ($data['id_layanan'] == '4') {
                            $total_pendapatan = $data['biaya_perjalanan'] + $data['biaya_makanan'] - $data['diskon'];
                        } else {
                            $total_pendapatan = $data['biaya_perjalanan'] - $data['diskon'];
                        }
                    @endphp
                    <tr>
                        <td colspan="2" style="padding: 10; text-align: right;" scope="col">Total</td>
                        <td style="padding: 10; text-align: right;" scope="col">({{'Rp. ' . number_format($data['diskon'],0,',','.')}})</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="padding: 10; text-align: right;" scope="col">Total Bayar</td>
                        <td style="padding: 10; text-align: right;" scope="col">{{'Rp. ' . number_format($total_pendapatan,0,',','.')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
