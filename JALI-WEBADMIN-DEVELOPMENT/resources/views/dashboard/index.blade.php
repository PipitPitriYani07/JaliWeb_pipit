@extends('templates/template')

@section('views')
<script src="{{url("")}}/assets/plugins/chart.js/Chart.min.js"></script>
<div class="row">
  <div class="col-lg-3 col-6">
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{$total_pesanan}}</h3>
        <p>Pesanan Hari Ini</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{$total_pengguna}}</h3>
        <p>Pengguna Terdaftar</p>
      </div>
      <div class="icon">
        <i class="ion ion-person"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
      <div class="inner">
        <h3 style="color: white">{{$pengguna_minggu}}</h3>
        <p style="color: white">+ Pengguna Minggu Ini</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{$pengguna_aktif}}</h3>
        <p>Pengguna Aktif</p>
      </div>
      <div class="icon">
        <i class="ion ion-checkmark"></i>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-7">
    <div class="card">
      <div class="card-header">Grafik Jumlah Pesanan</div>
      <div class="card-body">
        <div class="chart">
          <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-5">
    <div class="small-box bg-success">
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <div class="inner">
        <p style="margin-left: 20%;">Jumlah Pesanan<br>{{$jml_pesanan}} kali</p>
      </div>
    </div>
    <div class="small-box bg-success">
      <div class="inner">
        <p style="margin-left: 20%;">Total Pendapatan Kotor<br>{{'Rp. ' . number_format($total_kotor, 0, ',', '.')}}</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
    </div>
    <div class="small-box bg-success">
      <div class="inner">
        <p style="margin-left: 20%;">Total Pendapatan Bersih<br>{{'Rp. ' . number_format($total_bersih, 0, ',', '.')}}</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-7">
    <div class="card">
      <div class="card-header">Transaksi Terbaru</div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table id="tb" class="table table-bordered table-striped text-nowrap" style="width: 100%">
            <thead>
              <tr>
                <th style="white-space: nowrap;">Waktu</th>
                <th style="white-space: nowrap;">Layanan</th>
                <th style="white-space: nowrap;">Pemesanan</th>
                <th style="white-space: nowrap;">Status</th>
                <th style="white-space: nowrap;">Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-5">
    <div class="card">
      <div class="card-header">Jenis Layanan Paling Laris</div>
      <div class="card-body">
        <div class="chart">
          <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  var table
  let total_jali_mot = '{{ $total_mot }}'
  let total_jali_mob = '{{ $total_mob }}'
  let total_jali_kur = '{{ $total_kur }}'
  let total_jali_mam = '{{ $total_mam }}'
  const layanan_mot = '{{$layanan_mot}}'
  const layanan_mob = '{{$layanan_mob}}'
  const layanan_kur = '{{$layanan_kur}}'
  const layanan_mam = '{{$layanan_mam}}'

  const numLayananMot = layanan_mot.split(',');
  const numLayananMob = layanan_mob.split(',');
  const numLayananKur = layanan_kur.split(',');
  const numLayananMam = layanan_mam.split(',');

  $(function () {
    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      datasets: [
        {
          label               : 'Jali Mot',
          backgroundColor     : '#f56954',
          borderColor         : '#f56954',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : '#f56954',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#f56954',
          data                : numLayananMot
        },
        {
          label               : 'Jali Mob',
          backgroundColor     : '#00a65a',
          borderColor         : '#00a65a',
          pointRadius         : false,
          pointColor          : '#00a65a',
          pointStrokeColor    : '#00a65a',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#00a65a',
          data                : numLayananMob
        },
        {
          label               : 'Jali Kurir',
          backgroundColor     : '#f39c12',
          borderColor         : '#f39c12',
          pointRadius         : false,
          pointColor          : '#f39c12',
          pointStrokeColor    : '#f39c12',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#f39c12',
          data                : numLayananKur
        },
        {
          label               : 'Jali Mami',
          backgroundColor     : '#00c0ef',
          borderColor         : '#00c0ef',
          pointRadius         : false,
          pointColor          : '#00c0ef',
          pointStrokeColor    : '#00c0ef',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#00c0ef',
          data                : numLayananMam
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }
    //-------------
    //- BAR CHART -
    //-------------
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Jali Mot',
          'Jali Mob',
          'Jali Kurir',
          'Jali Mami',
      ],
      datasets: [
        {
          data: [total_jali_mot,total_jali_mob,total_jali_kur,total_jali_mam],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    table = $('#tb').DataTable({
      processing: true,
      serverSide: true,
      searching: false,
      ordering: false,
      entries: false,
      bLengthChange: false,
      ajax: {
        url: '{!! route("dashboard.listData") !!}',
        method: 'post',
        data: (data) => {
          data._token = '{{csrf_token()}}';
        }
      },
      columns: [
        {
          data: 'waktu_pesanan',
          orderable: false,
          searchable: false
        },
        {
          data: 'layanan',
          orderable: false,
          searchable: false
        },
        {
          data: 'pemesan',
          orderable: false,
          searchable: false
        },
        {
          data: 'status',
          orderable: false,
          searchable: false
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        }
      ]
    });
  })
</script>
@endsection
