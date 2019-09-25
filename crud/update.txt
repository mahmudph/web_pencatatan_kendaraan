<div class="box box-primary">
	<div class="box-header">
        <h3 class="box-title">Update Data Barang</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <?php foreach($barang as $b){ ?>
		<form class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/admin/data_barang/edit">
			<div class="box-body">
			<input type="hidden" name="id_barang" value="<?php echo $b->id_barang ?>">
      <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kode Barang</label>

                  <div class="col-sm-10">
                    <input type="text" name="kode_barang" class="form-control" id="inputPassword3" value="<?php echo $b->kode_barang ?>">
                  </div>
                </div>
          
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">nama barang</label>

                  <div class="col-sm-10">
                    <input type="text" name="nama_barang" class="form-control" id="inputPassword3" value="<?php echo $b->nama_barang ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Satuan</label>

                  <div class="col-sm-10">
                    <input type="text" name="satuan" class="form-control" id="inputEmail3" value="<?php echo $b->satuan ?>">
                  </div>
                </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis Barang</label>
                  <div class="col-sm-10">
                    <?php
                    echo "
                    <select name='jenis_barang' id='jenis_barang' class='form-control'>
                     <option value=''>----Pilih kategori Barang----</option>";
                      foreach ($kt->result() as $row_kategori) {  
                      echo "<option value='".$row_kategori->kt_produk."'>".$row_kategori->kt_produk."</option>";
                      }
                      echo"
                    </select>";
                    ?>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Stok</label>

                  <div class="col-sm-10">
                    <input type="text" name="stok" class="form-control" id="inputEmail3" value="<?php echo $b->stok ?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>

                  <div class="col-sm-10">
                    <input type="text" name="harga" class="form-control" id="inputEmail3" value="<?php echo $b->harga ?>">
                  </div>
                </div>
                  <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Status Pengguna</label>

                  <div class="col-sm-10">
                    <select name="status_pengguna" class="form-control">
                    	<option value="">Pilih Status Pengguna</option>
                    	<option value="aktif">Aktif</option>
                    	<option value="tidak_aktif">Tidak Aktif</option>
                    </select>
                  </div>
                </div > -->
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/admin/data_barang" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Update</button>
              </div>
              <!-- /.box-footer -->
            <?php } ?>
		</form>
	</div>
</div>