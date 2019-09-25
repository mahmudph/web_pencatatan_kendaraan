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

          <p>Data Pegawai </p>
        </div>
        <div class="icon">
        <i class="ion ion-person-add"></i>
        </div>
        <a href="<?php echo base_url()?>admin/pegawai" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-6 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $statistik['kendaraan'] ?><sup style="font-size: 20px"></sup></h3>

          <p>Data Kendaraan</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="<?php echo base_url()?>admin/kendaraan" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
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
        <a href="<?php echo base_url()?>admin/peminjamaan" class="small-box-footer">Selengkapnya<i class="fa fa-arrow-circle-right"></i></a>
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
    <a href="<?php echo base_url()?>admin/pemeliharaan" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
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
        <a href="<?php echo base_url()?>admin/berita  " class="small-box-footer">Selengkapnya<i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
</section>