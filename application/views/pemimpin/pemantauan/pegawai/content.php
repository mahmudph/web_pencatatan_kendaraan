<div class="box box-primary">
  <div class="box-header">
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th> Nama</th>
              <th>Nip</th>
              <th> Gender </th>
              <th> Umur</th>
              <th>Alamat</th>
              <th>Foto </th>
              <!-- <th>Action</th> -->
            </tr>
          </thead>
          <tbody>
          <?php 
          $no = 1;
          foreach ($datas as $row) {
        ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row->nama_user;?></td>
            <td><?php echo $row->nip;?></td>
            <td><?php echo $row->gender;?></td>
            <td><?php echo $row->umur;?></td>
            <td><?php echo $row->alamat;?></td>
            <td>
              <img src="<?php echo base_url()."assets/upload_foto_image/".$row->foto;?>" alt="" width='75px' height="75px"></td>
            <!-- <td>
            <a href="<?php echo base_url()."admin/pegawai/update/".$row->id_users_public; ?>" class="btn btn-success btn-sm">Edit</a>
            <a href="<?php echo base_url()."admin/pegawai/hapus/".$row->id_users_public; ?>" class="btn btn-danger btn-sm">Delete</a>
        </td> -->
    </tr>
    <?php
$no++;
}
?>
</table>
</div>