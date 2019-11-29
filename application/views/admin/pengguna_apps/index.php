<div class="box box-primary">
  <div class="box-header">
        <h3 class="box-title">Tampil pengguna </h3>
    </div>
    <div class="box-body">
    <table class="table table-responsive table-hover">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Type user</th>
            <th>Action</th>
        </tr>
            <?php 
                $i = 1;
                foreach($this->admin->getUsers() as $us) { ?>
                    <tr>
                            <td><?= $i ?></td>
                            <td><?= $us->username ?></td>
                            <td><?= $us->email ?></td>
                            <td><?= $us->type_user == 1 ? 'admin' : 'pemimpin' ?> </td>
                            <td>
                                <a class="btn btn-xs btn-danger" href="<?= base_url("pemimpin/home/hapus/".$us->id_user) ?>">Hapus</a>
                            </td>
                    </tr>
                <?php 
                    $i = $i + 1;
                }
            ?>
    </table>
  </div>
</div>

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Tambah pengguna</h3>
    </div>
    <div class="box-body">
        <form class="form-horizontal" method="post" action="<?php echo base_url();?>pemimpin/home/add_user_save" enctype="multipart/form-data">
            <div class="box-body">

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" id="" placeholder="input nama pengguna" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Pilih Type pengguna</label>
                    <div class="col-sm-10">
                        <select name='tipe' id='Merk' class='form-control' required>
                            <option value=''>----Pilih tipe user----</option>";
                            <option value="1">admin</option>
                            <option value="2">pemimpinz</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" id="" placeholder="input nama pengguna" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" id="" placeholder="input password" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="cn_password" id="" placeholder="input confirm password" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-success btn-xs pull-right" name="submit" value="kirim" >
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>