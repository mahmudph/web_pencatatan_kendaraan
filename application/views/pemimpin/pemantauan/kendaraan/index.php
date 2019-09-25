<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">statistik Data Kendaraan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
  
      <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
              <div class="box-header">
                <h4 class="box-title">Statistik peminjam</h4>
              </div>
              <div class="box-body">
                  <canvas id="myChart" width="200" height="100"></canvas>
              </div>
            </div>
        </div>
        <div class="col-md-6">
        <div class="box box-info">
              <div class="box-header">
                <h4 class="box-title">Statistik Perbaikan</h4>
              </div>
              <div class="box-body">
                <canvas id="myChartLine" width="200" height="100" style="max-height:250px"></canvas>
              </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header">
              <h4>History peminjaman</h4>
            </div>
            <div class="box-body">
              <table class="table table-hover table-striped">
              <tr>
                <th>No</th>
                <!-- <th>Kode mobil</th> -->
                <th>Nama peminjam</th>
                <th>Tanggal Peminjam</th>
                <!-- <th>Tanggal kembali</th> -->
                <th>Lama dipinjam</th>
              </tr>
                <?php 
                $no = 1;
                foreach($his_pinjam->result() as $his) {
                  $tgl = new DateTime($his->tgl_pemakaian);
                  $kembali = new DateTime($his->tanggal_kembali);
                  ?>
                <tr>
                    <td><?= $no ?></td>
                    <!-- <td><?= $his->no_polisi?></td> -->
                    <td><?= $his->nama_user?></td>
                    <td><?= $his->tgl_pemakaian?></td>
                    <!-- <td><?= $his->tanggal_kembali ?></td> -->
                    <td><a href="#" class='bridge btn btn-xs btn-info'><?= $tgl->diff($kembali)->format('%a')?> Hari</a></td>
                </tr>
                <?php 
                $no = $no +1; 
                } ?>
            </table>
            </div>
          </div>
        </div>
        <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
              <h4>History Perbaikan</h4>
            </div>
            <div class="box-body">
              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Perbaikan</th>
                    <th>Harga perbaikan</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(count($perbaikan) > 0 ) { ?>
                    <?php $no= 0;?>
                    <?php foreach($perbaikan as $pb) { ?>
                        <tr>
                          <td><?= ($no + 1)  ?></td>
                          <td><?= $pb->tanggal_perbaikan  ?></td>
                          <td>Rp. <?= number_format($pb->harga_pemeliharaan)  ?></td>
                          <td><?= $pb->keterangan  ?></td>
                        </tr>
                    <?php $no+=1; } ?>
                  <?php } else{  ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Tidak Ditemukan data perbaikan</td>
                      <td></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
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