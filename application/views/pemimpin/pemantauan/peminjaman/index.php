<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Tambah Data Peminjaman mobil</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/peminjamaan/add_data" enctype="multipart/form-data">
      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Pilih kendaraan</label>
          <div class="col-sm-10">
              <select name='kendaraan' id='Merk' class='form-control'>
                <option value=''>----Pilih Kendaraan----</option>";
                <?php foreach($this->kendaraan->get_kendaraan_free()->result() as $T) { ?>
                    <option value="<?php echo $T->id_kendaraan?>"><?php echo $T->nama_kendaraan?></option>
                <?php } ?>
              </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Nama Peminjam</label>
          <div class="col-sm-10">
              <select name='users' id='Merk' class='form-control'>
                <option value=''>----Pilih Nama peminjam----</option>;
                <?php foreach($this->peminjam->getUserKaryawan() as $name) { ?> 
                  <option value="<?php echo $name->id_users_public?>"> <?php echo $name->nama_user ?></option>
                <?php } ?>
              </select>
          </div>
        </div>

          <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>
          <div class="col-sm-10">
            <textarea type="keterangan" name="keterangan" class="form-control" id="inputEmail3" placeholder="keterangan"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Pinjam</label>
          <div class="col-sm-10">
            <input type="text" name="tgl_pinjam" class="form-control" id="inputEmail3" placeholder="Tangal pinjam" data-provide="datepicker">
          </div>
        </div>
      
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Kembali</label>
          <div class="col-sm-10">
            <input type="text" name="tgl_kembali" class="form-control" id="datepicker" placeholder="Tanggal kembali"  data-provide="datepicker">
        </div>
        </div>
        

      <div class="box-footer pull-right">
        <a href="<?php echo base_url();?>admin/pengelolaan/koleksi_barang" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
        <button type="submit" class="btn btn-info btn-sm">Simpan</button>
      </div>
    </div>
    </form>
  </div>
</div>
