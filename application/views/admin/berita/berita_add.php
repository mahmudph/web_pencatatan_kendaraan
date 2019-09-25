<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Input Berita</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>/admin/berita/berita/simpan" enctype='multipart/form-data'>
			<div class="box-body">
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">judul berita </label>

                  <div class="col-sm-10">
                    <input type="judul" name="judul" class="form-control" id="inputPassword3">
                  </div>
                </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-10">
                    <select name='idkategori' id='kategori' class='form-control'>
                     <option value=''>----Pilih kategori----</option>";
                     <?php  
                      foreach ($kt->result() as $row_kategori) {  ?>

                        <option value="<?php echo $row_kategori->idkategori; ?>"><?php echo $row_kategori->kategori; ?></option>;
                      <?php } ?>
                    
                    </select>
  
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">isi</label>
                  <div class="col-sm-10">
                    <input type="text" name="isi" class="form-control" id="date-picker" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal berita</label>

                  <div class="col-sm-10">
                    <input type="date" name="tgl_berita" class="form-control" id="date-picker" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Foto </label>

                  <div class="col-sm-10">
                    <input type="file" name="foto_berita" class="form-control" id="inputPassword3" >
                  </div>
                </div>
              <div class="box-footer">
                <a href="<?php echo base_url();?>admin/berita/berita" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Tambah</button>
              </div>
              <!-- /.box-footer -->
          
        </form>
  </div>
</div>