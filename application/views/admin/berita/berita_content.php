<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Input Data Berita &nbsp;&nbsp;<a href="<?php echo base_url()."admin/berita/berita/tambah/"?>"
        class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a></h3>
    </div>
 <!-- Main content -->
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>judul berita</th>
                    <th>kategori</th>
                    <th>isi</th>
                    <th>tgl.berita</th>
                    <th>foto</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
               <?php 
               $no = 1;
                foreach ($data->result() as $row) {
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row->judul;?></td>
                  <td><?php echo $row->kategori;?></td>
                  <td><?php echo $row->isiberita;?></td>
                  <td><?php echo $row->tglberita;?></td>
                  <td><img src="<?php echo base_url()."assets/dist/img/".$row->fotoberita ?>" width='150px'/></td>
                  <td>
            <a href="<?php echo base_url()."admin/berita/berita/update/".$row->idberita; ?>" class="btn btn-success btn-sm">Edit</a>
                  <a href="<?php echo base_url()."admin/berita/berita/hapus/".$row->idberita; ?>" class="btn btn-danger btn-sm">Delete</a>
          </td>
          </tr>
          <?php
      $no++;
      }
      ?>
</table>
</div>