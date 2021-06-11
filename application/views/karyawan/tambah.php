<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?= $this->load->view('template/header', '', TRUE) ?>
<?= $this->load->view('template/sidebar', '', TRUE) ?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Peserta Seleksi Manager</h3>
            </div>
        </div>

        <div class="card">
            <div class="card-block">
                <?= form_open_multipart('karyawan/tambah', 'class="form-horizontal form-material"') ?>
                <h4 class="card-title">Tambah Peserta Seleksi Manager</h4>
                <?= $this->session->flashdata('success') ?>
                <div class="row">
                    <div class="col-6">
                        <h4>Data Peserta Seleksi Manager</h4>
                        <div class="form-group">
                            <label class="col-md-12">Periode Penilaian</label>
                            <div class="col-md-12">
                                <select name="id_periode" class="form-control form-control-line">
                                    <option value="">Pilih...</option>
                                    <?php foreach ($periode as $row) : ?>
                                        <option value="<?= $row->id_periode ?>" <?= set_select('id_periode', $row->id_periode) ?>><?= $row->periode_penilaian ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="text-danger"><?= form_error('id_periode') ?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">NIK</label>
                            <div class="col-md-12">
                                <input type="text" name="nik" class="form-control form-control-line" value="<?= set_value('nik') ?>">
                                <div class="text-danger"><?= form_error('nik') ?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Nama Karyawan</label>
                            <div class="col-md-12">
                                <input type="text" name="nama_karyawan" class="form-control form-control-line" value="<?= set_value('nama_karyawan') ?>">
                                <div class="text-danger"><?= form_error('nama_karyawan') ?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Jenis Kelamin</label>
                            <div class="col-md-12">
                                <select name="jenis_kelamin" class="form-control form-control-line">
                                    <option value="">Pilih...</option>
                                    <option value="Laki-laki" <?= set_select('jenis_kelamin', 'Laki-laki') ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= set_select('jenis_kelamin', 'Perempuan') ?>>Perempuan</option>
                                </select>
                                <div class="text-danger"><?= form_error('jenis_kelamin') ?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Bidang Pekerjaan</label>
                            <div class="col-md-12">
                                <select name="id_bidang" class="form-control form-control-line">
                                    <option value="">Pilih...</option>
                                    <?php foreach ($bidang as $row) : ?>
                                        <option value="<?= $row->id_bidang ?>" <?= set_select('id_bidang', $row->id_bidang) ?>><?= $row->bidang_pekerjaan ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="text-danger"><?= form_error('id_bidang') ?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Syarat Menjadi Manager</label>
                            <div class="col-md-12">
                                <input type="file" name="userfile" class="form-control">
                                <small>Ukuran maksimal 2MB</small>
                                <div class="text-danger"><?= form_error('userfile') ?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Pernah Menjadi Pemimpin Project</label>
                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pemimpin_project" id="pemimpin_project1" value="Ya" <?= set_radio('pemimpin_project', 'Ya') ?>>
                                    <label class="form-check-label" for="pemimpin_project1">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pemimpin_project" id="pemimpin_project2" value="Tidak" <?= set_radio('pemimpin_project', 'Tidak') ?>>
                                    <label class="form-check-label" for="pemimpin_project2">Tidak</label>
                                </div>
                                <div class="text-danger"><?= form_error('pemimpin_project') ?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Pendidikan Minimal S1</label>
                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="minimal_s1" id="minimal_s11" value="Ya" <?= set_radio('minimal_s1', 'Ya') ?>>
                                    <label class="form-check-label" for="minimal_s11">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="minimal_s1" id="minimal_s12" value="Tidak" <?= set_radio('minimal_s1', 'Tidak') ?>>
                                    <label class="form-check-label" for="minimal_s12">Tidak</label>
                                </div>
                                <div class="text-danger"><?= form_error('minimal_s1') ?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Pendidikan Terakhir</label>
                            <div class="col-md-12">
                                <input type="text" name="pendidikan_terakhir" class="form-control form-control-line" value="<?= set_value('pendidikan_terakhir') ?>">
                                <div class="text-danger"><?= form_error('pendidikan_terakhir') ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <h4>Kriteria Penilaian</h4>
                        <?php foreach ($kriteria as $row) : ?>
                            <div class="form-group">
                                <label class="col-md-12"><?= $row->nama_kriteria ?></label>
                                <div class="col-md-12">
                                    <input type="text" name="kriteria<?= $row->id_kriteria ?>" class="form-control form-control-line" value="<?= set_value('kriteria' . $row->id_kriteria) ?>" placeholder="1 - 100">
                                    <div class="text-danger"><?= form_error('kriteria' . $row->id_kriteria) ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" name="save" class="btn btn-success">Simpan</button>
                                <?= anchor('karyawan', 'Kembali', 'class="btn btn-secondary"') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>

    </div>
    <?= $this->load->view('template/copyright', '', TRUE) ?>
</div>
</div>

<?= $this->load->view('template/js', '', TRUE) ?>
<?= $this->load->view('template/footer', '', TRUE) ?>