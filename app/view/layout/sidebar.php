<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="./" class="logo">
                <h4 class="text-white fw-bolder"><?= $dataPengguna['jabatan'] ?></h4>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <?php if ($dataPengguna['jabatan'] == "Operator Sekolah") : ?>
                    <li class="nav-item <?= ($page == "Dashboard" or $page == "DataPengguna") ? 'active submenu' : '' ?>">
                        <a data-bs-toggle="collapse" href="#home">
                            <i class="fas fa-home"></i>
                            <p>Home</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?= ($page == "Dashboard" or $page == "DataPengguna") ? 'show' : '' ?>" id="home">
                            <ul class="nav nav-collapse">
                                <li class="<?= $page == "Dashboard" ? 'active' : '' ?>">
                                    <a href="./">
                                        <span class="sub-item">Dashboard</span>
                                    </a>
                                </li>
                                <li class="<?= $page == "DataPengguna" ? 'active' : '' ?>   ">
                                    <a href="?p=DataPengguna">
                                        <span class="sub-item">Pengguna</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item <?= ($page == "DataSiswa" or $page == "DataNilai") ? 'active submenu' : '' ?>">
                        <a data-bs-toggle="collapse" href="#data">
                            <i class="fas fa-layer-group"></i>
                            <p>Data</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?= ($page == "DataSiswa" or $page == "DataNilai") ? 'show' : '' ?>" id="data">
                            <ul class="nav nav-collapse">
                                <li class="<?= $page == "DataSiswa" ? 'active' : '' ?>">
                                    <a href="?p=DataSiswa">
                                        <span class="sub-item">Data Siswa</span>
                                    </a>
                                </li>
                                <li class="<?= $page == "DataNilai" ? 'active' : '' ?>">
                                    <a href="?p=DataNilai">
                                        <span class="sub-item">Data Penilaian</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item <?= ($page == "Kriteria" or $page == "Oreste") ? 'active submenu' : '' ?>">
                        <a data-bs-toggle="collapse" href="#spk">
                            <i class="fas fa-chart-pie"></i>
                            <p>SPK</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?= ($page == "Kriteria" or $page == "Sub" or $page == "Oreste") ? 'show' : '' ?>" id="spk">
                            <ul class="nav nav-collapse">
                                <li class="<?= ($page == "Kriteria" or $page == "Sub") ? 'active' : '' ?>">
                                    <a href="?p=Kriteria">
                                        <span class="sub-item">Kriteria</span>
                                    </a>
                                </li>
                                <li class="<?= $page == "Oreste" ? 'active' : '' ?>">
                                    <a href="?p=Oreste">
                                        <span class="sub-item">Metode ORESETE</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item <?= ($page == "Laporan") ? 'active submenu' : '' ?>">
                        <a data-bs-toggle="collapse" href="#laporan">
                            <i class="fas fa-file-alt"></i>
                            <p>Laporan</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?= ($page == "Laporan") ? 'show' : '' ?>" id="laporan">
                            <ul class="nav nav-collapse">
                                <li class="<?= $page == "Laporan" ? 'active' : '' ?>">
                                    <a href="?p=Laporan">
                                        <span class="sub-item">Laporan Penilaian</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php else : ?>
                    <li class="nav-item <?= ($page == "Dashboard" or $page == "DataPengguna") ? 'active submenu' : '' ?>">
                        <a data-bs-toggle="collapse" href="#home">
                            <i class="fas fa-home"></i>
                            <p>Home</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?= ($page == "Dashboard" or $page == "DataPengguna") ? 'show' : '' ?>" id="home">
                            <ul class="nav nav-collapse">
                                <li class="<?= $page == "Dashboard" ? 'active' : '' ?>">
                                    <a href="./">
                                        <span class="sub-item">Dashboard</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item <?= ($page == "Laporan") ? 'active submenu' : '' ?>">
                        <a data-bs-toggle="collapse" href="#laporan">
                            <i class="fas fa-file-alt"></i>
                            <p>Laporan</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?= ($page == "Laporan") ? 'show' : '' ?>" id="laporan">
                            <ul class="nav nav-collapse">
                                <li class="<?= $page == "Laporan" ? 'active' : '' ?>">
                                    <a href="?p=Laporan">
                                        <span class="sub-item">Laporan Penilaian</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</div>