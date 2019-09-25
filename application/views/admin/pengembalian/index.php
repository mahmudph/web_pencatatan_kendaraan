<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Pengembalian Kendaraan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/peminjamaan/save_kembali" enctype="multipart/form-data">

      <div class="box-body">
      <?php foreach($kendaraan as $T) { ?>        
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Kode kendaraan</label>
            <div class="col-sm-10">
              <select id='Merk' class='form-control' readonly>
                    <option value="<?php echo $T->id_peminjaman?>"><?php echo $T->no_polisi?></option>
              </select>
            </div>
        </div>
          

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Nama peminjam</label>
          <div class="col-sm-10">
              <input type="text" name="tanggal" id="" class="form-control" value="<?= $T->nama_user ?>"readonly>
              <input type="hidden" name="id_kendaraan" id="" class="form-control" value="<?= $T->id_kendaraan ?>"readonly>
              <input type="hidden" name="id_peminjaman" id="" class="form-control" value="<?php echo $T->id_peminjaman?>" readonly>
          </div>
        </div>
  
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">tanggal pinjam</label>
            <div class="col-sm-10">
                <input type="text" id="" class="form-control" value="<?php echo $T->tgl_pemakaian?>" readonly>
            </div>
          </div>
          
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Kembali tanggal</label>
            <div class="col-sm-10">
                <input type="text"  id="" class="form-control" value="<?php echo $T->tanggal_kembali?>" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Keterangan Peminjaman</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="" cols="30" rows="5" readonly><?php echo $T->keterangan?></textarea>
            </div>
          </div>


      <?php } ?>
      <div class="box-footer pull-right">
        <a href="<?php echo base_url('admin/berita/');?>" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
        <button type="submit" class="btn btn-info btn-sm">Kembalikan</button>
      </div>
    </div>
    </form>
  </div>
</div>
