<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?= $this->load->view('template/header', '', TRUE) ?>
<?= $this->load->view('template/sidebar', '', TRUE) ?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Home</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-block text-center">
                        Selamat Datang di Sistem Pendukung Keputusan Penilaian Kinerja Karyawan untuk Pemilihan Calon Manager Menggunakan Metode Analytical Hierarchy Process (AHP)
                    </div>
                    <div class="text-center mb-4">
                       
                        <br><a href='<?php echo base_url() ?>'><img src="<?php echo base_url().'public/assets/images/jiji.png'?>" width="600px"></a></br>
                    </div>
                    <div class="text-center mb-4">
                    <span style="font-size: 2rem">
                            <b>
                                <i class="mdi mdi-account-box light-logo"></i>
                            </b>
                            <span class="light-logo"><strong>SPK</strong> PEMILIHAN CALON MANAGER - AHP</span>
                        </span>
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