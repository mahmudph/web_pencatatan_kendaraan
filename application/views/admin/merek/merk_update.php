<div class="box box-primary">
	<div class="box-header">
        <h3 class="box-title">Update Merek</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <?php foreach($barang as $b){ ?>
		<form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/merk/merk/edit">
			<div class="box-body">
			    <input type="hidden" name="idmerk" value="<?php echo $b->idmerk ?>">
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Nama Merk</label>
              <div class="col-sm-10">
                <input type="text" name="nama_merk" class="form-control" id="inputPassword3" value="<?php echo $b->nmmerk; ?>">
              </div>
            </div>
          
            <div class="box-footer">
              <a href="<?php echo base_url();?>admin/merk/merk" class="btn btn-danger btn-sm">Batal</a> &nbsp;&nbsp;
              <button type="submit" class="btn btn-info btn-sm">Update</button>
            </div>
            <!-- /.box-footer -->
          <?php } ?>
		</form>
	</div>
</div>