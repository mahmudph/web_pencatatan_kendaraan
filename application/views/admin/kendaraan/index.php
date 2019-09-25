<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Tambah Data Kendaraan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/kendaraan/simpan" enctype="multipart/form-data">
      <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label"> Nama Kendaraan</label>
            <div class="col-sm-10">
              <input type="text" name="nama_kendaraan" class="form-control" id="inputEmail3" placeholder="nama kendaraan">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Type kendaraan</label>
            <div class="col-sm-10">
                <select name='type' id='Merk' class='form-control'>
                  <option value=''>----Pilih type kendaraan----</option>;
                  <?php foreach($type as $tipe) { ?>
                    <option value="<?php echo $tipe->id_type?>"><?php echo $tipe->type_kendaraan; ?></option>";
                  <?php } ?>
                </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Kondisi kendaraan</label>
            <div class="col-sm-10">
                <select name='kondisi' id='Merk' class='form-control'>
                <option value=''>----Pilih kondisi kendaraan----</option>";
                  <?php foreach($kondisi_kn as $kondisi) { ?>
                    <option value="<?php echo $kondisi->id_kondisi?>"><?php echo $kondisi->kondisi; ?></option>";
                  <?php } ?>
                </select>
            </div>
          </div>
            <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
              <textarea type="text" name="description" class="form-control" id="inputEmail3" placeholder="Description"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Spesifikasi</label>
            <div class="col-sm-10">
              <input type="text" name="spesifikasi" class="form-control" id="inputEmail3" placeholder="spesifikasi">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">No polisi</label>
            <div class="col-sm-10">
              <input type="text" name="no_polisi" class="form-control" id="inputEmail3" placeholder="No polisi">
            </div>
          </div>         
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Merk</label>
            <div class="col-sm-10">
              <input type="text" name="merek" class="form-control" id="inputEmail3" placeholder="merek">
            </div>
          </div> 
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tahun keluaraan</label>
            <div class="col-sm-10">
              <input type="Date" name="tahun_keluar" class="form-control" id="inputEmail3" placeholder="tahun keluar" id='date-picker'>
          </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Foto kendaraan</label>
            <div class="col-sm-10">
              <input type="file" name="photo" class="form-control" id="inputEmail3">
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