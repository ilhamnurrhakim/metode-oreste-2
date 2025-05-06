<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head -->
    <?php include 'app/view/layout/head.php' ?>
    <!-- \Head -->
</head>

<body>
    <!-- Controller -->
    <?php include 'app/controller/dashboard/data_nilai.php' ?>
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
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">
                                        Tambah Data
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-center align-middle">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NISN Siswa</th>
                                                    <th>Nama Siswa</th>
                                                    <?php foreach ($queryKriteria as $rowk) : ?>
                                                        <th><?= $rowk['nama_kriteria'] ?></th>
                                                    <?php endforeach ?>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($queryNilai as $row) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row['nisn'] ?></td>
                                                        <td><?= $row['nama_siswa'] ?></td>
                                                        <?php foreach ($queryKriteria as $rowk) : ?>
                                                            <?php $kode = $rowk['kode_kriteria'] ?>
                                                            <?php $dataNilaiSub = mysqli_fetch_array($crud->read("sub_kriteria", "WHERE kode_kriteria = '$kode' AND nilai_sub = '$row[$kode]'")) ?>
                                                            <td><?= $dataNilaiSub['nama_sub'] ?></td>
                                                        <?php endforeach ?>
                                                        <td>
                                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $no ?>">
                                                                Edit
                                                            </button>
                                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $no ?>">
                                                                Hapus
                                                            </button>
                                                        </td>
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

            <!-- Form Tambah Data -->
            <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">NISN || Nama Siswa</label>
                                        <select name="nisn" class="form-control" required>
                                            <option value="" disabled selected>Pilih</option>
                                            <?php foreach ($querySiswa as $rows) : ?>
                                                <?php $queryCekNilai = $crud->read("nilai", "WHERE nisn = '$rows[nisn]'") ?>
                                                <?php if (mysqli_num_rows($queryCekNilai) > 0) : ?>
                                                    <option value="" disabled><?= $rows['nisn'] ?> || <?= $rows['nama_siswa'] ?> (Sudah Dinilai)</option>
                                                <?php else : ?>
                                                    <option value="<?= $rows['nisn'] ?>"><?= $rows['nisn'] ?> || <?= $rows['nama_siswa'] ?> (Belum Dinilai)</option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <?php foreach ($queryKriteria as $rowk) : ?>
                                        <?php $kode = $rowk['kode_kriteria'] ?>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><?= $rowk['nama_kriteria'] ?></label>
                                            <select name="<?= $kode ?>" class="form-control" required>
                                                <option value="" disabled selected>Pilih</option>
                                                <?php $queryCekSub = $crud->read("sub_kriteria", "WHERE kode_kriteria = '$kode'") ?>
                                                <?php foreach ($queryCekSub as $rowsk) : ?>
                                                    <option value="<?= $rowsk['nilai_sub'] ?>"><?= $rowsk['nama_sub'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="tambah" class="btn btn-success">Tambah Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- \Form Tambah Data -->

            <?php $no = 1 ?>
            <?php foreach ($queryNilai as $data) : $no++ ?>
                <!-- Form Edit Data -->
                <div class="modal fade" id="editModal<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">NISN Siswa</label>
                                            <input type="text" class="form-control" name="nisn" value="<?= $data['nisn'] ?>" readonly>
                                        </div>
                                        <?php foreach ($queryKriteria as $rowk) : ?>
                                            <?php $kode = $rowk['kode_kriteria'] ?>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label"><?= $rowk['nama_kriteria'] ?></label>
                                                <select name="<?= $kode ?>" class="form-control" required>
                                                    <option value="" disabled selected>Pilih</option>
                                                    <?php $queryCekSub = $crud->read("sub_kriteria", "WHERE kode_kriteria = '$kode'") ?>
                                                    <?php foreach ($queryCekSub as $rowsk) : ?>
                                                        <option value="<?= $rowsk['nilai_sub'] ?>" <?= $data[$kode] == $rowsk['nilai_sub'] ? 'selected' : '' ?>><?= $rowsk['nama_sub'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="edit" class="btn btn-warning">Edit Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- \Form Edit Data -->

                <!-- Form Hapus Data -->
                <div class="modal fade" id="hapusModal<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="nisn" value="<?= $data['nisn'] ?>">
                                    <p>Yakin ingin hapus data dengan nama <b><?= $data['nama_siswa'] ?></b> ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="hapus" class="btn btn-danger">Hapus Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- \Form Hapus Data -->
            <?php endforeach ?>

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