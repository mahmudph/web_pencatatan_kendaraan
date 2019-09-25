<div class="box box-primary">
  <div class="box-header">
    </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama peminjam</th>
                <th> Nama kendaraan </th>
                <th>Tanggal awal Pemkaaian</th>
                <th>Tanggal Kembali</th>
                <th>Keterangan</th>
                <!-- <th>Action</th> -->
              </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            foreach ($data as $row) {
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row->nama_user;?></td>
              <td><?php echo $row->nama_kendaraan;?></td>
              <td><?php echo $row->tgl_pemakaian;?></td>
              <td><?php echo $row->tanggal_kembali;?></td>
              <td><?php echo $row->keterangan;?></td>
              <!-- <td>
                <a href="<?php echo base_url()."admin/peminjamaan/update/".$row->id_peminjaman; ?>" class="btn btn-success btn-sm">Edit</a>
                <a href="<?php echo base_url()."admin/peminjamaan/hapus/".$row->id_peminjaman; ?>" class="btn btn-danger btn-sm">Delete</a>
          </td> -->
      </tr>
      <?php
  $no++;
  }
  ?>
</table>
</div>