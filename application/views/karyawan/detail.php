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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Detail Peserta Seleksi Manager</h4>
                        <div class="card-subtitle">
                            <?= anchor('karyawan', 'Kembali', 'class="btn btn-secondary"') ?>
                        </div>
                        <h4>Data Peserta Seleksi Manager</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td width="30%">Periode Penilaian</td>
                                    <td><?= $karyawan->periode_penilaian ?></td>
                                </tr>
                                <tr>
                                    <td width="30%">NIK</td>
                                    <td><?= $karyawan->nik ?></td>
                                </tr>
                                <tr>
                                    <td width="30%">Nama</td>
                                    <td><?= $karyawan->nama_karyawan ?></td>
                                </tr>
                                <tr>
                                    <td width="30%">Jenis Kelamin</td>
                                    <td><?= $karyawan->jenis_kelamin ?></td>
                                </tr>
                                <tr>
                                    <td width="30%">Bidang Pekerjaan</td>
                                    <td><?= $karyawan->bidang_pekerjaan ?></td>
                                </tr>
                                <tr>
                                    <td width="30%">Syarat Menjadi Manager</td>
                                    <td><?= empty($karyawan->syarat) ? '' : anchor('public/file/' . $karyawan->syarat, 'Download', 'target=_blank') ?></td>
                                </tr>
                                <tr>
                                    <td width="30%">Pernah Menjadi Pemimpin Project</td>
                                    <td><?= $karyawan->pemimpin_project ?></td>
                                </tr>
                                <tr>
                                    <td width="30%">Pendidikan Minimal S1</td>
                                    <td><?= $karyawan->minimal_s1 ?></td>
                                </tr>
                                <tr>
                                    <td width="30%">Pendidikan Terakhir</td>
                                    <td><?= $karyawan->pendidikan_terakhir ?></td>
                                </tr>
                            </table>
                        </div>
                        <h4>Kriteria Penilaian</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <?php foreach ($kriteria as $row) : ?>
                                    <tr>
                                        <td width="30%"><?= $row->nama_kriteria ?></td>
                                        <td><?= $nilai[$row->id_kriteria] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?= $this->load->view('template/copyright', '', TRUE) ?>
</div>
</div>

<?= $this->load->view('template/js', '', TRUE) ?>
<?= $this->load->view('template/footer', '', TRUE) ?>