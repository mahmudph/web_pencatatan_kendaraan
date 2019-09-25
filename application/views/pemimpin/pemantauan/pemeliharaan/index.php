<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Tambah Data pemeliharaan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/pemeliharaan/save_pemeliharaan" enctype="multipart/form-data">
      <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">kendaraan</label>
            <div class="col-sm-10">
                <select name='kendaraan' id='Merk' class='form-control' required>
                  <option value=''>----pilih kendaraan----</option>;
                  <?php foreach($kendaraan as $ken) { ?>
                    <option value="<?php echo $ken->id_kendaraan?>"><?php echo $ken->nama_kendaraan; ?></option>";
                  <?php } ?>
                </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Pegawai</label>
            <div class="col-sm-10">
                <select name='id_user' id='Merk' class='form-control' required>
                <option value=''>----Pilih pegawai----</option>";
                  <?php foreach($users as $usr) { ?>
                    <option value="<?php echo $usr->id_users_public?>"><?php echo $usr->nama_user; ?></option>";
                  <?php } ?>
                </select>
            </div>
          </div>
            <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi Perbaikan</label>
            <div class="col-sm-10">
              <textarea type="text" name="description" class="form-control" id="inputEmail3" placeholder="deskripsi perbaikan" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tanggal perbaikan</label>
            <div class="col-sm-10">
            <input type="text" name="tgl_perbaikan" class="form-control" id="inputEmail3" placeholder="Tangal perbaikan" data-provide="datepicker" required>
          </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Biaya perbaikan</label>
            <div class="col-sm-10">
            <input type="number" name="biaya" class="form-control" id="inputEmail3" placeholder="Rp." required>
          </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Foto Perbaikan</label>
            <div class="col-sm-10">
              <input type="file" name="photo" class="form-control" id="inputEmail3" required>
          </div>
          </div>

        <!-- /.box-body -->
        <div class="box-footer pull-right">
          <a href="<?php echo base_url();?>admin/kendaraan" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
          <button type="submit" class="btn btn-info btn-sm">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>