<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head -->
    <?php include 'app/view/layout/head.php' ?>
    <!-- \Head -->
</head>

<body style="background-color: #fff; font-family: 'Times New Roman', Times, serif !important;">
    <!-- Contoller -->
    <?php include 'app/controller/report/cetak_laporan.php' ?>
    <!-- \Controller -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-3">
                <h2 class="text-uppercase text-center fw-bolder" style="font-family: 'Times New Roman', Times, serif;">
                    LAPORAN Pemilihan Peserta Dalam Mengikuti <br>
                    Festival Lomba Seni Siswa Nasional (FLS2N) <br>
                    <?= $dataProject['project'] ?> <br>
                </h2>
            </div>
            <div class="col-12 mb-5">
                <div>
                    <table class="table table-bordered text-center align-middle">
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
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    <div class="d-block">
                        <p>Dharmasraya, <?= $fungsi->TanggalIndo(date('Y-m-d')) ?></p>
                        <p>Kepala Sekolah</p>
                        <br>
                        <br>
                        <br>
                        <p class="fw-bolder" style="font-family: 'Times New Roman', Times, serif;"><?= $dataKepala['nama_pengguna'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <?php include 'app/view/layout/script.php' ?>
    <script>
        window.print()
    </script>
    <!-- \Script -->
</body>

</html>