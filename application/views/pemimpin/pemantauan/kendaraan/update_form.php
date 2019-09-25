<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Edit Data Kendaraan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/kendaraan/simpan_update" enctype="multipart/form-data">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label"> Nama Kendaraan</label>
            <div class="col-sm-10">
              <input type="text" name="nama_kendaraan" value="<?php echo $data->nama_kendaraan; ?>" class="form-control" id="inputEmail3" placeholder="nama kendaraan">
              <input type="hidden" name="id" value="<?php echo $data->id_kendaraan; ?>" class="form-control" id="inputEmail3">
              
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
              <textarea type="text" name="description" value="" class="form-control" id="inputEmail3" placeholder="Description"><?php echo $data->description; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Spesifikasi</label>
            <div class="col-sm-10">
              <input type="text" name="spesifikasi" class="form-control" value="<?php echo $data->spesifikasi; ?>" id="inputEmail3" placeholder="spesifikasi">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">No polisi</label>
            <div class="col-sm-10">
              <input type="text" name="no_polisi" class="form-control" id="inputEmail3" placeholder="No polisi" value="<?php echo $data->no_polisi; ?>">
            </div>
          </div>         
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Merk</label>
            <div class="col-sm-10">
              <input type="text" name="merek" class="form-control" id="inputEmail3" placeholder="merek" value="<?php echo $data->merek; ?>">
            </div>
          </div> 
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tahun keluaraan</label>
            <div class="col-sm-10">
              <input type="Date" name="tahun_keluar" class="form-control" id="inputEmail3" placeholder="tahun keluar" id='date-picker' value="<?php echo $data->tahun_keluaran; ?>">
          </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Foto kendaraan</label>
            <div class="col-sm-10">
              <input type="file" name="photo" class="form-control" id="inputEmail3">
              <input type="hidden" name="old_foto" id="" class="form-control" value="<?php echo $data->foto; ?>">
          </div>
          </div>

        <!-- /.box-body -->
        <div class="box-footer pull-right">
          <a href="<?php echo base_url();?>admin/kendaraan" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
          <button type="submit" class="btn btn-info btn-sm">Simpan</button>
        </div>
    </form>
  </div>
</div>