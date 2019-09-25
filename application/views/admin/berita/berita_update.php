<div class="box box-primary">
	<div class="box-header">
        <h3 class="box-title">Update Data Barang</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <?php foreach($barang as $b){ ?>
		<form class="form-horizontal" method="post" action="<?php echo base_url();?>/admin/berita/berita/edit" enctype='multipart/form-data'>
			<div class="box-body">
			<input type="hidden" name="idberita" value="<?php echo $b->idberita ?>">
      <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Judul Berita</label>

                  <div class="col-sm-10">
                    <input type="text" name="judul" class="form-control" id="inputPassword3" value="<?php echo $b->judul ?>">
                  </div>
                </div>         
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">isi </label>

                  <div class="col-sm-10">
                    <input type="text" name="isi" class="form-control" id="inputPassword3" value="<?php echo $b->isiberita ?>">
                  </div>
                </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">kategori</label>
                  <div class="col-sm-10">
                    <select name='idkategori' id='kategori' class='form-control'>
                     <!-- <option value=''>----Pilih kategori Barang----</option>"; -->
                     <option value="<?php echo $b->idkategori; ?>"><?php echo $b->kategori; ?></option>;
                     <?php  
                      foreach ($kt->result() as $row_kategori) {  ?>
                        <option value="<?php echo $row_kategori->idkategori; ?>"><?php echo $row_kategori->kategori; ?></option>;
                      <?php } ?>
                    
                    </select>
  
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal berita</label>

                  <div class="col-sm-10">
                    <input type="date" name="tgl_berita" class="form-control" id="tgl_berita" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Foto </label>
                  <input type="hidden" name="foto_old" class="form-control" id="inputPassword3" value="<?php echo $b->fotoberita; ?>">
                  <div class="col-sm-10">
                    <input type="file" name="fotoberita" class="form-control" id="inputPassword3" >
                  </div>
                </div>
              <div class="box-footer">
                <a href="<?php echo base_url();?>admin/sdm/sdm" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Update</button>
              </div>
              <!-- /.box-footer -->
            <?php } ?>
		</form>
	</div>
</div>