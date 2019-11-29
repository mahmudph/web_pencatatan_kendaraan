<div class="box box-primary">
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama kendaraan</th>
              <th>No_polisi</th>
              <th> Nama pegawai </th>
              <th>Kondisi</th>
              <th>Merek</th>
              <th>Tanggal Perbaikan </th>
              <th>Harga Perbaikan</th>
              <th>keterangan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              <?php 
              $no = 1;
                foreach ($data as $row) { ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row->nama_kendaraan;?></td>
                  <td><?php echo $row->no_polisi;?></td>
                  <td><?php echo $row->nama_user;?></td>
                  <td><?php echo $row->kondisi;?></td>
                  <td><?php echo $row->merek;?></td>
                  <td><?php echo $row->tanggal_perbaikan;?></td>
                  <td>Rp. <?= number_format($row->harga_pemeliharaan)?></td>
                  <td><?php echo $row->keterangan;?></td>
                  <td>
                <a href="<?php echo base_url()."admin/pemeliharaan/update/".$row->id_pemeliharaan; ?>" class="btn btn-info btn-sm">selengkapnya</a>
                </td>
              </tr>
          <?php $no++; } ?>
                  
          </tbody>
      </table>
    </div>
  </div>
