<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head -->
    <?php include 'app/view/layout/head.php' ?>
    <!-- \Head -->
</head>

<body>
    <!-- Controller -->
    <?php include 'app/controller/dashboard/spk_oreste.php' ?>
    <!-- \Controller -->

    <div class="wrapper">
        <!-- Sidebar -->
        <?php include 'app/view/layout/sidebar.php' ?>
        <!-- \Sidebar -->

        <div class="main-panel">
            <!-- Navbar -->
            <?php include 'app/view/layout/navbar.php' ?>
            <!-- \Navbar -->

            <!-- Content -->
            <div class="container">
                <div class="page-inner">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div>
                            <h1 class="fw-bolder mb-2"><?= $dataPage['page'] ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-stats card-round">
                                <div class="card-header">
                                    <h5 class="fw-bolder">Sub Penilaian</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-center align-middle">
                                            <thead>
                                                <tr>
                                                    <th>Alternatif</th>
                                                    <th>NISN Siswa</th>
                                                    <th>Nama Siswa</th>
                                                    <?php foreach ($queryKriteria as $rowk) : ?>
                                                        <th><?= $rowk['kode_kriteria'] ?></th>
                                                    <?php endforeach ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($queryNilai as $row) : ?>
                                                    <tr>
                                                        <td>A<?= $no++ ?></td>
                                                        <td><?= $row['nisn'] ?></td>
                                                        <td><?= $row['nama_siswa'] ?></td>
                                                        <?php foreach ($queryKriteria as $rowk) : ?>
                                                            <?php $kode = $rowk['kode_kriteria'] ?>
                                                            <td><?= $row[$kode] ?></td>
                                                        <?php endforeach ?>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-stats card-round">
                                <div class="card-header">
                                    <h5 class="fw-bolder">Rank Average</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-center align-middle">
                                            <thead>
                                                <tr>
                                                    <th>Alternatif</th>
                                                    <?php foreach ($queryKriteria as $rowk) : ?>
                                                        <th><?= $rowk['kode_kriteria'] ?></th>
                                                    <?php endforeach ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($queryNilai as $row) : ?>
                                                    <tr>
                                                        <td>A<?= $no++ ?></td>
                                                        <?php foreach ($queryKriteria as $rowk) : ?>
                                                            <?php $kode = $rowk['kode_kriteria'] ?>
                                                            <td><?= $spk->RankAVG($kode, $row[$kode]) ?></td>
                                                        <?php endforeach ?>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-stats card-round">
                                <div class="card-header">
                                    <h5 class="fw-bolder">Distance Score</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-center align-middle">
                                            <thead>
                                                <tr>
                                                    <th>Alternatif</th>
                                                    <?php foreach ($queryKriteria as $rowk) : ?>
                                                        <th><?= $rowk['kode_kriteria'] ?></th>
                                                    <?php endforeach ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($queryNilai as $row) : ?>
                                                    <tr>
                                                        <td>A<?= $no++ ?></td>
                                                        <?php $noDS = 0 ?>
                                                        <?php foreach ($queryKriteria as $rowk) : $noDS++ ?>
                                                            <?php $kode = $rowk['kode_kriteria'] ?>
                                                            <td><?= round($spk->DistabceScore($kode, $row[$kode], $noDS), 3) ?></td>
                                                        <?php endforeach ?>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card card-stats card-round">
                                <div class="card-header">
                                    <h5 class="fw-bolder">Preference Vektor</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-center align-middle">
                                            <thead>
                                                <tr>
                                                    <th>Alternatif</th>
                                                    <th>NISN Siswa</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Total Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($queryNilai as $row) : ?>
                                                    <tr>
                                                        <td>A<?= $no++ ?></td>
                                                        <td><?= $row['nisn'] ?></td>
                                                        <td><?= $row['nama_siswa'] ?></td>
                                                        <td><?= round($spk->PreferenceVektor($row), 5) ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-stats card-round">
                                <div class="card-header">
                                    <h5 class="fw-bolder">Perangkingan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-center align-middle">
                                            <thead>
                                                <tr>
                                                    <th>Ranking</th>
                                                    <th>Alternatif</th>
                                                    <th>NISN Siswa</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Total Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($dataHasil as $row) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row['Ai'] ?></td>
                                                        <td><?= $row['nisn'] ?></td>
                                                        <td><?= $row['nama'] ?></td>
                                                        <td><?= $row['total_nilai'] ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- \Content -->

            <!-- Footer -->
            <?php include 'app/view/layout/footer.php' ?>
            <!-- \Footer -->
        </div>
    </div>

    <!-- Script -->
    <?php include 'app/view/layout/script.php' ?>
    <!-- \Script -->
</body>

</html>