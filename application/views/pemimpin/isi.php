<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-md-5">
  <div class="panel panel-info">
      <div class="panel-heading">informasi akun</div>
      <div class="panel-body">
        <div class="text-center">
          <?php foreach($data as $row ) { ?>
            <img width="150" height="150" src="<?php echo base_url()?>assets/upload_foto_image/<?php echo $row->foto ?>" alt="foto profile">
            <table class="table table-striped table-hover" style="margin-top:20px">
              <tr>
                <td>Nama</td>
                <td><?php echo $row->username; ?></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td><?php echo $row->jabatan; ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><?php echo $row->email; ?></td>
              </tr>
            </table>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-7">
    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo $statistik['peminjam'] ?></h3>

          <p>Data pegawai </p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="<?php echo base_url()?>pemimpin/pegawai" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $statistik['kendaraan'] ?><sup style="font-size: 20px"></sup></h3>

          <p>Kendaraan</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="<?php echo base_url()?>pemimpin/kendaraan" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo $statistik['peminjaman'] ?></h3>

          <p>Data peminjamaan (Riwayat)</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="<?php echo base_url()?>pemimpin/peminjamaan" class="small-box-footer">Selengkapnya<i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-6 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
    <div class="inner">
      <h3><?php echo $statistik['pemeliharaan'] ?></h3>
      <p>Data pemeiharaan </p>
    </div>
    <div class="icon">
      <i class="ion ion-pie-graph"></i>
    </div>
    <a href="<?php echo base_url()?>pemimpin/pemeliharaan" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
  </div>
  
  </div>
   <div class="col-lg-12 col-xs-12">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $statistik['peminjaman_aktif'] ?></h3>

          <p>Data peminjamaan Aktif </p>
        </div>
        <div class="icon">
             <i class="ion ion-pie-graph"></i>
        </div>
        <a href="<?php echo base_url()?>pemimpin/berita/kendaran_aktif" class="small-box-footer">Selengkapnya<i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  
</section>
<div class="col-md-6">
    <div class="box box-info">
      <div class="box-header">
        <h4 class="box-title">Informasi statistik peminjaman</h4>
      </div>
      <div class="box-body">
      <canvas id="myChart" width="200" height="100"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header">
        <h4 class="box-title">Informasi statistik peminjaman</h4>
      </div>
      <div class="box-body">
      <canvas id="myChartLine" width="200" height="100" style="max-height:250px"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header">
        <h4 class="box-title">informasi peminjam 10 tersering </h4>
      </div>
      <div class="box-body">
            <table class="table table-hover table-striped">
              <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Jumlah meminjam</th>
                <th>Bulan</th>
                <th>Year</th>
              </thead>
              <tbody>
                <?php 
                $i = 0;
                foreach($jmlh_meminjam as $jml) { ?>
                  <tr>
                    <td><?= $i+1?></td>
                    <td><?= strtoupper($jml->nama_user)?></td>
                    <td><?= $jml->total?></td>
                    <td><?= $jml->bulan ?></td>
                    <th><?= $jml->year?></th>
                  </tr>
                <?php $i+=1; } ?>
              </tbody>
            </table>
      </div>
    </div>
  </div>
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:[<?php foreach($cn_peminjaman as $pj) { 
              echo $pj->bulan.",";

            } ?>],
        datasets: [{
            label: '# jumlah',
            data: [<?php foreach($cn_peminjaman as $pj) { 
              echo $pj->total.",";

            } ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
     },
    options: {
        scales: {
          yAxes: [{
                ticks: {
                    beginAtZero: true
                },
                scaleLabel: {
                  display: true,
                  labelString: 'Jumlah'
                }
            }],
            xAxes: [{
              scaleLabel: {
                display: true,
                labelString: 'bulan'
              }
            }],
        }
    }
});
</script>
<script>
var ctx = document.getElementById('myChartLine');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:[<?php foreach($cn_pemeliharaan as $pj) { 
              echo $pj->bulan.",";

            } ?>],
        datasets: [{
            label: '# of Votes',
            data: [<?php foreach($cn_pemeliharaan as $pj) { 
              echo $pj->total.",";

            } ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                },
                scaleLabel: {
                  display: true,
                  labelString: 'Jumlah'
                }
            }],
            xAxes: [{
              scaleLabel: {
                display: true,
                labelString: 'bulan'
              }
            }],
        }
    }
});
</script>