<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="waves-effect waves-dark" href="<?= base_url() ?>" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Home</span></a>
                </li>
                <?php if ($this->session->userdata('role') == 'Admin') : ?>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('kriteria') ?>" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Kriteria</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('nilai') ?>" aria-expanded="false"><i class="mdi mdi-alpha"></i><span class="hide-menu">Nilai</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('bidang') ?>" aria-expanded="false"><i class="mdi mdi-briefcase"></i><span class="hide-menu">Bidang Pekerjaan</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('periode') ?>" aria-expanded="false"><i class="mdi mdi-calendar"></i><span class="hide-menu">Periode Penilaian</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('karyawan') ?>" aria-expanded="false"><i class="mdi mdi-account-box"></i><span class="hide-menu">Karyawan</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('hasil') ?>" aria-expanded="false"><i class="mdi mdi-check-circle"></i><span class="hide-menu">Hasil Penilaian</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('grafik') ?>" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Grafik</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('pengguna') ?>" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Pengguna</span></a>
                    </li>
                <?php elseif ($this->session->userdata('role') == 'Pimpinan') : ?>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('hasil') ?>" aria-expanded="false"><i class="mdi mdi-check-circle"></i><span class="hide-menu">Hasil Penilaian</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="<?= site_url('grafik') ?>" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Grafik</span></a>
                    </li>
                <?php endif; ?>
                <li> <a class="waves-effect waves-dark" href="<?= site_url('password') ?>" aria-expanded="false"><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu">Ubah Password</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?= site_url('login/logout') ?>" aria-expanded="false"><i class="mdi mdi-logout"></i><span class="hide-menu">Logout</span></a>
                </li>
            </ul>
        </nav>
    </div>
</aside>