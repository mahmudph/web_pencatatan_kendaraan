<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Tambah Data barang</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/merk/merk/simpan">
      <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama kategori</label>

                  <div class="col-sm-10">
                    <input type="text" name="nama_merek" class="form-control" id="inputEmail3" placeholder="nama merk">
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url();?>admin/merk/merk" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Simpan</button>
              </div>
              <!-- /.box-footer -->
    </form>
  </div>
</div>