<div class="box box-primary">
    <div class="box-header">
        <h5>Peminjaman kendaraan aktif</h5>
    </div>

        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama peminjam</th>
                <th>Kode kendaraan</th>
                <th> Nama kendaraan </th>
                <th>Tanggal peminjaman</th>
                <th>Tanggal Kembali</th>
                <th>Keterangan</th>
                
                <th>Tersisa</th>
                <?php if($this->session->userdata('level' == 1)) { ?>
                  <th>Action</th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            $tgl = new DateTime();
            $new_date = date('Y-m-d');


            foreach ($data as $row) {
                $kembali = new DateTime($row->tanggal_kembali);
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row->nama_user;?></td>
              <td><?php echo $row->no_polisi;?></td>
              <td><?php echo $row->nama_kendaraan;?></td>
              <td><?php echo $row->tgl_pemakaian;?></td>
              <td><?php echo $row->tanggal_kembali;?></td>
              <td><?php echo $row->keterangan?></td>
             
              <?php if(strtotime($new_date) < strtotime($row->tanggal_kembali)) { ?>
                  <?php if($tgl->diff($kembali)->format('%a') < 5) { ?>
                    <td> <p title="terhitung dari hari sekarang" class='btn btn-warning btn-xs'><?= $tgl->diff($kembali)->format('%a')?>hari tersisa</p> </td>
                  <?php } else { ?>
                      <td> <p title="terhitung dari hari sekarang" class='btn btn-info btn-xs'><?= $tgl->diff($kembali)->format('%a')?>hari tersisa</p> </td>
                  <?php } ?>

              <?php } else { ?>
                  <td> <p title="terhitung dari hari ini belum dikembaliakan" class='btn btn-danger btn-xs'><?= $tgl->diff($kembali)->format('%a')?>hari terlewat</p> </td>
              <?php } ?>
    

              </td>
            <?php if($this->session->userdata('level' == 1)) { ?>
              <td><a title="kendaraan sudah kembali?" class="btn btn-success btn-xs" href="<?= base_url("/admin/peminjamaan/kembali/".$row->id_peminjaman) ?>">kembalian</a></td>
            <?php }  ?>



      </tr>
      <?php
  $no++;
  }
  ?>
</table>
</div>