<div class="box box-primary">
  <div class="box-header">
    </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama kendaraan</th>
              <th>Jenis Kendaraan</th>
              <th>No polisi </th>
              <th>Kondisi</th>
              <th>Merek</th>
              <th>Tahun Keluar</th>
              <th>Spesifikasi </th>
              <th>Description</th>
              <th>Foto</th>
              
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          $no = 1;
          foreach ($data as $row) {
        ?>
        <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row->nama_kendaraan;?></td>
              <td><?php echo $row->type_kendaraan;?></td>
              <td><?php echo $row->no_polisi;?></td>
              <td><?php echo $row->kondisi;?></td>
              <td><?php echo $row->merek;?></td>
              <td><?php echo $row->tahun_keluaran;?></td>
              <td><?php echo $row->spesifikasi;?></td>
              <td><?php echo $row->description;?></td>
              <td>
                  <img src="<?php echo base_url()."assets/upload_foto_image/".$row->foto;?>" alt="" width='70px' height="70px"></td>
              <td>
              <a href="<?php echo base_url()."admin/kendaraan/update/".$row->id_kendaraan; ?>" class="btn btn-success btn-sm">Edit</a>
              <a href="<?php echo base_url()."admin/kendaraan/hapus/".$row->id_kendaraan; ?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
      </tr>
      <?php
  $no++;
  }
  ?>
</table>
</div>