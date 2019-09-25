<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Tambah Data barang</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>/admin/data_barang/simpan">
      <div class="box-body">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode barang</label>

                  <div class="col-sm-10">
                    <input type="text" name="kode_barang" class="form-control" id="inputEmail3" placeholder="Kode Barang">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama barang</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_barang" class="form-control" id="inputEmail3" placeholder="Nama barang">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Satuan</label>
                  <div class="col-sm-10">
                    <input type="text" name="satuan" class="form-control" id="inputEmail3" placeholder="Satuan">
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
                    <input type="text" name="stok" class="form-control" id="inputEmail3" placeholder="Stok">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                  <div class="col-sm-10">
                    <input type="text" name="harga" class="form-control" id="inputEmail3" placeholder="Harga">
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>index.php/admin/data_barang" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Simpan</button>
              </div>
              <!-- /.box-footer -->
    </form>
  </div>
</div>