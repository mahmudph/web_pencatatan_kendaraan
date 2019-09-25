<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Tambah pegawai</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>/admin/peminjam/add_data" enctype="multipart/form-data">
      <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"> Nama </label>
                  <div class="col-sm-10">
                    <input type="text" required name="nama" class="form-control" id="inputEmail3" placeholder="nama pegawai">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"> Nip </label>
                  <div class="col-sm-10">
                    <input type="text" required name="nip" class="form-control" id="inputEmail3" placeholder="Nip pegawai">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">jenis kelamin</label>
                  <div class="col-sm-10">
                      <select name='gender' id='Merk' class='form-control' required>
                        <option value=''>---- Jenis Kelamin -------</option>";
                        <option value="1">laki-laki</option>";
                        <option value="2"> Perempuan</option>";
                      </select>
                  </div>
                </div>
                 
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" >Umur</label>
                  <div class="col-sm-10">
                    <input required type="number" name="umur" class="form-control" id="inputEmail3" placeholder="Umur">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Foto </label>
                  <div class="col-sm-10">
                    <input type="file" name="photo" class="form-control" id="inputEmail3" required>
                </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="alamat" class="form-control" id="inputEmail3" placeholder="alamat"></textarea>
                  </div>
                </div>
              <!-- /.box-body -->
        
              <div class="box-footer pull-right">
                <a href="<?php echo base_url();?>admin/peminjam/" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
                <button type="submit" class="btn btn-info btn-sm">Simpan</button>
              </div>
                        </div>
              <!-- /.box-footer -->
    </form>
  </div>
</div>