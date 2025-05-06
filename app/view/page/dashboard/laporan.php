<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head -->
    <?php include 'app/view/layout/head.php' ?>
    <!-- \Head -->
</head>

<body>
    <!-- Controller -->
    <?php include 'app/controller/dashboard/laporan.php' ?>
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
                            <h2 class="fw-bolder mb-2"><?= $dataPage['page'] ?></h2>
                        </div>
                    </div>
                    <?php if (isset($_POST['cek'])) : ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-stats card-round">
                                    <div class="card-header">
                                        <a href="?r=Laporan&tipe=<?= $tipe ?>&nilai=<?= $nilai ?>" target="_blank" class="btn btn-primary">Cetak</a>
                                        <a href="?p=Laporan" class="btn btn-secondary">Reset</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover text-center align-middle">
                                                <thead>
                                                    <tr>
                                                        <th>Ranking</th>
                                                        <th>NISN Siswa</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Total Nilai</th>
                                                        <th>Keputusan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1 ?>
                                                    <?php foreach ($dataHasil as $row) : ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $row['nisn'] ?></td>
                                                            <td><?= $row['nama'] ?></td>
                                                            <td><?= $row['jk'] ?></td>
                                                            <td><?= $row['total_nilai'] ?></td>
                                                            <td><?= $spk->Keputusan($tipe, $nilai, $no, $row['total_nilai']) ?></td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-stats card-round">
                                    <div class="card-body">
                                        <form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label class="form-label">Tipe</label>
                                                    <select class="form-control" name="tipe" required>
                                                        <option value="" disabled selected>Pilih</option>
                                                        <option value="Ranking">Ranking</option>
                                                        <option value="Total Nilai">Total Nilai</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label class="form-label">Nilai</label>
                                                    <input type="number" class="form-control" name="nilai" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-success" name="cek">Cek Data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
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