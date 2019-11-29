<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Edit Data pemeliharaan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>admin/pemeliharaan/save_update" enctype="multipart/form-data">
      <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">kendaraan</label>
            <div class="col-sm-10">
                <select name='kendaraan' id='Merk' class='form-control' required>
                  <option value='<?= $data->id_kendaraan?>'><?= $data->nama_kendaraan?></option>;
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
                <option value='<?= $data->id_users_public?>'><?= $data->nama_user?></option>;
                  <?php foreach($users as $usr) { ?>
                    <option value="<?php echo $usr->id_users_public?>"><?php echo $usr->nama_user; ?></option>";
                  <?php } ?>
                </select>
            </div>
          </div>
            <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi Perbaikan</label>
            <div class="col-sm-10">
              <textarea type="text" name="description" class="form-control" id="inputEmail3" placeholder="deskripsi perbaikan" required><?= $data->keterangan;?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tanggal perbaikan</label>
            <div class="col-sm-10">
            <input type="text" name="tgl_perbaikan" value="<?= $data->tanggal_perbaikan?>" class="form-control" id="inputEmail3" placeholder="Tangal perbaikan" data-provide="datepicker" required>
          </div>
          </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Biaya perbaikan</label>
              <div class="col-sm-10">
              <input type="text" value='<?= $data->harga_pemeliharaan ?>' name="biaya" class="form-control" id="inputEmail3" placeholder="Rp." required>
            </div>
          </div>
          </div>
            <div class="row" style="margin-top: 20px; margin-left: 50px">
            <div class="col-md-12">
              <h2>PENILAIAN PERBAIKAN KENDARAAN</h2>
              <p></p>
            </div>
            <div class="col-md-4 col-md-offset-0 center">
              <div class="caption">
                <h4>Kendaraan Berhenti</h4>
                <p>Mesin mati, Perseneling Netral, Rem Pakkir di pasang, Roda di ganjel</p>
              </div>
              <br>
              <h4>Keliling/Bawah Kendaraan</h4>
               <div class="custom-control custom-checkbox">

                <input type="checkbox" class="custom-control-input" id="customcheck1"  name="checkbox1" <?= $data->kaca_depan == 1 ? 'checked' : '' ?> readonly>
                <label for="customcheck1" class="custom-control-label">Kaca Depan & Pintu</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck2" name="checkbox2" <?= $data->kaca_spion == 1 ? 'checked' : '' ?>>
                <label class="custom-control-label" for="customCheck2">Kaca Spion</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck3" name="checkbox3" <?= $data->kipas_kaca == 1 ? 'checked' : '' ?>>
                <label class="custom-control-label" for="customCheck3">Kipas Kaca</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck76" name="lampu_besar" <?=  $data->lampu_besar_dim == 1 ? 'checked' : '' ?>>
                <label class="custom-control-label" for="customCheck76">Lampu Besar dim</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck4" name="checkbox4"<?=  $data->lampu_kecil_sen_mobil == 1 ? 'checked' : '' ?>>
                <label class="custom-control-label" for="customCheck4">Lampu Kecil Sen mundur</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck5" name="checkbox5" <?=  $data->baut_mur_roda == 1 ? 'checked' : '' ?>>
                <label class="custom-control-label" for="customCheck5">Baut Mur roda</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck6" name="checkbox6" <?=  $data->ban_kodisi_tekanan == 1 ? 'checked' : '' ?>>
                <label class="custom-control-label" for="customCheck6">Ban Kondisi Tekanan</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck7" name="checkbox7" <?=  $data->per_baut_u_mur == 1 ? 'checked' : '' ?>>
                <label class="custom-control-label" for="customCheck7">Per baut u mur patah</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck8" name="checkbox8" <?=  $data->tali_kipas == 1 ? 'checked' : '' ?>>
                <label class="custom-control-label" for="customCheck8">Tali Kipas(van belt)</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck9" name="checkbox9" <?=  $data->tanki_solar == 1 ? 'checked' : '' ?>>
                <label class="custom-control-label" for="customCheck9">Tanki Solar(Fuel)</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck10" name="checkbox10" <?=  $data->kabel == 1 ? 'checked' : '' ?>>
                <label class="custom-control-label" for="customCheck10">Kabel Sambungan Lecet</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck11" name="checkbox11" <?=  $data->permukaan_oli_mesin == 1 ? 'checked' : '' ?>>
                <label class="custom-control-label" for="customCheck11">Permukaan olie mesin</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck12" name="checkbox12" <?=  $data->permukaan_air_radiator == 1 ? 'checked' : '' ?>>
                <label class="custom-control-label" for="customCheck12">Permukaan Air Radiator</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck13" name="checkbox13" <?=  $data->permukaan_oli_stir == 1 ? 'checked' : '' ?>>
                <label class="custom-control-label" for="customCheck13">Permukaan Oli Stir</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck14" name="checkbox14" <?=  $data->permukaan_oli_transmisi == 1 ? 'checked' : '' ?>>
                <label class="custom-control-label" for="customCheck14">Permukaan Oli Transmisi</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck15" name="checkbox15" <?=  $data->accu_air_kabel == 1 ? 'checked' : '' ?>>
                <label class="custom-control-label" for="customCheck15">Accu, Air, Kabel</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck16" name="checkbox16" <?=  $data->pembersi_saringan == 1 ? 'checked' : '' ?>>
                <label class="custom-control-label" for="customCheck16">Pembersihan Saringan Udara</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="caption">
                <h4>Mesin Hidup</h4>
                <p>Persneling Netral, Rem Parkir dipasang, Roda diganjal</p>
              </div>
              <br>
              <h4>Dalam Kabin</h4>
               <div class="custom-control custom-checkbox">
                <input type="checkbox" name="checkbox17" class="custom-control-input" id="customCheck17" <?=  $data->lampu_control_oli_mesin == 1 ? 'checked' : '' ?>>
                <label for="customCheck17" class="custom-control-label">Lampu Control Oli Mesin</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="checkbox18" class="custom-control-input" id="customCheck18" <?=  $data->control_lampu_besar == 1 ? 'checked' : '' ?>>
                <label for="customCheck18" class="custom-control-label">Constol Lampu Besar </label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="checkbox19" class="custom-control-input" id="customCheck19" <?=  $data->control_lampu_seri == 1 ? 'checked' : '' ?>>
                <label for="customCheck19" class="custom-control-label">Contol lampu sen</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="checkbox20" class="custom-control-input" id="customCheck20" <?=  $data->solar_volume_tanki == 1 ? 'checked' : '' ?>>
                <label for="customCheck20" class="custom-control-label">Solar, Volumen, Tanki</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck21" name="checkbox21" <?=  $data->hight_low_switch == 1 ? 'checked' : '' ?>>
                <label for="customCheck21" class="custom-control-label">Hight & Low Switch</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck22" name="checkbox22" <?=  $data->pedal_gas == 1 ? 'checked' : '' ?>>
                <label for="customCheck22" class="custom-control-label">Pedal Gas</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck23" name="checkbox23" <?=  $data->pedal_persneling == 1 ? 'checked' : '' ?>>
                <label for="customCheck23" class="custom-control-label">Pedal Perseneling</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck24" name="checkbox24" <?=  $data->handle_persneling == 1 ? 'checked' : '' ?>>
                <label for="customCheck24" class="custom-control-label">Handle Persneling</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck25" name="checkbox25" <?=  $data->seat_belt == 1 ? 'checked' : '' ?>>
                <label for="customCheck25" class="custom-control-label">Seat Belt</label>
              </div>


              <h4 style="margin-top: 30px">KEBERSIHAN KENDARAAN</h4>
               <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck50" name="checkbox39" <?=  $data->cuci_luar == 1 ? 'checked' : '' ?>>
                <label for="customCheck50" class="custom-control-label">Cuci Luar (Body) saja</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck51" name="checkbox40" <?=  $data->cuci_dalam == 1 ? 'checked' : '' ?>>
                <label for="customCheck51" class="custom-control-label">Cuci dalam (interior)</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck52" name="checkbox41" <?=  $data->cuci_bawah == 1 ? 'checked' : '' ?>>
                <label for="customCheck52" class="custom-control-label">Cuci bawah (Chesis) saja</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck53" name="checkbox42" <?=  $data->cuci_keseluruhan == 1 ? 'checked' : '' ?>>
                <label for="customCheck53" class="custom-control-label">Cuci keseluruhan(body, Interior Chesis)</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck54" name="checkbox43" <?=  $data->pemadam_api == 1 ? 'checked' : '' ?>>
                <label for="customCheck54" class="custom-control-label">Pemadam Api</label>
              </div>


            </div>
             <div class="col-md-4" style="margin-top: 20px">
              <div class="caption">
                <h4>Kendaraan Bergerak</h4>
                <p>Untuk Uji Jalan/Bergerak</p>
              </div>
              <br>
              <h4>Kendaraaan diJalankan</h4>
               <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck26">
                <label for="customCheck26" class="custom-control-label">Stir</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck27" name="checkbox27" <?=  $data->stir == 1 ? 'checked' : '' ?>>
                <label for="customCheck27" class="custom-control-label">Rem kaki</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck28" name="checkbox28" <?=  $data->rem_kaki == 1 ? 'checked' : '' ?>>
                <label for="customCheck28" class="custom-control-label">Rem Emergency</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck29" name="checkbox29" <?=  $data->rem_emergency == 1 ? 'checked' : '' ?>>
                <label for="customCheck29" class="custom-control-label">Gigi Perseneling</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck30" name="checkbox30" <?=  $data->spedometer == 1 ? 'checked' : '' ?>>
                <label for="customCheck30" class="custom-control-label">Spedometer</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck31" name="checkbox31" <?=  $data->r_p_m == 1 ? 'checked' : '' ?>>
                <label for="customCheck31" class="custom-control-label">R.P.M</label>
              </div>

              <h4 style="margin-top: 20px">Peralatan/Tools</h4>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck32" name="checkbox32" <?=  $data->dongkrak_kursi_roda == 1 ? 'checked' : '' ?>>
                <label for="customCheck32" class="custom-control-label">Dongkrak, Kursi Roda</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck33" name="checkbox33" <?=  $data->tringjar == 1 ? 'checked' : '' ?>>
                <label for="customCheck33" class="custom-control-label">Triangjar</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck34" name="checkbox34" <?=  $data->chein == 1 ? 'checked' : '' ?>>
                <label for="customCheck34" class="custom-control-label">Chein</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck35" name="checkbox35" <?=  $data->chain_bandle == 1 ? 'checked' : '' ?>>
                <label for="customCheck35" class="custom-control-label">Chain Bande</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck36" name="checkbox36" <?=  $data->pemadam_api == 1 ? 'checked' : '' ?>>
                <label for="customCheck36" class="custom-control-label">Pemadam Api</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck37" name="checkbox37" <?=  $data->ban_sarep == 1 ? 'checked' : '' ?>>
                <label for="customCheck37" class="custom-control-label">Ban Serep</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck38" name="checkbox38" <?=  $data->p3k == 1 ? 'checked' : '' ?>>
                <label for="customCheck38" class="custom-control-label">P3K</label>
              </div>
            </div>
          </div>
          <th/>
          <div class="row" style="margin-top: 30px; margin-left: 50px"> 
            <div class="col-md-6">
              <h4>Tandai Dalam Kolom</h4>
              <div class="row">
               
                <div class="col-md-6">

                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck54" name="checkbox42" checked disabled>
                    <label for="customCheck54" class="custom-control-label">Baik</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck54" name="checkbox42" disabled>
                    <label for="customCheck54" class="custom-control-label">Tidak baik</label>
                  </div>
                </div>
                 <div class="col-md-12">
                  <h5>UNTUK SEMUA PENGEMUDIAN</h5>
                  <p>
                    Check ini harus dilengkapi atau disi benar dan tepat serta diarahkan kepada atasan dan formulir ini merupakan dasar pertimbangan  penilaian 
                  </p>
                </div>
              </div>
              <p></p>
            </div>
          </div>
          </div>
        <!-- /.box-body -->
        <div class="box-footer pull-right">
          <a href="<?php echo base_url();?>admin/pemeliharaan" class="btn btn-danger btn-sm">Kembali</a> &nbsp;&nbsp;
  
        </div>
      </div>
    </form>
  </div>
</div>